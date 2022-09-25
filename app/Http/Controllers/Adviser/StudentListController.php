<?php

namespace App\Http\Controllers\Adviser;


use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Validator;



class StudentListController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function myStudents() {
        $myStudents = Student::where('user_id', auth()->user()->id)
            ->orderBy('lastname', 'asc')
            ->paginate(6);

        return view('adviserpage.adviser.student.my-students',['myStudents'=>$myStudents]);
    }

    public function create() {
        return view('adviserpage.adviser.student.create');
    }

    public function store(Request $request) {
        $request->validate([
            'firstname' => 'string|required',
            'lastname' => 'string|required',
            'year_section' => 'string|required',
            'email' => 'email|required',
            'address' => 'string|required',
        ]);

        $student = Student::create([
            'user_id' => auth()->user()->id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'year_section' => $request->year_section,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        return redirect()->route('advisory-list-students')->with('status','Added New Student!');
    }

    public function edit(Student $student) {
        return view('adviserpage.adviser.student.edit', ['student'=>$student]);
    }

    //no function update yet
    public function update(){

    }

    public function destroy(Student $student){
        $student = Student::find($student)->each->delete();
        return redirect()->route('advisory-list-students')->with('status', 'Adviser Removed Successfully!');
    
        }
}

