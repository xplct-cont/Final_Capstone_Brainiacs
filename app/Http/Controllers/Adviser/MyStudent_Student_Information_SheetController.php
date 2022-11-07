<?php

namespace App\Http\Controllers\Adviser;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Anecdotal_Record;
use App\Models\Student_Information_Sheet;
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
use Image;

class MyStudent_Student_Information_SheetController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){

        $student_information_sheet_myStudent = Student_Information_Sheet::with(['student'])->where('student_id', '=', $id)->get();

        $student_myS = Student::where('user_id', auth()->user()->id)->find($id);
        if (empty($student_myS)) {
  
          abort(404);
      }
        return view('adviserpage.adviser.student.MyStudentStudent_Information_Sheet.index', compact('student_information_sheet_myStudent'))->with('student_myS', $student_myS);
      }


      
      public function store(Request $request){
  
        $sheet = new Student_Information_Sheet;
        $sheet->student_id = $request->input('student_id');

        $sheet->type_of_student = $request->input('type_of_student');
        $sheet->last_attended_school = $request->input('last_attended_school');
        $sheet->school_year = $request->input('school_year');
        //PERSONAL DATA
        $sheet->birthdate = $request->input('birthdate');
        $sheet->nationality = $request->input('nationality');
        $sheet->status = $request->input('status');
        $sheet->number = $request->input('number');
        $sheet->height = $request->input('height');
        $sheet->birthplace = $request->input('birthplace');
        $sheet->religion = $request->input('religion');
        $sheet->weight = $request->input('weight');
        //EDUCATIONAL BACKGROUND
        $sheet->elementary = $request->input('elementary');
        $sheet->secondary = $request->input('secondary');
        $sheet->elem_honors_rec = $request->input('elem_honors_rec');
        $sheet->secon_honors_rec = $request->input('secon_honors_rec');
        $sheet->elem_year_grad = $request->input('elem_year_grad');
        $sheet->secon_year_grad = $request->input('secon_year_grad');
        //FOR TRANSFEREE
        $sheet->level_last_attended = $request->input('level_last_attended');
        $sheet->school_add = $request->input('school_add');
        $sheet->year = $request->input('year');
        $sheet->reasons_for_transfer = $request->input('reasons_for_transfer');
        //AFFILIATION/ORGANIZATION
        $sheet->org_name = $request->input('org_name');
        $sheet->position = $request->input('position');
        $sheet->org_year = $request->input('org_year');
        //SELF
        $sheet->fav_sub = $request->input('fav_sub');
        $sheet->most_dif_sub = $request->input('most_dif_sub');
        $sheet->hobbies = $request->input('hobbies');
        $sheet->likes = $request->input('likes');
        $sheet->dislikes = $request->input('dislikes');
        //FAMILY BACKGROUND
        $sheet->father = $request->input('father');
        $sheet->mother = $request->input('mother');
        $sheet->father_age = $request->input('father_age');
        $sheet->mother_age = $request->input('mother_age');
        $sheet->father_occupation = $request->input('father_occupation');
        $sheet->mother_occupation = $request->input('mother_occupation');
        $sheet->father_off_ad = $request->input('father_off_ad');
        $sheet->mother_off_ad = $request->input('mother_off_ad');
        $sheet->father_educ_stat = $request->input('father_educ_stat');
        $sheet->mother_educ_stat = $request->input('mother_educ_stat');
        $sheet->monthly_income = $request->input('monthly_income');
        $sheet->mar_parents_stat = $request->input('mar_parents_stat');
        $sheet->rank_order = $request->input('rank_order');
        $sheet->no_of_brothers = $request->input('no_of_brothers');
        $sheet->no_of_sisters = $request->input('no_of_sisters');
        $sheet->living_with = $request->input('living_with');
        $sheet->how_are_you_supp = $request->input('how_are_you_supp');
        $sheet->rel_with_father = $request->input('rel_with_father');
        $sheet->rel_with_mother = $request->input('rel_with_mother');
        $sheet->rel_with_brother = $request->input('rel_with_brother');
        $sheet->rel_with_sister = $request->input('rel_with_sister');
        //IF MARRIED
        $sheet->spouse_name = $request->input('spouse_name');
        $sheet->spouse_age = $request->input('spouse_age');
        $sheet->spouse_nationality = $request->input('spouse_nationality');
        $sheet->spouse_occupation = $request->input('spouse_occupation');
        $sheet->spouse_comp_name = $request->input('spouse_comp_name');
        $sheet->company_num = $request->input('company_num');
        //HEALTH HISTORY
        $sheet->past_disease = $request->input('past_disease');
        $sheet->injuries = $request->input('injuries');
        $sheet->operations = $request->input('operations');
        $sheet->mens_history = $request->input('mens_history');
        //SIGNED
        $sheet->date_signed = $request->input('date_signed');


        // if($request->hasFile('student_image')){
        //     $file = $request->file('student_image');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     Image::make($file)->save(storage_path('/app/public/student_information_sheet/' . $filename));

        //     $sheet->student_image= $filename;
            $sheet->save();

        
        return redirect()->back()->with('status', 'Record uploaded successfully!');

    }

    public function destroy($id){
        $removeRec = Student_Information_Sheet::findOrFail($id);
        $destination = 'storage/student_information_sheet/'.$removeRec->student_image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $removeRec -> delete();
        return redirect()->back()->with('status', 'Record Deleted Successfully!');   
      }

      public function downloadInfo($id)
      {
          $myStudents_student_information_sheet = Student_Information_Sheet::findOrFail($id);
          $pdf = PDF::loadVIew('pdf.my-students-student_information_sheet', [
              'student_information_sheets' => $myStudents_student_information_sheet
          ]);
  
          return $pdf->download('My-Student Information Sheet.pdf');
      }



      public function updateInfo(Request $request, $id){
        $myStudents = Student_Information_Sheet::find($id);
        $myStudents->student_id = $request->input('student_id');

        $myStudents->type_of_student = $request->input('type_of_student');
        $myStudents->last_attended_school = $request->input('last_attended_school');
        $myStudents->school_year = $request->input('school_year');
        //PERSONAL DATA
        $myStudents->birthdate = $request->input('birthdate');
        $myStudents->nationality = $request->input('nationality');
        $myStudents->status = $request->input('status');
        $myStudents->number = $request->input('number');
        $myStudents->height = $request->input('height');
        $myStudents->birthplace = $request->input('birthplace');
        $myStudents->religion = $request->input('religion');
        $myStudents->weight = $request->input('weight');
        //EDUCATIONAL BACKGROUND
        $myStudents->elementary = $request->input('elementary');
        $myStudents->secondary = $request->input('secondary');
        $myStudents->elem_honors_rec = $request->input('elem_honors_rec');
        $myStudents->secon_honors_rec = $request->input('secon_honors_rec');
        $myStudents->elem_year_grad = $request->input('elem_year_grad');
        $myStudents->secon_year_grad = $request->input('secon_year_grad');
        //FOR TRANSFEREE
        $myStudents->level_last_attended = $request->input('level_last_attended');
        $myStudents->school_add = $request->input('school_add');
        $myStudents->year = $request->input('year');
        $myStudents->reasons_for_transfer = $request->input('reasons_for_transfer');
        //AFFILIATION/ORGANIZATION
        $myStudents->org_name = $request->input('org_name');
        $myStudents->position = $request->input('position');
        $myStudents->org_year = $request->input('org_year');
        //SELF
        $myStudents->fav_sub = $request->input('fav_sub');
        $myStudents->most_dif_sub = $request->input('most_dif_sub');
        $myStudents->hobbies = $request->input('hobbies');
        $myStudents->likes = $request->input('likes');
        $myStudents->dislikes = $request->input('dislikes');
        //FAMILY BACKGROUND
        $myStudents->father = $request->input('father');
        $myStudents->mother = $request->input('mother');
        $myStudents->father_age = $request->input('father_age');
        $myStudents->mother_age = $request->input('mother_age');
        $myStudents->father_occupation = $request->input('father_occupation');
        $myStudents->mother_occupation = $request->input('mother_occupation');
        $myStudents->father_off_ad = $request->input('father_off_ad');
        $myStudents->mother_off_ad = $request->input('mother_off_ad');
        $myStudents->father_educ_stat = $request->input('father_educ_stat');
        $myStudents->mother_educ_stat = $request->input('mother_educ_stat');
        $myStudents->monthly_income = $request->input('monthly_income');
        $myStudents->mar_parents_stat = $request->input('mar_parents_stat');
        $myStudents->rank_order = $request->input('rank_order');
        $myStudents->no_of_brothers = $request->input('no_of_brothers');
        $myStudents->no_of_sisters = $request->input('no_of_sisters');
        $myStudents->living_with = $request->input('living_with');
        $myStudents->how_are_you_supp = $request->input('how_are_you_supp');
        $myStudents->rel_with_father = $request->input('rel_with_father');
        $myStudents->rel_with_mother = $request->input('rel_with_mother');
        $myStudents->rel_with_brother = $request->input('rel_with_brother');
        $myStudents->rel_with_sister = $request->input('rel_with_sister');
        //IF MARRIED
        $myStudents->spouse_name = $request->input('spouse_name');
        $myStudents->spouse_age = $request->input('spouse_age');
        $myStudents->spouse_nationality = $request->input('spouse_nationality');
        $myStudents->spouse_occupation = $request->input('spouse_occupation');
        $myStudents->spouse_comp_name = $request->input('spouse_comp_name');
        $myStudents->company_num = $request->input('company_num');
        //HEALTH HISTORY
        $myStudents->past_disease = $request->input('past_disease');
        $myStudents->injuries = $request->input('injuries');
        $myStudents->operations = $request->input('operations');
        $myStudents->mens_history = $request->input('mens_history');
        //SIGNED
        $myStudents->date_signed = $request->input('date_signed');
    
        $myStudents->update();
        return redirect()->back()->with('status', 'Information Updated Successfully!');
    }
}

