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
use App\Exports\CharityExport;
use DB;

class CharityStudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

    // $wisdomStudents = Student::where('year_section', 'Grade 11 - Wisdom')->get();
    $charity = DB::table('students')->where('year_section', 'Grade 11 - Charity')->count();
    $charityStudents = Student::where([
        ['year_section', 'Grade 11 - Charity'],
        [function($query) use ($request){
            if(($charity = $request->charity)){
                $query->orWhere('lastname', 'LIKE', '%'. $charity . '%')
                ->orWhere('firstname', 'LIKE', '%'. $charity . '%')->get();

                
            }
        }]
    ])

    ->orderBy("lastname","asc")
    ->paginate(8);


       return view('admin.student.Charity.index',compact('charityStudents', 'charity'),['charityStudents'=>$charityStudents])
       ->with('i',(request()->input('page',1)-1)*5);
    }


    public function edit($id){
        $charityStudents = Student::find($id);
        return view('admin.student.Charity.edit', compact('charityStudents'));
    }

    public function update(Request $request, $id){
        $charityStudents = Student::find($id);
        $charityStudents->lastname = $request->input('lastname');
        $charityStudents->firstname = $request->input('firstname');
        $charityStudents->year_section = $request->input('year_section');
        $charityStudents->email = $request->input('email');
        $charityStudents->address = $request->input('address');
        $charityStudents->gender = $request->input('gender');

    
        $charityStudents->update();
        return redirect('charity-students')->with('status', 'Student Updated Successfully!');
    }
    
    public function destroy(Student $student){
        $student = Student::find($student)->each->delete();
        return redirect()->back()->with('status', 'Student Removed Successfully!');
    
        }
        
//not yet edited
        public function export_charityStudents_pdf(){
            $charityStudents = Student::where('year_section', 'Grade 11 - Charity')->orderBy('lastname', 'asc')->get();
            $pdf = PDF::loadVIew('pdf.charity-students', [
                'students' => $charityStudents
            ]);
            return $pdf->download('PNHS Grade 11 - Charity Students.pdf');
        }
        
        public function export_charityStudents_excel(){
             $charityStudents = Student::where('year_section', 'Grade 11 - Charity')->orderBy('lastname', 'asc')->get();
             return Excel::download(new CharityExport($charityStudents),'PNHS Grade 11 - Charity Students.xlsx');
        }

    }





