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
use Illuminate\Support\Facades\Mail;

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
                    ->orWhere('firstname', 'LIKE', '%'. $hope . '%')
                    ->orWhere('middlename', 'LIKE', '%'. $hope . '%')->get();
    
                    
                }
            }]
        ])
    
        ->orderBy("lastname","asc")
        ->paginate(15);
    
    
           return view('admin.student.Hope.index',compact('hopeStudents', 'hope'),['hopeStudents'=>$hopeStudents])
           ->with('i',(request()->input('page',1)-1)*5);
        }
    
    
        public function edit($id){
            $hopeStudents = Student::find($id);
            return view('admin.student.Hope.edit', compact('hopeStudents'));
        }

        public function create() {

            $hopeAd = DB::table('users')->where('advisory', 'Grade 12 - Hope')->get();
           return view('admin.student.Hope.create', compact('hopeAd'));
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
   
           $hopeStudents = Student::create([
               
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
   
           return redirect()->route('hope-list')->with('status','Added New Student!');
       }
   
    
        public function update(Request $request, $id){
            $hopeStudents = Student::find($id);
            $hopeStudents->lastname = $request->input('lastname');
            $hopeStudents->firstname = $request->input('firstname');
            $hopeStudents->middlename = $request->input('middlename');
            $hopeStudents->year_section = $request->input('year_section');
            $hopeStudents->gender = $request->input('gender');
            $hopeStudents->age = $request->input('age');
            $hopeStudents->email = $request->input('email');
            $hopeStudents->parent_name = $request->input('parent_name');
            $hopeStudents->parent_email = $request->input('parent_email');
            $hopeStudents->address = $request->input('address');
            
    
        
            $hopeStudents->update();
            return redirect('hope-students')->with('status', 'Student Updated Successfully!');
        }
        
        // public function destroy(Student $student){
        //     $student = Student::find($student)->each->delete();
        //     return redirect()->back()->with('status', 'Student Removed Successfully!');
        
        //     }
            
    
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

            public function multipleDelete(Request $request) 
            {
        
                $ids = $request->ids;
                Student::whereIn('id', $ids)->delete();
                return redirect()->back()->with('status', 'Students Deleted Successfully!');
            }   

            public function showStudentRecord($id){
                $hopeStud = Student::find($id);
        
               if (empty($hopeStud)) {
                   Flash::error('Student not found');
        
                   return redirect()->back();
               }
        
               return view('admin.student.Hope.show')->with('hopeStud', $hopeStud);
            }

            public function sendEmailStudent(Request $request){
                $request->validate([
                    'email' => 'required|email',
                    'subject' => 'required|string',
                    'content' => 'required|string'
                ]);
        
        
                    Mail::send('admin.student.Hope.Email.email', ['content' => $request->content, 'subject' => $request->subject], function($mails) use($request){
                        $mails->to($request->email);
                        $mails->subject($request->subject);
                  
                });
                return redirect()->back()->with('status', 'Email sent successfully!');
        }
    
}