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
use App\Exports\HopeExport;
use DB;

class HopeStudentController extends Controller
{

    public function index(Request $request){

        // $wisdomStudents = Student::where('year_section', 'Grade 11 - Wisdom')->get();
        $hope = DB::table('students')->where('year_section', 'Grade 12 - Hope')->count();
        $hopeStudents = Student::where([
            ['year_section', 'Grade 12 - Hope'],
            [function($query) use ($request){
                if(($hope = $request->hope)){
                    $query->orWhere('lastname', 'LIKE', '%'. $hope . '%')
                    ->orWhere('firstname', 'LIKE', '%'. $hope . '%')->get();
    
                    
                }
            }]
        ])
    
        ->orderBy("lastname","asc")
        ->paginate(8);
    
    
           return view('admin.student.Hope.index',compact('hopeStudents', 'hope'),['hopeStudents'=>$hopeStudents])
           ->with('i',(request()->input('page',1)-1)*5);
        }
    
    
        public function edit($id){
            $hopeStudents = Student::find($id);
            return view('admin.student.Hope.edit', compact('hopeStudents'));
        }
    
        public function update(Request $request, $id){
            $hopeStudents = Student::find($id);
            $hopeStudents->lastname = $request->input('lastname');
            $hopeStudents->firstname = $request->input('firstname');
            $hopeStudents->year_section = $request->input('year_section');
            $hopeStudents->email = $request->input('email');
            $hopeStudents->address = $request->input('address');
            $hopeStudents->gender = $request->input('gender');
    
        
            $hopeStudents->update();
            return redirect('hope-students')->with('status', 'Student Updated Successfully!');
        }
        
        public function destroy(Student $student){
            $student = Student::find($student)->each->delete();
            return redirect()->back()->with('status', 'Student Removed Successfully!');
        
            }
            
    
            public function export_hopeStudents_pdf(){
                $hopeStudents = Student::where('year_section', 'Grade 12 - Hope')->orderBy('lastname', 'asc')->get();
                $pdf = PDF::loadVIew('pdf.hope-students', [
                    'students' => $hopeStudents
                ]);
                return $pdf->download('PNHS Grade 12 - Hope Students.pdf');
            }
            
            public function export_hopeStudents_excel(){
                 $hopeStudents = Student::where('year_section', 'Grade 12 - Hope')->orderBy('lastname', 'asc')->get();
                 return Excel::download(new HopeExport($hopeStudents),'PNHS Grade 12 - Hope Students.xlsx');
            }
    
}