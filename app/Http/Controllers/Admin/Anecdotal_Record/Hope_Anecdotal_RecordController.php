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

class Hope_Anecdotal_RecordController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
 
      $anecdotal_hope = Anecdotal_Record::with(['student'])->where('student_id', '=', $id)->get();
      

      $student_hop = Student::find($id);
      return view('admin.student.Hope.Anecdotal_Record.index', compact('anecdotal_hope', 'student_hop'));
    }


    public function show(Student $id, $student){

        $student_hope = Anecdotal_Record::with(['student'])->find($student);
        if (empty($student_hope)) {
  
          abort(404);
      }
    
      try{
        $student_h = Student::find($id);
       
      }
      catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
          abort(404);
      } 

        return view('admin.student.Hope.Anecdotal_Record.show', compact( 'student_hope'))->with('student_h', $student_h);
    }



    public function create($id) {

        $anecdotal_hope = Anecdotal_Record::with(['student'])->where('student_id', '=', $id)->get();
        
        $student_hop = Student::find($id);

        return view('admin.student.Hope.Anecdotal_Record.create', compact('anecdotal_hope', 'student_hop'));
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

        $student_hop = Anecdotal_Record::create([
                   
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
        $student_hop = Anecdotal_Record::find($id);
        $student_hop->student_id = $request->input('student_id');
        // $student_hop->observation_date_time = $request->input('observation_date_time');
        $student_hop->description_of_incident = $request->input('description_of_incident');
        $student_hop->location_of_incidents = $request->input('location_of_incidents');
        $student_hop->actions_taken = $request->input('actions_taken');
        $student_hop->recommendations = $request->input('recommendations');

        $student_hop->update();
        return redirect()->back()->with('status', 'Information Updated Successfully!');
    }


    public function destroy($id){
        $removeRec = Anecdotal_Record::findOrFail($id);
        $removeRec -> delete();
        return redirect()->back()->with('status', 'Record Deleted Successfully!');   
      }

      public function export_hopeStudents_Anecdotal_ID_pdf(Request $request, $id){
        $hopeStudents_Anecdotal = Anecdotal_Record::findOrFail($id);
        $pdf = PDF::loadVIew('pdf.hope-anecdotal', [
            'anecdotal_records' => $hopeStudents_Anecdotal
        ]);
        return $pdf->download('Anecdotal Record-Hope.pdf');
    }
    
}