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

class Charity_Anecdotal_RecordController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
 
      $anecdotal_charity = Anecdotal_Record::with(['student'])->where('student_id', '=', $id)->get();
      

      $student_cha = Student::find($id);
      return view('admin.student.Charity.Anecdotal_Record.index', compact('anecdotal_charity', 'student_cha'));
    }


    public function show(Student $id, $student){

        $student_char = Anecdotal_Record::with(['student'])->find($student);
        if (empty($student_char)) {
  
          abort(404);
      }
    
      try{
        $student_c = Student::find($id);
       
      }
      catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
          abort(404);
      } 

        return view('admin.student.Charity.Anecdotal_Record.show', compact( 'student_char'))->with('student_c', $student_c);
    }


    public function create($id) {

        $anecdotal_charity = Anecdotal_Record::with(['student'])->where('student_id', '=', $id)->get();
        
        $student_cha = Student::find($id);

        return view('admin.student.Charity.Anecdotal_Record.create', compact('anecdotal_charity', 'student_cha'));
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

        $student_cha = Anecdotal_Record::create([
                   
            'student_id' => $request->student_id,
            'observation_date_time' => $request->observation_date_time,
            'description_of_incident'  => $request->description_of_incident,
            'location_of_incidents' => $request->location_of_incidents,
            'actions_taken' => $request->actions_taken,
            'recommendations' => $request->recommendations,
           
        ]);
        return redirect()->back()->with('status','Added New Record!');
    }

        public function destroy(Anecdotal_Record $id){
            $removeRec = Anecdotal_Record::find($id)->each->delete();
            return redirect()->back()->with('status', 'Record Deleted Successfully!');
        
            
    }
}