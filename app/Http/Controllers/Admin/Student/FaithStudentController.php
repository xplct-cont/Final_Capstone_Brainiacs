<?php

namespace App\Http\Controllers\Admin\Student;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
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
use App\Exports\FaithExport;
use DB;
use Illuminate\Support\Facades\Mail;

class FaithStudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

    // $wisdomStudents = Student::where('year_section', 'Grade 11 - Wisdom')->get();
    $faith = DB::table('students')->where('year_section', 'Grade 11 - Faith')->count();
    $faithStudents = Student::where([
        ['year_section', 'Grade 11 - Faith'],
        [function($query) use ($request){
            if(($faith = $request->faith)){
                $query->orWhere('lastname', 'LIKE', '%'. $faith . '%')
                ->orWhere('firstname', 'LIKE', '%'. $faith . '%')
                ->orWhere('middlename', 'LIKE', '%'. $faith . '%')->get();

                
            }
        }]
    ])

    ->orderBy("lastname","asc")
    ->paginate(15);


       return view('admin.student.Faith.index',compact('faithStudents', 'faith'),['faithStudents'=>$faithStudents])
       ->with('i',(request()->input('page',1)-1)*5);
    }


    public function edit($id){
        $faithStudents = Student::find($id);
        return view('admin.student.Faith.edit', compact('faithStudents'));
    }


    public function create() {

        $faithAd = DB::table('users')->where('advisory', 'Grade 11 - Faith')->get();
       return view('admin.student.Faith.create', compact('faithAd'));
   }

   public function store(Request $request) {
       $request->validate([
           'user_id' => 'required',
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

       $faithStudents = Student::create([
           
           'user_id' => $request->user_id,
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

       return redirect()->route('faith-list')->with('status','Added New Student!');
   }


    public function update(Request $request, $id){
        $faithStudents = Student::find($id);
        $faithStudents->lastname = $request->input('lastname');
        $faithStudents->firstname = $request->input('firstname');
        $faithStudents->middlename = $request->input('middlename');
        $faithStudents->year_section = $request->input('year_section');
        $faithStudents->gender = $request->input('gender');
        $faithStudents->age = $request->input('age');
        $faithStudents->email = $request->input('email');
        $faithStudents->parent_name = $request->input('parent_name');
        $faithStudents->parent_email = $request->input('parent_email');
        $faithStudents->address = $request->input('address');
        
        
        
    
        $faithStudents->update();
        return redirect('faith-students')->with('status', 'Student Updated Successfully!');
    }
    
    // public function destroy(Student $student){
    //     $student = Student::find($student)->each->delete();
    //     return redirect()->back()->with('status', 'Student Removed Successfully!');
    
    //     }
        

        public function export_faithStudents_pdf(){
            $faithStudents = Student::where('year_section', 'Grade 11 - Faith')->orderBy('lastname', 'asc')->get();
            $pdf = PDF::loadVIew('pdf.faith-students', [
                'students' => $faithStudents
            ]);
            return $pdf->download('PNHS Grade 11 - Faith Students.pdf');
        }
        
        public function export_faithStudents_excel(){
             $faithStudents = Student::where('year_section', 'Grade 11 - Faith')->orderBy('lastname', 'asc')->get();
             return Excel::download(new FaithExport($faithStudents),'PNHS Grade 11 - Faith Students.xlsx');
        }

        public function multipleDelete(Request $request) 
       {

        $ids = $request->ids;
        Student::whereIn('id', $ids)->delete();
        return redirect()->back()->with('status', 'Students Deleted Successfully!');
      }

      public function showStudentRecord($id){
        $faithStud = Student::find($id);

       if (empty($faithStud)) {
           Flash::error('Student not found');

           return redirect()->back();
       }

       return view('admin.student.Faith.show')->with('faithStud', $faithStud);
    }

    public function sendEmailStudent(Request $request){
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string',
            'content' => 'required|string'
        ]);


            Mail::send('admin.student.Faith.Email.email', ['content' => $request->content, 'subject' => $request->subject], function($mails) use($request){
                $mails->to($request->email);
                $mails->subject($request->subject);
          
        });
        return redirect()->back()->with('status', 'Email sent successfully!');
}


}