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

class Charity_Student_Information_SheetController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
 
        $student_information_sheet_charity = Student_Information_Sheet::with(['student'])->where('student_id', '=', $id)->get();
        
  
        $student_cha = Student::find($id);
        return view('admin.student.Charity.Student_Information_Sheet.index', compact('student_information_sheet_charity', 'student_cha'));
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
          $charityStudents_student_information_sheet = Student_Information_Sheet::findOrFail($id);
          $pdf = PDF::loadVIew('pdf.charity-student_information_sheet', [
              'student_information_sheets' => $charityStudents_student_information_sheet
          ]);
  
          return $pdf->download('Charity-Student Information Sheet.pdf');
      }


      public function updateInfo(Request $request, $id){
        $charityStudents = Student_Information_Sheet::find($id);
        $charityStudents->student_id = $request->input('student_id');

        $charityStudents->type_of_student = $request->input('type_of_student');
        $charityStudents->last_attended_school = $request->input('last_attended_school');
        $charityStudents->school_year = $request->input('school_year');
        //PERSONAL DATA
        $charityStudents->birthdate = $request->input('birthdate');
        $charityStudents->nationality = $request->input('nationality');
        $charityStudents->status = $request->input('status');
        $charityStudents->number = $request->input('number');
        $charityStudents->height = $request->input('height');
        $charityStudents->birthplace = $request->input('birthplace');
        $charityStudents->religion = $request->input('religion');
        $charityStudents->weight = $request->input('weight');
        //EDUCATIONAL BACKGROUND
        $charityStudents->elementary = $request->input('elementary');
        $charityStudents->secondary = $request->input('secondary');
        $charityStudents->elem_honors_rec = $request->input('elem_honors_rec');
        $charityStudents->secon_honors_rec = $request->input('secon_honors_rec');
        $charityStudents->elem_year_grad = $request->input('elem_year_grad');
        $charityStudents->secon_year_grad = $request->input('secon_year_grad');
        //FOR TRANSFEREE
        $charityStudents->level_last_attended = $request->input('level_last_attended');
        $charityStudents->school_add = $request->input('school_add');
        $charityStudents->year = $request->input('year');
        $charityStudents->reasons_for_transfer = $request->input('reasons_for_transfer');
        //AFFILIATION/ORGANIZATION
        $charityStudents->org_name = $request->input('org_name');
        $charityStudents->position = $request->input('position');
        $charityStudents->org_year = $request->input('org_year');
        //SELF
        $charityStudents->fav_sub = $request->input('fav_sub');
        $charityStudents->most_dif_sub = $request->input('most_dif_sub');
        $charityStudents->hobbies = $request->input('hobbies');
        $charityStudents->likes = $request->input('likes');
        $charityStudents->dislikes = $request->input('dislikes');
        //FAMILY BACKGROUND
        $charityStudents->father = $request->input('father');
        $charityStudents->mother = $request->input('mother');
        $charityStudents->father_age = $request->input('father_age');
        $charityStudents->mother_age = $request->input('mother_age');
        $charityStudents->father_occupation = $request->input('father_occupation');
        $charityStudents->mother_occupation = $request->input('mother_occupation');
        $charityStudents->father_off_ad = $request->input('father_off_ad');
        $charityStudents->mother_off_ad = $request->input('mother_off_ad');
        $charityStudents->father_educ_stat = $request->input('father_educ_stat');
        $charityStudents->mother_educ_stat = $request->input('mother_educ_stat');
        $charityStudents->monthly_income = $request->input('monthly_income');
        $charityStudents->mar_parents_stat = $request->input('mar_parents_stat');
        $charityStudents->rank_order = $request->input('rank_order');
        $charityStudents->no_of_brothers = $request->input('no_of_brothers');
        $charityStudents->no_of_sisters = $request->input('no_of_sisters');
        $charityStudents->living_with = $request->input('living_with');
        $charityStudents->how_are_you_supp = $request->input('how_are_you_supp');
        $charityStudents->rel_with_father = $request->input('rel_with_father');
        $charityStudents->rel_with_mother = $request->input('rel_with_mother');
        $charityStudents->rel_with_brother = $request->input('rel_with_brother');
        $charityStudents->rel_with_sister = $request->input('rel_with_sister');
        //IF MARRIED
        $charityStudents->spouse_name = $request->input('spouse_name');
        $charityStudents->spouse_age = $request->input('spouse_age');
        $charityStudents->spouse_nationality = $request->input('spouse_nationality');
        $charityStudents->spouse_occupation = $request->input('spouse_occupation');
        $charityStudents->spouse_comp_name = $request->input('spouse_comp_name');
        $charityStudents->company_num = $request->input('company_num');
        //HEALTH HISTORY
        $charityStudents->past_disease = $request->input('past_disease');
        $charityStudents->injuries = $request->input('injuries');
        $charityStudents->operations = $request->input('operations');
        $charityStudents->mens_history = $request->input('mens_history');
        //SIGNED
        $charityStudents->date_signed = $request->input('date_signed');
    
        $charityStudents->update();
        return redirect()->back()->with('status', 'Information Updated Successfully!');
    }
    
}
