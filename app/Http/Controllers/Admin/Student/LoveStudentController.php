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
use App\Exports\LoveExport;
use DB;

class LoveStudentController extends Controller
{

    public function index(Request $request){

        // $wisdomStudents = Student::where('year_section', 'Grade 11 - Wisdom')->get();
        $love = DB::table('students')->where('year_section', 'Grade 12 - Love')->count();
        $loveStudents = Student::where([
            ['year_section', 'Grade 12 - Love'],
            [function($query) use ($request){
                if(($love = $request->love)){
                    $query->orWhere('lastname', 'LIKE', '%'. $love . '%')
                    ->orWhere('firstname', 'LIKE', '%'. $love . '%')->get();
    
                    
                }
            }]
        ])
    
        ->orderBy("lastname","asc")
        ->paginate(8);
    
    
           return view('admin.student.Love.index',compact('loveStudents', 'love'),['loveStudents'=>$loveStudents])
           ->with('i',(request()->input('page',1)-1)*5);
        }
    
    
        public function edit($id){
            $loveStudents = Student::find($id);
            return view('admin.student.Love.edit', compact('loveStudents'));
        }
    
        public function update(Request $request, $id){
            $loveStudents = Student::find($id);
            $loveStudents->lastname = $request->input('lastname');
            $loveStudents->firstname = $request->input('firstname');
            $loveStudents->middlename = $request->input('middlename');
            $loveStudents->year_section = $request->input('year_section');
            $loveStudents->gender = $request->input('gender');
            $loveStudents->email = $request->input('email');
            $loveStudents->parent_name = $request->input('parent_name');
            $loveStudents->parent_email = $request->input('parent_email');
            $loveStudents->address = $request->input('address');
            
    
        
            $loveStudents->update();
            return redirect('love-students')->with('status', 'Student Updated Successfully!');
        }
        
        // public function destroy(Student $student){
        //     $student = Student::find($student)->each->delete();
        //     return redirect()->back()->with('status', 'Student Removed Successfully!');
        
        //     }
            
    
            public function export_loveStudents_pdf(){
                $loveStudents = Student::where('year_section', 'Grade 12 - Love')->orderBy('lastname', 'asc')->get();
                $pdf = PDF::loadVIew('pdf.love-students', [
                    'students' => $loveStudents
                ]);
                return $pdf->download('PNHS Grade 12 - Love Students.pdf');
            }
            
            public function export_loveStudents_excel(){
                 $loveStudents = Student::where('year_section', 'Grade 12 - Love')->orderBy('lastname', 'asc')->get();
                 return Excel::download(new LoveExport($loveStudents),'PNHS Grade 12 - Love Students.xlsx');
            }

            public function multipleDelete(Request $request) 
            {
        
                $ids = $request->ids;
                Student::whereIn('id', $ids)->delete();
                return redirect()->back()->with('status', 'Students Deleted Successfully!');
            }   

            public function showStudentRecord($id){
                $loveStud = Student::find($id);
        
               if (empty($loveStud)) {
                   Flash::error('Student not found');
        
                   return redirect()->back();
               }
        
               return view('admin.student.Love.show')->with('loveStud', $loveStud);
            }
        
}