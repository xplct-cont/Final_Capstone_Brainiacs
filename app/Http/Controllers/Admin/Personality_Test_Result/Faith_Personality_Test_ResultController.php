<?php

namespace App\Http\Controllers\Admin\Personality_Test_Result;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Anecdotal_Record;
use App\Models\Counseling_Anecdotal_Record;
use App\Models\Career_Interest_Test_Result;
use App\Models\Personality_Test_Result;
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
use Image;
use Illuminate\Support\Facades\Storage;

class Faith_Personality_Test_ResultController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
 
        $personality_test_result_faith = Personality_Test_Result::with(['student'])->where('student_id', '=', $id)->get();
        
  
        $student_fai = Student::find($id);
        return view('admin.student.Faith.Personality_Test_Result.index', compact('personality_test_result_faith', 'student_fai'));
      }
  
      public function store(Request $request){
  
          $result = new Personality_Test_Result;
          $result->student_id = $request->input('student_id');
  
          if($request->hasFile('personality_result')){
              $file = $request->file('personality_result');
              $filename = time() . '.' . $file->getClientOriginalExtension();
              Image::make($file)->save(storage_path('/app/public/personality_test_result/' . $filename));
  
              $result->personality_result= $filename;
              $result->save();
  
          }
          return redirect()->back()->with('status', 'Record uploaded successfully!');
  
      }
  
      public function destroy($id){
          $removeRec = Personality_Test_Result::findOrFail($id);
          $destination = 'storage/personality_test_result/'.$removeRec->personality_result;
          if(File::exists($destination)){
              File::delete($destination);
          }
          $removeRec -> delete();
          return redirect()->back()->with('status', 'Record Deleted Successfully!');   
        }
  
  
        public function downloadFile($id)
      {
          $faithStudents_personality_test_result = Personality_Test_Result::findOrFail($id);
          $pdf = PDF::loadVIew('pdf.faith-personality_test_result', [
              'personality_test_results' => $faithStudents_personality_test_result
          ]);
  
          return $pdf->download('Faith-Personality Test Result.pdf');
      }
}