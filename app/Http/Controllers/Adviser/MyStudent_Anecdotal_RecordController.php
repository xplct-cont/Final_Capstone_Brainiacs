<?php

namespace App\Http\Controllers\Adviser;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Anecdotal_Record;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Rules\MatchOldPassword;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Response;
use DB;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ParentExport;

class MyStudent_Anecdotal_RecordController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
 
    $anecdotal_myStudent = Anecdotal_Record::with(['student'])->where('student_id', '=', $id)->get();

      $student_myS = Student::where('user_id', auth()->user()->id)->find($id);
      if (empty($student_myS)) {

        abort(404);
    }
      return view('adviserpage.adviser.student.MyStudentAnecdotal_Record.index', compact('anecdotal_myStudent'))->with('student_myS', $student_myS);
    }







    //Need Security Changes////////////////////////////////////////////////////////
    public function show( Student $id, $student){


      $anecdotal_myStud = Anecdotal_Record::with(['student'])->findOrFail($student);
      if (empty($anecdotal_myStud)) {

        abort(404);
    }
  
    try{
      $student_myS = Student::where('user_id', auth()->user()->id)->firstOrFail();
     
    }
    catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        abort(404);
    } 
      
      return view('adviserpage.adviser.student.MyStudentAnecdotal_Record.show', compact('anecdotal_myStud'))->with('student_myS', $student_myS);
    }

    ///////////////////////////////////////////////////////////////








    public function create($id) {

        $anecdotal_myStudent = Anecdotal_Record::with(['student'])->where('student_id', '=', $id)->get();

        $student_myS = Student::where('user_id', auth()->user()->id)->find($id);
        if (empty($student_myS)) {
          abort(404);
      }
        return view('adviserpage.adviser.student.MyStudentAnecdotal_Record.create', compact('anecdotal_myStudent', 'student_myS'));
    }


    public function store(Request $request) {
        $request->validate([

        'student_id' => 'required',
        'observation_date_time' => 'required',
        'description_of_incident'  => 'required',
        'location_of_incidents' => 'string|required',
        'actions_taken' => 'string|required',
        'recommendations' => 'required',
       
        ]);

        $student_wis= Anecdotal_Record::create([
                   
            'student_id' => $request->student_id,
            'observation_date_time' => $request->observation_date_time,
            'description_of_incident'  => $request->description_of_incident,
            'location_of_incidents' => $request->location_of_incidents,
            'actions_taken' => $request->actions_taken,
            'recommendations' => $request->recommendations,
           
        ]);
        return redirect()->back()->with('status','Added New Record!');
    }

    public function update(Request $request, $id){
      $student_myS = Anecdotal_Record::find($id);
      $student_myS->student_id = $request->input('student_id');
      // $student_myS->observation_date_time = $request->input('observation_date_time');
      $student_myS->description_of_incident = $request->input('description_of_incident');
      $student_myS->location_of_incidents = $request->input('location_of_incidents');
      $student_myS->actions_taken = $request->input('actions_taken');
      $student_myS->recommendations = $request->input('recommendations');

      $student_myS->update();
      return redirect()->back()->with('status', 'Information Updated Successfully!');
  }


     public function destroy($id){
        $removeRec = Anecdotal_Record::findOrFail($id);
        $removeRec -> delete();
        return redirect()->back()->with('status', 'Record Deleted Successfully!');   
    }

    public function export_myStudents_Anecdotal_ID_pdf(Request $request, $id){
      $myStudents_Anecdotal = Anecdotal_Record::findOrFail($id);
      $pdf = PDF::loadVIew('pdf.my-students-anecdotal', [
          'anecdotal_records' => $myStudents_Anecdotal
      ]);
      return $pdf->download('Anecdotal Record-My Advisory.pdf');
  }
  
}