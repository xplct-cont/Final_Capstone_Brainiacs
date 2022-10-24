<?php

namespace App\Http\Controllers\Admin\Student;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Anecdotal_Record;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Rules\MatchOldPassword;
use Flash;
use Response;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\WisdomExport;
use DB;
use Illuminate\Support\Facades\Mail;

class WisdomStudentController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

    // $wisdomStudents = Student::where('year_section', 'Grade 11 - Wisdom')->get();
    $wisdom = DB::table('students')->where('user_id', auth()->user()->id)->count();
    $wisdomStudents = Student::where([
        ['user_id', auth()->user()->id],
        [function($query) use ($request){
            if(($wisdom = $request->wisdom)){
                $query->orWhere('lastname', 'LIKE', '%'. $wisdom . '%')
                ->orWhere('firstname', 'LIKE', '%'. $wisdom . '%')
                ->orWhere('middlename', 'LIKE', '%'. $wisdom . '%')->get();

                
            }
        }]
    ])

    ->orderBy("lastname","asc")
    ->paginate(15);


       return view('admin.student.Wisdom.index',compact('wisdomStudents', 'wisdom'),['wisdomStudents'=>$wisdomStudents])
       ->with('i',(request()->input('page',1)-1)*5);
    }


    public function edit($id){
        $wisdomStudents = Student::find($id);
        return view('admin.student.Wisdom.edit', compact('wisdomStudents'));
    }

    public function create() {
        
        return view('admin.student.Wisdom.create');
    }

    public function store(Request $request) {
        $request->validate([
            'firstname' => 'string|required',
            'lastname' => 'string|required',
            'middlename' => 'string|required',
            'gender' => 'string|required',
            'age' => 'string|required',
            'year_section' => 'string|required',
            'email' => 'email|required',
            'parent_name' => 'string|required',
            'parent_email' => 'nullable|email',
            'address' => 'string|required',
        ]);

        $wisdomStudents = Student::create([
            'user_id' => auth()->user()->id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'middlename' => $request->middlename,
            'gender' => $request->gender,
            'age' => $request->age,
            'year_section' => $request->year_section,
            'email' => $request->email,
            'parent_name' => $request->parent_name,
            'parent_email' => $request->parent_email,
            'address' => $request->address,
        ]);

        return redirect()->route('wisdom-list')->with('status','Added New Student!');
    }


    public function update(Request $request, $id){
        $wisdomStudents = Student::find($id);
        $wisdomStudents->lastname = $request->input('lastname');
        $wisdomStudents->firstname = $request->input('firstname');
        $wisdomStudents->middlename = $request->input('middlename');
        $wisdomStudents->year_section = $request->input('year_section');
        $wisdomStudents->gender = $request->input('gender');
        $wisdomStudents->age = $request->input('age');
        $wisdomStudents->email = $request->input('email');
        $wisdomStudents->address = $request->input('address');
        $wisdomStudents->parent_name = $request->input('parent_name');
        $wisdomStudents->parent_email = $request->input('parent_email');

    
        $wisdomStudents->update();
        return redirect('wisdom-students')->with('status', 'Student Updated Successfully!');
    }
    


    // public function create(){
    //     return view('admin.student.Wisdom.create');
    // }


    // public function store(Request $request) {
    //     $request->validate([
    //         'firstname' => 'string|required',
    //         'lastname' => 'string|required',
    //         'year_section' => 'string|required',
    //         'email' => 'email|required',
    //         'address' => 'string|required',
    //     ]);

    //     $student = Student::create([
    //         'user_id' => auth()->user()->id,
    //         'firstname' => $request->firstname,
    //         'lastname' => $request->lastname,
    //         'year_section' => $request->year_section,
    //         'email' => $request->email,
    //         'address' => $request->address,
    //     ]);

    //     return redirect()->route('wisdom-list')->with('status','Added New Student!');
    // }

    // public function destroy(Student $student){
    //     $student = Student::find($student)->each->delete();
    //     return redirect()->back()->with('status', 'Student Removed Successfully!');
    
    //     }


    public function export_wisdomStudents_pdf(){
        $wisdomStudents = Student::where('year_section', 'Grade 11 - Wisdom')->orderBy('lastname', 'asc')->get();
        $pdf = PDF::loadVIew('pdf.wisdom-students', [
            'students' => $wisdomStudents
        ]);
        return $pdf->download('PNHS Grade 11 - Wisdom Students.pdf');
    }
    
    public function export_wisdomStudents_excel(){
         $wisdomStudents = Student::where('year_section', 'Grade 11 - Wisdom')->orderBy('lastname', 'asc')->get();
         return Excel::download(new WisdomExport($wisdomStudents),'PNHS Grade 11 - Wisdom Students.xlsx');
    }

    public function multipleDelete(Request $request) 
    {

        $ids = $request->ids;
        Student::whereIn('id', $ids)->delete();
        return redirect()->back()->with('status', 'Students Deleted Successfully!');
    }

    public function showStudentRecord($id){
        $wisdomStud = Student::find($id);

       if (empty($wisdomStud)) {
           Flash::error('Student not found');

           return redirect()->back();
       }

       return view('admin.student.Wisdom.show')->with('wisdomStud', $wisdomStud);
    }


    public function sendEmailStudent(Request $request){
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string',
            'content' => 'required|string'
        ]);


            Mail::send('admin.student.Wisdom.Email.email', ['content' => $request->content, 'subject' => $request->subject], function($mails) use($request){
                $mails->to($request->email);
                $mails->subject($request->subject);
          
        });
        return redirect()->back()->with('status', 'Email sent successfully!');
}

}