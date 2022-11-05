<?php

namespace App\Http\Controllers\Admin\Counseling_Anecdotal_Record;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Anecdotal_Record;
use App\Models\Counseling_Anecdotal_Record;
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

class Wisdom_Counseling_Anecdotal_RecordController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
 
      $counseling_anecdotal_wisdom = Counseling_Anecdotal_Record::with(['student'])->where('student_id', '=', $id)->get();
      

      $student_wis = Student::find($id);
      return view('admin.student.Wisdom.Counseling_Anecdotal_Record.index', compact('counseling_anecdotal_wisdom', 'student_wis'));
    }


    public function create($id) {

      $counseling_anecdotal_wisdom = Counseling_Anecdotal_Record::with(['student'])->where('student_id', '=', $id)->get();
      
      $student_wis = Student::find($id);

      return view('admin.student.Wisdom.Counseling_Anecdotal_Record.create', compact('counseling_anecdotal_wisdom', 'student_wis'));
  }


  
    public function store(Request $request) {
        $request->validate([

        'student_id' => 'required',
        'date_time_called' => 'required',
        'reasons_for_contact' => 'string|required',
        'referred_by' => 'string|required',
        'reasons_for_referral' => 'string|required',
        'follow_up_counseling_session' => 'required',
        'behavior_observed' => 'string|required',
        'interview_findings' => 'string|required',
        'clinical_impressions' => 'string|required',
        'recommendation' => 'string|required',
       
        ]);

        $student_wis= Counseling_Anecdotal_Record::create([
                   
            'student_id' => $request->student_id,
            'date_time_called' => $request->date_time_called,
            'reasons_for_contact' => $request->reasons_for_contact,
            'referred_by' => $request->referred_by,
            'reasons_for_referral' => $request->reasons_for_referral,
            'follow_up_counseling_session' => $request->follow_up_counseling_session,
            'behavior_observed' => $request->behavior_observed,
            'interview_findings' => $request->interview_findings,
            'clinical_impressions' => $request->clinical_impressions,
            'recommendation' => $request->recommendation,
           
        ]);
        return redirect()->back()->with('status','Added New Record!');
    }


    public function show(Student $id, $student){

      $student_wisd = Counseling_Anecdotal_Record::with(['student'])->find($student);
      if (empty($student_wisd)) {
  
        abort(404);
    }
  
    try{
      $student_w = Student::find($id);
     
    }
    catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        abort(404);
    } 
  
      return view('admin.student.Wisdom.Counseling_Anecdotal_Record.show', compact( 'student_wisd'))->with('student_w', $student_w);
  }

      public function update(Request $request, $id){
        $student_wis = Counseling_Anecdotal_Record::find($id);
        $student_wis->student_id = $request->input('student_id');
        // $student_wis->date_time_called = $request->input('date_time_called');
        $student_wis->reasons_for_contact = $request->input('reasons_for_contact');
        $student_wis->referred_by = $request->input('referred_by');
        $student_wis->reasons_for_referral = $request->input('reasons_for_referral');
        $student_wis->follow_up_counseling_session = $request->input('follow_up_counseling_session');
        $student_wis->behavior_observed = $request->input('behavior_observed');
        $student_wis->interview_findings = $request->input('interview_findings');
        $student_wis->clinical_impressions = $request->input('clinical_impressions');
        $student_wis->recommendation = $request->input('recommendation');

        $student_wis->update();
        return redirect()->back()->with('status', 'Record Updated Successfully!');
    }

    public function destroy($id){
        $removeRec = Counseling_Anecdotal_Record::findOrFail($id);
        $removeRec -> delete();
        return redirect()->back()->with('status', 'Record Deleted Successfully!');   
      }

      public function export_wisdomStudents_Counseling_Anecdotal_ID_pdf(Request $request, $id){
        $wisdomStudents_Counseling_Anecdotal = Counseling_Anecdotal_Record::findOrFail($id);
        $pdf = PDF::loadVIew('pdf.wisdom-counseling_anecdotal', [
            'counseling_anecdotal_records' => $wisdomStudents_Counseling_Anecdotal
        ]);
        return $pdf->download('Counseling Anecdotal Record-Wisdom.pdf');
      }
}