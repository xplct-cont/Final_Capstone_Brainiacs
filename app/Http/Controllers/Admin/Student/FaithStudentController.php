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
                ->orWhere('firstname', 'LIKE', '%'. $faith . '%')->get();

                
            }
        }]
    ])

    ->orderBy("lastname","asc")
    ->paginate(8);


       return view('admin.student.Faith.index',compact('faithStudents', 'faith'),['faithStudents'=>$faithStudents])
       ->with('i',(request()->input('page',1)-1)*5);
    }


    public function edit($id){
        $faithStudents = Student::find($id);
        return view('admin.student.Faith.edit', compact('faithStudents'));
    }

    public function update(Request $request, $id){
        $faithStudents = Student::find($id);
        $faithStudents->lastname = $request->input('lastname');
        $faithStudents->firstname = $request->input('firstname');
        $faithStudents->year_section = $request->input('year_section');
        $faithStudents->email = $request->input('email');
        $faithStudents->address = $request->input('address');
        $faithStudents->gender = $request->input('gender');

    
        $faithStudents->update();
        return redirect('faith-students')->with('status', 'Student Updated Successfully!');
    }
    
    public function destroy(Student $student){
        $student = Student::find($student)->each->delete();
        return redirect()->back()->with('status', 'Student Removed Successfully!');
    
        }
        

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

    }