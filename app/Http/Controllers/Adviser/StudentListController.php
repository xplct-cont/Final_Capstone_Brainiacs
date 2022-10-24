<?php

namespace App\Http\Controllers\Adviser;


use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Validator;
use DB;
use Illuminate\Support\Facades\Session;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MyStudentsExport;
use Illuminate\Support\Facades\Mail;

class StudentListController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function myStudents(Request $request) {
        // $myStudents = Student::where('user_id', auth()->user()->id)->get();
        $countmyStudents = DB::table('students')->where('user_id', auth()->user()->id)->count();
        $myStudents = Student::where([
            ['user_id', auth()->user()->id],
            [function($query) use ($request){
                if(($student = $request->student)){
                    $query->orWhere('lastname', 'LIKE', '%'. $student . '%')
                    ->orWhere('firstname', 'LIKE', '%'. $student . '%')->get();
                }
            }]
        ])
    
            ->orderBy('lastname', 'asc')
            ->paginate(15);
            
        return view('adviserpage.adviser.student.my-students',compact('myStudents', 'countmyStudents'),['myStudents'=>$myStudents])
        ->with('i',(request()->input('page',1)-1)*5);
    }

    
    public function create() {
        return view('adviserpage.adviser.student.create');
      
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

        $student = Student::create([
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

        return redirect()->route('advisory-list-students')->with('status','Added New Student!');
    }

    public function edit(Student $student) {
        return view('adviserpage.adviser.student.edit', ['student'=>$student]);
    }
   
    
    public function update(Student $student, Request $request) {
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

        $student->update($request->all());

        return redirect()->route('advisory-list-students')->with('status', 'Student Update Successfully!');
    }

    
    public function destroy($id){
        $removeStud = Student::findOrFail($id);
        $removeStud -> delete();
        return redirect()->back()->with('status', 'Record Deleted Successfully!');   
      }

    public function showStudentRecord($id){
            $myStud = Student::where('user_id', auth()->user()->id)->find($id);
    
           if (empty($myStud)) {
            abort(404);
           }
    
           return view('adviserpage.adviser.student.show-my-students')->with('myStud', $myStud);
        }


        public function export_myStudents_pdf(){
            $myStudents = Student::where('user_id', auth()->user()->id)->orderBy('lastname', 'asc')->get();
            $pdf = PDF::loadVIew('pdf.my-students', [
                'students' => $myStudents
            ]);
            return $pdf->download('Students in my advisory.pdf');
        }
        
        public function export_myStudents_excel(){
             $myStudents = Student::where('user_id', auth()->user()->id)->orderBy('lastname', 'asc')->get();
             return Excel::download(new MyStudentsExport($myStudents),'Students in my advisory.xlsx');
        }

        public function sendEmailMyStudent(Request $request){
            $request->validate([
                'email' => 'required|email',
                'subject' => 'required|string',
                'content' => 'required|string'
            ]);
            
                Mail::send('adviserpage.adviser.student.Email.email', ['content' => $request->content, 'subject' => $request->subject], function($mails) use($request){
                    $mails->to($request->email);
                    $mails->subject($request->subject);
              
            });
            return redirect()->back()->with('status', 'Email sent successfully!');
    }
}

