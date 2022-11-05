<?php

namespace App\Http\Controllers\Admin\Parent_Conference_Record;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Anecdotal_Record;
use App\Models\Counseling_Anecdotal_Record;
use App\Models\Parent_Conference_Record;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Rules\MatchOldPassword;
use Response;
use DB;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ParentExport;

class Charity_Parent_Conference_RecordController extends Controller
{

     
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
 
        $parent_conference_record_charity = Parent_Conference_Record::with(['student'])->where('student_id', '=', $id)->get();
        
        $student_cha = Student::find($id);
        return view('admin.student.Charity.Parent_Conference_Record.index', compact('parent_conference_record_charity', 'student_cha'));
      }
  


      public function show(Student $id, $student){

        $student_char = Parent_Conference_Record::with(['student'])->find($student);
        if (empty($student_char)) {
  
          abort(404);
      }
    
      try{
        $student_c = Student::find($id);
       
      }
      catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
          abort(404);
      } 

        return view('admin.student.Charity.Parent_Conference_Record.show', compact( 'student_char'))->with('student_c', $student_c);
    }
    


    public function create($id) {

      $parent_conference_record_charity = Parent_Conference_Record::with(['student'])->where('student_id', '=', $id)->get();
      
      $student_cha = Student::find($id);

      return view('admin.student.Charity.Parent_Conference_Record.create', compact('parent_conference_record_charity', 'student_cha'));
  }


  public function store(Request $request) {
      $request->validate([

      'student_id' => 'required',
      'date' => 'required',
      'relation_to_student' => 'required|string',
      'reason_for_contact' => 'required|string',
      'inquiries_referral_appointment' => 'nullable',
      'problem_concern' => 'required|string',
      'topics_discussed' => 'required|string',
      'suggested_resolution' => 'required|string',
      'action_taken' => 'required'
     
      ]);

      $student_cha = Parent_Conference_Record::create([
                 
          'student_id' => $request->student_id,
          'date' => $request->date,
          'relation_to_student' => $request->relation_to_student,
          'reason_for_contact' => $request->reason_for_contact,
          'inquiries_referral_appointment' => $request->inquiries_referral_appointment,
          'problem_concern' => $request->problem_concern,
          'topics_discussed' => $request->topics_discussed,
          'suggested_resolution' => $request->suggested_resolution,
          'action_taken' => $request->action_taken
         
      ]);
      return redirect()->back()->with('status','Added New Record!');
  }


      public function update(Request $request, $id){
        $student_cha = Parent_Conference_Record::find($id);
        $student_cha->student_id = $request->input('student_id');
        // $student_cha->date = $request->input('date');
        $student_cha->relation_to_student = $request->input('relation_to_student');
        $student_cha->reason_for_contact = $request->input('reason_for_contact');
        $student_cha->inquiries_referral_appointment = $request->input('inquiries_referral_appointment');
        $student_cha->problem_concern = $request->input('problem_concern');
        $student_cha->topics_discussed = $request->input('topics_discussed');
        $student_cha->suggested_resolution = $request->input('suggested_resolution');
        $student_cha->action_taken = $request->input('action_taken');

        $student_cha->update();
        return redirect()->back()->with('status', 'Record Updated Successfully!');
    }

    public function destroy($id){
        $removeRec = Parent_Conference_Record::findOrFail($id);
        $removeRec -> delete();
        return redirect()->back()->with('status', 'Record Deleted Successfully!');   
      }

      public function export_charityStudents_Parent_Conference_Record_ID_pdf(Request $request, $id){
        $charityStudents_Parent_Conference_Record = Parent_Conference_Record::findOrFail($id);
        $pdf = PDF::loadVIew('pdf.charity-parent-conference-record', [
            'parent_conference_records' => $charityStudents_Parent_Conference_Record
        ]);
        return $pdf->download('Parent Conference Record-Charity.pdf');
    }
    
}