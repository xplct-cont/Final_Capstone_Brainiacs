<?php

namespace App\Http\Controllers\Admin\Student_Information_Sheet;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Anecdotal_Record;
use App\Models\Counseling_Anecdotal_Record;
use App\Models\Career_Interest_Test_Result;
use App\Models\Personality_Test_Result;
use App\Models\Student_Information_Sheet;
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

class Wisdom_Student_Information_SheetController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
 
        $student_information_sheet_wisdom = Student_Information_Sheet::with(['student'])->where('student_id', '=', $id)->get();
        
  
        $student_wis = Student::find($id);
        return view('admin.student.Wisdom.Student_Information_Sheet.index', compact('student_information_sheet_wisdom', 'student_wis'));
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
        // $destination = 'storage/student_information_sheet/'.$removeRec->student_image;
        // if(File::exists($destination)){
        //     File::delete($destination);
        // }
        $removeRec -> delete();
        return redirect()->back()->with('status', 'Record Deleted Successfully!');   
      }

      
      public function downloadInfo($id)
      {
          $wisdomStudents_student_information_sheet = Student_Information_Sheet::findOrFail($id);
          $pdf = PDF::loadVIew('pdf.wisdom-student_information_sheet', [
              'student_information_sheets' => $wisdomStudents_student_information_sheet
          ]);
  
          return $pdf->download('Wisdom-Student Information Sheet.pdf');
      }

      public function updateInfo(Request $request, $id){
        $wisdomStudents = Student_Information_Sheet::find($id);
        $wisdomStudents->student_id = $request->input('student_id');

        $wisdomStudents->type_of_student = $request->input('type_of_student');
        $wisdomStudents->last_attended_school = $request->input('last_attended_school');
        $wisdomStudents->school_year = $request->input('school_year');
        //PERSONAL DATA
        $wisdomStudents->birthdate = $request->input('birthdate');
        $wisdomStudents->nationality = $request->input('nationality');
        $wisdomStudents->status = $request->input('status');
        $wisdomStudents->number = $request->input('number');
        $wisdomStudents->height = $request->input('height');
        $wisdomStudents->birthplace = $request->input('birthplace');
        $wisdomStudents->religion = $request->input('religion');
        $wisdomStudents->weight = $request->input('weight');
        //EDUCATIONAL BACKGROUND
        $wisdomStudents->elementary = $request->input('elementary');
        $wisdomStudents->secondary = $request->input('secondary');
        $wisdomStudents->elem_honors_rec = $request->input('elem_honors_rec');
        $wisdomStudents->secon_honors_rec = $request->input('secon_honors_rec');
        $wisdomStudents->elem_year_grad = $request->input('elem_year_grad');
        $wisdomStudents->secon_year_grad = $request->input('secon_year_grad');
        //FOR TRANSFEREE
        $wisdomStudents->level_last_attended = $request->input('level_last_attended');
        $wisdomStudents->school_add = $request->input('school_add');
        $wisdomStudents->year = $request->input('year');
        $wisdomStudents->reasons_for_transfer = $request->input('reasons_for_transfer');
        //AFFILIATION/ORGANIZATION
        $wisdomStudents->org_name = $request->input('org_name');
        $wisdomStudents->position = $request->input('position');
        $wisdomStudents->org_year = $request->input('org_year');
        //SELF
        $wisdomStudents->fav_sub = $request->input('fav_sub');
        $wisdomStudents->most_dif_sub = $request->input('most_dif_sub');
        $wisdomStudents->hobbies = $request->input('hobbies');
        $wisdomStudents->likes = $request->input('likes');
        $wisdomStudents->dislikes = $request->input('dislikes');
        //FAMILY BACKGROUND
        $wisdomStudents->father = $request->input('father');
        $wisdomStudents->mother = $request->input('mother');
        $wisdomStudents->father_age = $request->input('father_age');
        $wisdomStudents->mother_age = $request->input('mother_age');
        $wisdomStudents->father_occupation = $request->input('father_occupation');
        $wisdomStudents->mother_occupation = $request->input('mother_occupation');
        $wisdomStudents->father_off_ad = $request->input('father_off_ad');
        $wisdomStudents->mother_off_ad = $request->input('mother_off_ad');
        $wisdomStudents->father_educ_stat = $request->input('father_educ_stat');
        $wisdomStudents->mother_educ_stat = $request->input('mother_educ_stat');
        $wisdomStudents->monthly_income = $request->input('monthly_income');
        $wisdomStudents->mar_parents_stat = $request->input('mar_parents_stat');
        $wisdomStudents->rank_order = $request->input('rank_order');
        $wisdomStudents->no_of_brothers = $request->input('no_of_brothers');
        $wisdomStudents->no_of_sisters = $request->input('no_of_sisters');
        $wisdomStudents->living_with = $request->input('living_with');
        $wisdomStudents->how_are_you_supp = $request->input('how_are_you_supp');
        $wisdomStudents->rel_with_father = $request->input('rel_with_father');
        $wisdomStudents->rel_with_mother = $request->input('rel_with_mother');
        $wisdomStudents->rel_with_brother = $request->input('rel_with_brother');
        $wisdomStudents->rel_with_sister = $request->input('rel_with_sister');
        //IF MARRIED
        $wisdomStudents->spouse_name = $request->input('spouse_name');
        $wisdomStudents->spouse_age = $request->input('spouse_age');
        $wisdomStudents->spouse_nationality = $request->input('spouse_nationality');
        $wisdomStudents->spouse_occupation = $request->input('spouse_occupation');
        $wisdomStudents->spouse_comp_name = $request->input('spouse_comp_name');
        $wisdomStudents->company_num = $request->input('company_num');
        //HEALTH HISTORY
        $wisdomStudents->past_disease = $request->input('past_disease');
        $wisdomStudents->injuries = $request->input('injuries');
        $wisdomStudents->operations = $request->input('operations');
        $wisdomStudents->mens_history = $request->input('mens_history');
        //SIGNED
        $wisdomStudents->date_signed = $request->input('date_signed');
    
        $wisdomStudents->update();
        return redirect()->back()->with('status', 'Information Updated Successfully!');
    }

}