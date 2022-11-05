<?php

namespace App\Http\Controllers\Admin\Anecdotal_Record;


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
use Response;
use DB;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ParentExport;

class Wisdom_Anecdotal_RecordController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
 
      $anecdotal_wisdom = Anecdotal_Record::with(['student'])->where('student_id', '=', $id)->get();
      

      $student_wis = Student::find($id);
      return view('admin.student.Wisdom.Anecdotal_Record.index', compact('anecdotal_wisdom', 'student_wis'));
    }


     public function show(Student $id, $student){

        $student_wisd = Anecdotal_Record::with(['student'])->find($student);
        if (empty($student_wisd)) {
  
          abort(404);
      }
    
      try{
        $student_w = Student::find($id);
       
      }
      catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
          abort(404);
      } 

        return view('admin.student.Wisdom.Anecdotal_Record.show', compact( 'student_wisd'))->with('student_w', $student_w);

    }


    // public function update(Request $request, $wis){
       
    //     $student_wisd_update = Anecdotal_Record::find($wis);
        
    //     $student_wisd_update->observation_date_time = $request->input('observation_date_time');
    //     $student_wisd_update->description_of_incident = $request->input('description_of_incident');
    //     $student_wisd_update->location_of_incident = $request->input('location_of_incident');
    //     $student_wisd_update->action_taken = $request->input('action_taken');
    //     $student_wisd_update->recommendations = $request->input('recommendations');

    //     $student_wisd_update->update();
    //     return redirect()->back()->with('status', 'Student Updated Successfully!');
    // }


    public function create($id) {

        $anecdotal_wisdom = Anecdotal_Record::with(['student'])->where('student_id', '=', $id)->get();
        
        $student_wis = Student::find($id);

        return view('admin.student.Wisdom.Anecdotal_Record.create', compact('anecdotal_wisdom', 'student_wis'));
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
        $student_wis = Anecdotal_Record::find($id);
        $student_wis->student_id = $request->input('student_id');
        // $student_wis->observation_date_time = $request->input('observation_date_time');
        $student_wis->description_of_incident = $request->input('description_of_incident');
        $student_wis->location_of_incidents = $request->input('location_of_incidents');
        $student_wis->actions_taken = $request->input('actions_taken');
        $student_wis->recommendations = $request->input('recommendations');

        $student_wis->update();
        return redirect()->back()->with('status', 'Information Updated Successfully!');
    }

    public function destroy($id){
        $removeRec = Anecdotal_Record::findOrFail($id);
        $removeRec -> delete();
        return redirect()->back()->with('status', 'Record Deleted Successfully!');   
      }    

      public function export_wisdomStudents_Anecdotal_ID_pdf(Request $request, $id){
        $wisdomStudents_Anecdotal = Anecdotal_Record::findOrFail($id);
        $pdf = PDF::loadVIew('pdf.wisdom-anecdotal', [
            'anecdotal_records' => $wisdomStudents_Anecdotal
        ]);
        return $pdf->download('Anecdotal Record-Wisdom.pdf');
    }
}