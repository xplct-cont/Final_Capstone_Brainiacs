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

class Love_Anecdotal_RecordController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
 
      $anecdotal_love = Anecdotal_Record::with(['student'])->where('student_id', '=', $id)->get();
      

      $student_lov = Student::find($id);
      return view('admin.student.Love.Anecdotal_Record.index', compact('anecdotal_love', 'student_lov'));
    }


    public function show(Student $id, $student){

        $student_love = Anecdotal_Record::with(['student'])->find($student);
        if (empty($student_love)) {
  
          abort(404);
      }
    
      try{
        $student_l = Student::find($id);
       
      }
      catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
          abort(404);
      } 

        return view('admin.student.Love.Anecdotal_Record.show', compact( 'student_love'))->with('student_l', $student_l);
    }



    public function create($id) {

        $anecdotal_love = Anecdotal_Record::with(['student'])->where('student_id', '=', $id)->get();
        
        $student_lov = Student::find($id);

        return view('admin.student.Love.Anecdotal_Record.create', compact('anecdotal_love', 'student_lov'));
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

        $student_lov = Anecdotal_Record::create([
                   
            'student_id' => $request->student_id,
            'observation_date_time' => $request->observation_date_time,
            'description_of_incident'  => $request->description_of_incident,
            'location_of_incidents' => $request->location_of_incidents,
            'actions_taken' => $request->actions_taken,
            'recommendations' => $request->recommendations,
           
        ]);
        return redirect()->back()->with('status','Added New Record!');
    }

    public function destroy($id){
        $removeRec = Anecdotal_Record::findOrFail($id);
        $removeRec -> delete();
        return redirect()->back()->with('status', 'Record Deleted Successfully!');   
      }

      public function export_loveStudents_Anecdotal_ID_pdf(Request $request, $id){
        $loveStudents_Anecdotal = Anecdotal_Record::findOrFail($id);
        $pdf = PDF::loadVIew('pdf.love-anecdotal', [
            'anecdotal_records' => $loveStudents_Anecdotal
        ]);
        return $pdf->download('Anecdotal_Record_Love.pdf');
    }
    
}