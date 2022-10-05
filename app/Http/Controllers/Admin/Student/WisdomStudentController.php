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
use App\Exports\WisdomExport;
use DB;

class WisdomStudentController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

    // $wisdomStudents = Student::where('year_section', 'Grade 11 - Wisdom')->get();
    $wisdom = DB::table('students')->where('year_section', 'Grade 11 - Wisdom')->count();
    $wisdomStudents = Student::where([
        ['year_section', 'Grade 11 - Wisdom'],
        [function($query) use ($request){
            if(($wisdom = $request->wisdom)){
                $query->orWhere('lastname', 'LIKE', '%'. $wisdom . '%')
                ->orWhere('firstname', 'LIKE', '%'. $wisdom . '%')->get();

                
            }
        }]
    ])

    ->orderBy("lastname","asc")
    ->paginate(8);


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
            'gender' => 'string|required',
            'year_section' => 'string|required',
            'email' => 'email|required',
            'address' => 'string|required',
        ]);

        $wisdomStudents = Student::create([
            'user_id' => auth()->user()->id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'year_section' => $request->year_section,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        return redirect()->route('wisdom-list')->with('status','Added New Student!');
    }


    public function update(Request $request, $id){
        $wisdomStudents = Student::find($id);
        $wisdomStudents->lastname = $request->input('lastname');
        $wisdomStudents->firstname = $request->input('firstname');
        $wisdomStudents->year_section = $request->input('year_section');
        $wisdomStudents->email = $request->input('email');
        $wisdomStudents->address = $request->input('address');
        $wisdomStudents->gender = $request->input('gender');

    
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

    public function destroy(Student $student){
        $student = Student::find($student)->each->delete();
        return redirect()->back()->with('status', 'Student Removed Successfully!');
    
        }


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
    

}