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
            ->paginate(7);
            
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
            'gender' => 'string|required',
            'year_section' => 'string|required',
            'email' => 'email|required',
            'address' => 'string|required',
        ]);

        $student = Student::create([
            'user_id' => auth()->user()->id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'year_section' => $request->year_section,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        return redirect()->route('advisory-list-students')->with('status','Added New Student!');
    }

    public function edit(Student $student) {
        return view('adviserpage.adviser.student.edit', ['student'=>$student]);
    }
    // public function edit($id){
    //     $myStudents = Student::find($id);
    //     return view('adviserpage.adviser.student.edit', compact('myStudents'));
    // }

    
    // public function update(Request $request, $student){
    //     $student = Student::find($id);
    //     $student->lastname = $request->input('lastname');
    //     $student->firstname = $request->input('firstname');
    //     $student->year_section = $request->input('year_section');
    //     $student->email = $request->input('email');
    //     $student->address = $request->input('address');
    //     $student->gender = $request->input('gender');

    
    //     $student->update();
    //     return redirect('advisory-list-students')->with('status', 'Student Updated Successfully!');
    // }
    public function update(Student $student, Request $request) {
        $request->validate([
            'firstname' => 'string|required',
            'lastname' => 'string|required',
            'gender' => 'string|required',
            'year_section' => 'string|required',
            'email' => 'email|required',
            'address' => 'string|required',
        ]);

        $student->update($request->all());

        return redirect()->route('advisory-list-students')->with('status', 'Student Update Successfully!');
    }

    

    public function destroy(Student $student){
        $student = Student::find($student)->each->delete();
        return redirect()->route('advisory-list-students')->with('status', 'Student Removed Successfully!');
    
        }

    public function showStudentRecord($id){
            $myStud = Student::where('user_id', auth()->user()->id)->find($id);
    
           if (empty($myStud)) {
               Session::flash('Student not found');
    
               return redirect()->route('advisory-list-students');
           }
    
           return view('adviserpage.adviser.student.show-my-students')->with('myStud', $myStud);
        }
}

