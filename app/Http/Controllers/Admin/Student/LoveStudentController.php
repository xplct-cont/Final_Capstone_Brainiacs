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
use Illuminate\Support\Facades\Mail;

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
                    ->orWhere('firstname', 'LIKE', '%'. $love . '%')
                    ->orWhere('middle', 'LIKE', '%'. $love . '%')->get();
    
                    
                }
            }]
        ])
    
        ->orderBy("lastname","asc")
        ->paginate(15);
    
    
           return view('admin.student.Love.index',compact('loveStudents', 'love'),['loveStudents'=>$loveStudents])
           ->with('i',(request()->input('page',1)-1)*5);
        }
    
    
        public function edit($id){
            $loveStudents = Student::find($id);
            return view('admin.student.Love.edit', compact('loveStudents'));
        }

        public function create() {

            $loveAd = DB::table('users')->where('advisory', 'Grade 12 - Love')->get();
           return view('admin.student.Love.create', compact('loveAd'));
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
   
           $loveStudents = Student::create([
               
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
   
           return redirect()->route('love-list')->with('status','Added New Student!');
       }
   
    
        public function update(Request $request, $id){
            $loveStudents = Student::find($id);
            $loveStudents->lastname = $request->input('lastname');
            $loveStudents->firstname = $request->input('firstname');
            $loveStudents->middlename = $request->input('middlename');
            $loveStudents->year_section = $request->input('year_section');
            $loveStudents->gender = $request->input('gender');
            $loveStudents->age = $request->input('age');
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
        
            public function sendEmailStudent(Request $request){
                $request->validate([
                    'email' => 'required|email',
                    'subject' => 'required|string',
                    'content' => 'required|string'
                ]);
        
        
                    Mail::send('admin.student.Love.Email.email', ['content' => $request->content, 'subject' => $request->subject], function($mails) use($request){
                        $mails->to($request->email);
                        $mails->subject($request->subject);
                  
                });
                return redirect()->back()->with('status', 'Email sent successfully!');
        }
}