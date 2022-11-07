<?php

use Carbon\Carbon;
use App\Notifications\EmailNotification;
use App\Mail\EmailNotif;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\Admin\AdviserController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\Student\WisdomStudentController;
use App\Http\Controllers\Admin\Student\FaithStudentController;
use App\Http\Controllers\Admin\Student\CharityStudentController;
use App\Http\Controllers\Admin\Student\HopeStudentController;
use App\Http\Controllers\Admin\Student\LoveStudentController;
use App\Http\Controllers\Admin\Parent\ParentController;
use App\Http\Controllers\Admin\Parent\ParentEmailController;
use App\Models\User;
use App\Models\Student;

use App\Http\Controllers\Admin\Anecdotal_Record\Wisdom_Anecdotal_RecordController;
use App\Http\Controllers\Admin\Anecdotal_Record\Charity_Anecdotal_RecordController;
use App\Http\Controllers\Admin\Anecdotal_Record\Faith_Anecdotal_RecordController;
use App\Http\Controllers\Admin\Anecdotal_Record\Hope_Anecdotal_RecordController;
use App\Http\Controllers\Admin\Anecdotal_Record\Love_Anecdotal_RecordController;

use App\Http\Controllers\Admin\Counseling_Anecdotal_Record\Wisdom_Counseling_Anecdotal_RecordController;
use App\Http\Controllers\Admin\Counseling_Anecdotal_Record\Charity_Counseling_Anecdotal_RecordController;
use App\Http\Controllers\Admin\Counseling_Anecdotal_Record\Faith_Counseling_Anecdotal_RecordController;
use App\Http\Controllers\Admin\Counseling_Anecdotal_Record\Hope_Counseling_Anecdotal_RecordController;
use App\Http\Controllers\Admin\Counseling_Anecdotal_Record\Love_Counseling_Anecdotal_RecordController;

use App\Http\Controllers\Admin\Parent_Conference_Record\Wisdom_Parent_Conference_RecordController;
use App\Http\Controllers\Admin\Parent_Conference_Record\Charity_Parent_Conference_RecordController;
use App\Http\Controllers\Admin\Parent_Conference_Record\Faith_Parent_Conference_RecordController;
use App\Http\Controllers\Admin\Parent_Conference_Record\Hope_Parent_Conference_RecordController;
use App\Http\Controllers\Admin\Parent_Conference_Record\Love_Parent_Conference_RecordController;

use App\Http\Controllers\Admin\Career_Interest_Test_Result\Wisdom_Career_Interest_Test_ResultController;
use App\Http\Controllers\Admin\Career_Interest_Test_Result\Charity_Career_Interest_Test_ResultController;
use App\Http\Controllers\Admin\Career_Interest_Test_Result\Faith_Career_Interest_Test_ResultController;
use App\Http\Controllers\Admin\Career_Interest_Test_Result\Hope_Career_Interest_Test_ResultController;
use App\Http\Controllers\Admin\Career_Interest_Test_Result\Love_Career_Interest_Test_ResultController;

use App\Http\Controllers\Admin\Personality_Test_Result\Wisdom_Personality_Test_ResultController;
use App\Http\Controllers\Admin\Personality_Test_Result\Charity_Personality_Test_ResultController;
use App\Http\Controllers\Admin\Personality_Test_Result\Faith_Personality_Test_ResultController;
use App\Http\Controllers\Admin\Personality_Test_Result\Hope_Personality_Test_ResultController;
use App\Http\Controllers\Admin\Personality_Test_Result\Love_Personality_Test_ResultController;

use App\Http\Controllers\Admin\Student_Information_Sheet\Wisdom_Student_Information_SheetController;
use App\Http\Controllers\Admin\Student_Information_Sheet\Charity_Student_Information_SheetController;
use App\Http\Controllers\Admin\Student_Information_Sheet\Faith_Student_Information_SheetController;
use App\Http\Controllers\Admin\Student_Information_Sheet\Hope_Student_Information_SheetController;
use App\Http\Controllers\Admin\Student_Information_Sheet\Love_Student_Information_SheetController;

use App\Http\Controllers\AdviserHomePageController;
use App\Http\Controllers\Adviser\AdviserProfileController;
use App\Http\Controllers\Adviser\StudentListController;
use App\Http\Controllers\Adviser\ParentListController;
use App\Http\Controllers\Adviser\MyStudent_Anecdotal_RecordController;
use App\Http\Controllers\Adviser\Parent_EmailController;
use App\Http\Controllers\Adviser\MyStudent_Student_Information_SheetController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('/auth/login');
});


Route::middleware(['auth', ])->group(function () {
    Route::get('/approval', 'HomeController@approval')->name('approval');
  

    Route::middleware(['approved'])->group(function () {
        Route::middleware(['admin'])->group(function(){
            Route::get('/home', 'HomeController@index')->name('home');
        });   
       
    });

    Route::middleware(['admin', ])->group(function () {
        Route::get('/users', 'UserController@index')->name('users');
        Route::get('/users/{user_id}/approve', 'UserController@approve')->name('admin.users.approve');
        Route::get('/users/{user_id}/destroy', 'UserController@destroy')->name('admin.users.destroy');


        // Route::get('/advisers', [
        //     AdviserController::class, 'index'
        // ])->name('advisers');
        // Route::get('/show-adviser/{id}', [
        //     AdviserController::class, 'show']);
        Route::get('/delete-adviser/{id}', [
            HomeController::class, 'delete']);
        Route::get('/edit-adviser/{id}', [
            HomeController::class, 'edit']);
        Route::put('/update-adviser/{id}', [
            HomeController::class, 'update']);


            //for PDF and Excel Advisers
        Route::get('export_advisers_pdf', [HomeController::class, 'export_advisers_pdf'])->name('export_advisers_pdf');
        Route::get('export_advisers_excel', [HomeController::class, 'export_advisers_excel'])->name('export_advisers_excel');
          
        //for PDF and Excel Wisdom Students
        Route::get('export_wisdomStudents_pdf', [WisdomStudentController::class, 'export_wisdomStudents_pdf'])->name('export_wisdomStudents_pdf');
        Route::get('export_wisdomStudents_excel', [WisdomStudentController::class, 'export_wisdomStudents_excel'])->name('export_wisdomStudents_excel');

        Route::get('export_wisdomStudents_anecdotal_pdf/{id}', [Wisdom_Anecdotal_RecordController::class, 'export_wisdomStudents_Anecdotal_ID_pdf'])->name('export_wisdomStudents_anecdotal_pdf');
        Route::get('export_wisdomStudents_counseling_anecdotal_pdf/{id}', [Wisdom_Counseling_Anecdotal_RecordController::class, 'export_wisdomStudents_Counseling_Anecdotal_ID_pdf'])->name('export_wisdomStudents_counseling_anecdotal_pdf');
       
        Route::get('export_wisdomStudents_parent_conference_record_pdf/{id}', [Wisdom_Parent_Conference_RecordController::class, 'export_wisdomStudents_Parent_Conference_Record_ID_pdf'])->name('export_wisdomStudents_parent_conference_record_pdf');

        Route::get('export_wisdomStudents_student_information_sheet_pdf/{id}', [Wisdom_Student_Information_SheetController::class, 'downloadInfo'])->name('export_wisdomStudents_student_information_sheet_pdf');

        //for PDF and Excel Faith Students
        Route::get('export_faithStudents_pdf', [FaithStudentController::class, 'export_faithStudents_pdf'])->name('export_faithStudents_pdf');
        Route::get('export_faithStudents_excel', [FaithStudentController::class, 'export_faithStudents_excel'])->name('export_faithStudents_excel');
          
        Route::get('export_faithStudents_anecdotal_pdf/{id}', [Faith_Anecdotal_RecordController::class, 'export_faithStudents_Anecdotal_ID_pdf'])->name('export_faithStudents_anecdotal_pdf');
        Route::get('export_faithStudents_counseling_anecdotal_pdf/{id}', [Faith_Counseling_Anecdotal_RecordController::class, 'export_faithStudents_Counseling_Anecdotal_ID_pdf'])->name('export_faithStudents_counseling_anecdotal_pdf');

        Route::get('export_faithStudents_parent_conference_record_pdf/{id}', [Faith_Parent_Conference_RecordController::class, 'export_faithStudents_Parent_Conference_Record_ID_pdf'])->name('export_faithStudents_parent_conference_record_pdf');

        Route::get('export_faithStudents_student_information_sheet_pdf/{id}', [Faith_Student_Information_SheetController::class, 'downloadInfo'])->name('export_faithStudents_student_information_sheet_pdf');

        //for PDF and Excel Charity Students
        Route::get('export_charityStudents_pdf', [CharityStudentController::class, 'export_charityStudents_pdf'])->name('export_charityStudents_pdf');
        Route::get('export_charityStudents_excel', [CharityStudentController::class, 'export_charityStudents_excel'])->name('export_charityStudents_excel'); 
        
        Route::get('export_charityStudents_anecdotal_pdf/{id}', [Charity_Anecdotal_RecordController::class, 'export_charityStudents_Anecdotal_ID_pdf'])->name('export_charityStudents_anecdotal_pdf');
        Route::get('export_charityStudents_counseling_anecdotal_pdf/{id}', [Charity_Counseling_Anecdotal_RecordController::class, 'export_charityStudents_Counseling_Anecdotal_ID_pdf'])->name('export_charityStudents_counseling_anecdotal_pdf');

        Route::get('export_charityStudents_parent_conference_record_pdf/{id}', [Charity_Parent_Conference_RecordController::class, 'export_charityStudents_Parent_Conference_Record_ID_pdf'])->name('export_charityStudents_parent_conference_record_pdf');

        Route::get('export_charityStudents_student_information_sheet_pdf/{id}', [Charity_Student_Information_SheetController::class, 'downloadInfo'])->name('export_charityStudents_student_information_sheet_pdf');
       
        //for PDF and Excel Hope Students
        Route::get('export_hopeStudents_pdf', [HopeStudentController::class, 'export_hopeStudents_pdf'])->name('export_hopeStudents_pdf');
        Route::get('export_hopeStudents_excel', [HopeStudentController::class, 'export_hopeStudents_excel'])->name('export_hopeStudents_excel'); 
        
        Route::get('export_hopeStudents_anecdotal_pdf/{id}', [Hope_Anecdotal_RecordController::class, 'export_hopeStudents_Anecdotal_ID_pdf'])->name('export_hopeStudents_anecdotal_pdf');
        Route::get('export_hopeStudents_counseling_anecdotal_pdf/{id}', [Hope_Counseling_Anecdotal_RecordController::class, 'export_hopeStudents_Counseling_Anecdotal_ID_pdf'])->name('export_hopeStudents_counseling_anecdotal_pdf');

        Route::get('export_hopeStudents_parent_conference_record_pdf/{id}', [Hope_Parent_Conference_RecordController::class, 'export_hopeStudents_Parent_Conference_Record_ID_pdf'])->name('export_hopeStudents_parent_conference_record_pdf');

        Route::get('export_hopeStudents_student_information_sheet_pdf/{id}', [Hope_Student_Information_SheetController::class, 'downloadInfo'])->name('export_hopeStudents_student_information_sheet_pdf');

        //for PDF and Excel Love Students
        Route::get('export_loveStudents_pdf', [LoveStudentController::class, 'export_loveStudents_pdf'])->name('export_loveStudents_pdf');
        Route::get('export_loveStudents_excel', [LoveStudentController::class, 'export_loveStudents_excel'])->name('export_loveStudents_excel'); 
             
        Route::get('export_loveStudents_anecdotal_pdf/{id}', [Love_Anecdotal_RecordController::class, 'export_loveStudents_Anecdotal_ID_pdf'])->name('export_loveStudents_anecdotal_pdf');
        Route::get('export_loveStudents_counseling_anecdotal_pdf/{id}', [Love_Counseling_Anecdotal_RecordController::class, 'export_loveStudents_Counseling_Anecdotal_ID_pdf'])->name('export_loveStudents_counseling_anecdotal_pdf');

        Route::get('export_loveStudents_parent_conference_record_pdf/{id}', [Love_Parent_Conference_RecordController::class, 'export_loveStudents_Parent_Conference_Record_ID_pdf'])->name('export_loveStudents_parent_conference_record_pdf');

        Route::get('export_loveStudents_student_information_sheet_pdf/{id}', [Love_Student_Information_SheetController::class, 'downloadInfo'])->name('export_loveStudents_student_information_sheet_pdf');

        //for edit admin profile
        Route::get('/adminprofile', [
                AdminProfileController::class, 'index'
            ])->name('adminprofile');
            
            
        Route::post('/adminprofile', [AdminProfileController::class, 'update_avatar']);     
        Route::get('/edit-info/{id}', [AdminProfileController::class, 'edit']);
        Route::put('/update-info/{id}', [AdminProfileController::class, 'update']);

        Route::get('/admin-change-password/{id}', [
            AdminProfileController::class, 'passwordIndex'
        ])->name('admin-change-password');

        Route::post('/admin-change-password', [AdminProfileController::class, 'passwordChange'])->name('admin-save-password');   



        //for 11 Wisdom Students
       Route::get('wisdom-students', [WisdomStudentController::class, 'index'])->name('wisdom-list');
       Route::get('/edit-wisdom-student/{id}', [WisdomStudentController::class, 'edit']);
       Route::get('/add-wisdom-student',[WisdomStudentController::class, 'create']);
       Route::post('/add-new-wisdom-student', [WisdomStudentController::class, 'store']);
       Route::post('/multiple-delete', [WisdomStudentController::class, 'multipleDelete']);
       Route::put('/update-wisdom-student/{id}', [WisdomStudentController::class, 'update'])->name('update-wisdom-student');
       Route::get('/show-student-wisdom/{id}', [WisdomStudentController::class, 'showStudentRecord']);
    
       
       Route::get('/show-student-wisdom/{id}/anecdotal_record_wisdom/', [Wisdom_Anecdotal_RecordController::class, 'index'])->name('wisdom-anecdotal');
       Route::get('/show-student-wisdom/{id}/anecdotal_record_wisdom/create',[Wisdom_Anecdotal_RecordController::class, 'create']);
       Route::get('/show-student-wisdom/{id}/anecdotal_record_wisdom/{student}', [Wisdom_Anecdotal_RecordController::class, 'show'])->name('wisdom-student-anecdotal-list');
       Route::post('/add_anecdotal_record_wisdom',[Wisdom_Anecdotal_RecordController::class, 'store']);
       Route::put('/update_anecdotal_record_wisdom/{id}', [Wisdom_Anecdotal_RecordController::class, 'update']);
       Route::get('/delete_anecdotal_record_wisdom/{id}', [Wisdom_Anecdotal_RecordController::class, 'destroy']);


       Route::get('/show-student-wisdom/{id}/counseling_anecdotal_record_wisdom/', [Wisdom_Counseling_Anecdotal_RecordController::class, 'index']);
       Route::get('/show-student-wisdom/{id}/counseling_anecdotal_record_wisdom/create',[Wisdom_Counseling_Anecdotal_RecordController::class, 'create']);
       Route::get('/show-student-wisdom/{id}/counseling_anecdotal_record_wisdom/{student}', [Wisdom_Counseling_Anecdotal_RecordController::class, 'show']);
       Route::post('/add_counseling_anecdotal_record_wisdom', [Wisdom_Counseling_Anecdotal_RecordController::class, 'store']);
       Route::put('/update_counseling_anecdotal_record_wisdom/{id}', [Wisdom_Counseling_Anecdotal_RecordController::class, 'update']);
       Route::get('/delete_counseling_anecdotal_record_wisdom/{id}', [Wisdom_Counseling_Anecdotal_RecordController::class, 'destroy']);
    
       
       Route::post('/send_email_student_wisdom', [WisdomStudentController::class, 'sendEmailStudent']);

       
       Route::get('/show-student-wisdom/{id}/parent_conference_record_wisdom/', [Wisdom_Parent_Conference_RecordController::class, 'index'])->name('wisdom-parent_conference_record');
       Route::get('/show-student-wisdom/{id}/parent_conference_record_wisdom/create',[Wisdom_Parent_Conference_RecordController::class, 'create']);
       Route::get('/show-student-wisdom/{id}/parent_conference_record_wisdom/{student}', [Wisdom_Parent_Conference_RecordController::class, 'show']);
       Route::post('/add_parent_conference_record_wisdom', [Wisdom_Parent_Conference_RecordController::class, 'store']);
       Route::put('/update_parent_conference_record_wisdom/{id}', [Wisdom_Parent_Conference_RecordController::class, 'update']);
       Route::get('/delete_parent_conference_record_wisdom/{id}', [Wisdom_Parent_Conference_RecordController::class, 'destroy']);


       Route::get('/show-student-wisdom/{id}/career_interest_test_result_wisdom/', [Wisdom_Career_Interest_Test_ResultController::class, 'index'])->name('wisdom-career_interest_test_result');
       Route::post('/upload_career_interest_result_wisdom', [Wisdom_Career_Interest_Test_ResultController::class, 'store']);   
       Route::get('/delete_career_interest_test_result_wisdom/{id}', [Wisdom_Career_Interest_Test_ResultController::class, 'destroy']);
       Route::get('/download_career_interest_test_result_wisdom/{id}',[Wisdom_Career_Interest_Test_ResultController::class, 'downloadFile'])->name('download_career_interest_test_result_wisdom');


       Route::get('/show-student-wisdom/{id}/personality_test_result_wisdom/', [Wisdom_Personality_Test_ResultController::class, 'index'])->name('wisdom-personality_test_result');
       Route::post('/upload_personality_result_wisdom', [Wisdom_Personality_Test_ResultController::class, 'store']);   
       Route::get('/delete_personality_test_result_wisdom/{id}', [Wisdom_Personality_Test_ResultController::class, 'destroy']);
       Route::get('/download_personality_test_result_wisdom/{id}',[Wisdom_Personality_Test_ResultController::class, 'downloadFile'])->name('download_personality_test_result_wisdom');


       Route::get('/show-student-wisdom/{id}/student_information_sheet_wisdom/', [Wisdom_Student_Information_SheetController::class, 'index'])->name('wisdom-student_information_sheet');
       Route::post('/upload_student_information_wisdom', [Wisdom_Student_Information_SheetController::class, 'store']);   
       Route::get('/delete_student_information_sheet_wisdom/{id}', [Wisdom_Student_Information_SheetController::class, 'destroy']);
       Route::put('/update_student_information_sheet_wisdom/{id}', [Wisdom_Student_Information_SheetController::class, 'updateInfo']);

       //for 11 Faith Students
       Route::get('faith-students', [FaithStudentController::class, 'index'])->name('faith-list');
       Route::get('/edit-faith-student/{id}', [FaithStudentController::class, 'edit']);
       Route::get('/add-faith-student',[FaithStudentController::class, 'create']);
       Route::post('/add-new-faith-student', [FaithStudentController::class, 'store']);
       Route::post('/multiple-delete', [FaithStudentController::class, 'multipleDelete']);
       Route::put('/update-faith-student/{id}', [FaithStudentController::class, 'update'])->name('update-faith-student');
       Route::get('/show-student-faith/{id}', [FaithStudentController::class, 'showStudentRecord']);
      
       Route::get('/show-student-faith/{id}/anecdotal_record_faith/', [Faith_Anecdotal_RecordController::class, 'index'])->name('faith-anecdotal');
       Route::get('/show-student-faith/{id}/anecdotal_record_faith/create',[Faith_Anecdotal_RecordController::class, 'create']);
       Route::get('/show-student-faith/{id}/anecdotal_record_faith/{student}', [Faith_Anecdotal_RecordController::class, 'show'])->name('faith-student-anecdotal-list');
       Route::post('/add_anecdotal_record_faith',[Faith_Anecdotal_RecordController::class, 'store']);
       Route::put('/update_anecdotal_record_faith/{id}', [Faith_Anecdotal_RecordController::class, 'update']);
       Route::get('/delete_anecdotal_record_faith/{id}', [Faith_Anecdotal_RecordController::class, 'destroy']);


       Route::get('/show-student-faith/{id}/counseling_anecdotal_record_faith/', [Faith_Counseling_Anecdotal_RecordController::class, 'index']);
       Route::get('/show-student-faith/{id}/counseling_anecdotal_record_faith/create',[Faith_Counseling_Anecdotal_RecordController::class, 'create']);
       Route::get('/show-student-faith/{id}/counseling_anecdotal_record_faith/{student}', [Faith_Counseling_Anecdotal_RecordController::class, 'show']);
       Route::post('/add_counseling_anecdotal_record_faith', [Faith_Counseling_Anecdotal_RecordController::class, 'store']);
       Route::put('/update_counseling_anecdotal_record_faith/{id}', [Faith_Counseling_Anecdotal_RecordController::class, 'update']);
       Route::get('/delete_counseling_anecdotal_record_faith/{id}', [Faith_Counseling_Anecdotal_RecordController::class, 'destroy']);


       Route::post('/send_email_student_faith', [FaithStudentController::class, 'sendEmailStudent']);


       Route::get('/show-student-faith/{id}/parent_conference_record_faith/', [Faith_Parent_Conference_RecordController::class, 'index'])->name('faith-parent_conference_record');
       Route::get('/show-student-faith/{id}/parent_conference_record_faith/create',[Faith_Parent_Conference_RecordController::class, 'create']);
       Route::get('/show-student-faith/{id}/parent_conference_record_faith/{student}', [Faith_Parent_Conference_RecordController::class, 'show']);
       Route::post('/add_parent_conference_record_faith', [Faith_Parent_Conference_RecordController::class, 'store']);
       Route::put('/update_parent_conference_record_faith/{id}', [Faith_Parent_Conference_RecordController::class, 'update']);
       Route::get('/delete_parent_conference_record_faith/{id}', [Faith_Parent_Conference_RecordController::class, 'destroy']);


       Route::get('/show-student-faith/{id}/career_interest_test_result_faith/', [Faith_Career_Interest_Test_ResultController::class, 'index'])->name('faith-career_interest_test_result');
       Route::post('/upload_career_interest_result_faith', [Faith_Career_Interest_Test_ResultController::class, 'store']);   
       Route::get('/delete_career_interest_test_result_faith/{id}', [Faith_Career_Interest_Test_ResultController::class, 'destroy']);
       Route::get('/download_career_interest_test_result_faith/{id}',[Faith_Career_Interest_Test_ResultController::class, 'downloadFile'])->name('download_career_interest_test_result_faith');


       Route::get('/show-student-faith/{id}/personality_test_result_faith/', [Faith_Personality_Test_ResultController::class, 'index'])->name('faith-personality_test_result');
       Route::post('/upload_personality_result_faith', [Faith_Personality_Test_ResultController::class, 'store']);   
       Route::get('/delete_personality_test_result_faith/{id}', [Faith_Personality_Test_ResultController::class, 'destroy']);
       Route::get('/download_personality_test_result_faith/{id}',[Faith_Personality_Test_ResultController::class, 'downloadFile'])->name('download_personality_test_result_faith');


       Route::get('/show-student-faith/{id}/student_information_sheet_faith/', [Faith_Student_Information_SheetController::class, 'index'])->name('faith-student_information_sheet');
       Route::post('/upload_student_information_faith', [Faith_Student_Information_SheetController::class, 'store']);   
       Route::get('/delete_student_information_sheet_faith/{id}', [Faith_Student_Information_SheetController::class, 'destroy']);
       Route::put('/update_student_information_sheet_faith/{id}', [Faith_Student_Information_SheetController::class, 'updateInfo']);

       //for 11 Charity Students
       Route::get('charity-students', [CharityStudentController::class, 'index'])->name('charity-list');
       Route::get('/edit-charity-student/{id}', [CharityStudentController::class, 'edit']);
       Route::get('/add-charity-student',[CharityStudentController::class, 'create']);
       Route::post('/add-new-charity-student', [CharityStudentController::class, 'store']);
       Route::put('/update-charity-student/{id}', [CharityStudentController::class, 'update'])->name('update-charity-student');
       Route::post('/multiple-delete', [CharityStudentController::class, 'multipleDelete']);
       Route::get('/show-student-charity/{id}', [CharityStudentController::class, 'showStudentRecord']);

       Route::get('/show-student-charity/{id}/anecdotal_record_charity/', [Charity_Anecdotal_RecordController::class, 'index'])->name('charity-anecdotal');
       Route::get('/show-student-charity/{id}/anecdotal_record_charity/create',[Charity_Anecdotal_RecordController::class, 'create']);
       Route::get('/show-student-charity/{id}/anecdotal_record_charity/{student}', [Charity_Anecdotal_RecordController::class, 'show'])->name('charity-student-anecdotal-list');
       Route::post('/add_anecdotal_record_charity',[Charity_Anecdotal_RecordController::class, 'store']);
       Route::put('/update_anecdotal_record_charity/{id}', [Charity_Anecdotal_RecordController::class, 'update']);
       Route::get('/delete_anecdotal_record_charity/{id}', [Charity_Anecdotal_RecordController::class, 'destroy']);


       Route::get('/show-student-charity/{id}/counseling_anecdotal_record_charity/', [Charity_Counseling_Anecdotal_RecordController::class, 'index']);
       Route::get('/show-student-charity/{id}/counseling_anecdotal_record_charity/create',[Charity_Counseling_Anecdotal_RecordController::class, 'create']);
       Route::get('/show-student-charity/{id}/counseling_anecdotal_record_charity/{student}', [Charity_Counseling_Anecdotal_RecordController::class, 'show']);
       Route::post('/add_counseling_anecdotal_record_charity', [Charity_Counseling_Anecdotal_RecordController::class, 'store']);
       Route::put('/update_counseling_anecdotal_record_charity/{id}', [Charity_Counseling_Anecdotal_RecordController::class, 'update']);
       Route::get('/delete_counseling_anecdotal_record_charity/{id}', [Charity_Counseling_Anecdotal_RecordController::class, 'destroy']);


       Route::post('/send_email_student_charity', [CharityStudentController::class, 'sendEmailStudent']);


       Route::get('/show-student-charity/{id}/parent_conference_record_charity/', [Charity_Parent_Conference_RecordController::class, 'index'])->name('charity-parent_conference_record');
       Route::get('/show-student-charity/{id}/parent_conference_record_charity/create',[Charity_Parent_Conference_RecordController::class, 'create']);
       Route::get('/show-student-charity/{id}/parent_conference_record_charity/{student}', [Charity_Parent_Conference_RecordController::class, 'show']);
       Route::post('/add_parent_conference_record_charity', [Charity_Parent_Conference_RecordController::class, 'store']);
       Route::put('/update_parent_conference_record_charity/{id}', [Charity_Parent_Conference_RecordController::class, 'update']);
       Route::get('/delete_parent_conference_record_charity/{id}', [Charity_Parent_Conference_RecordController::class, 'destroy']);

       
       Route::get('/show-student-charity/{id}/career_interest_test_result_charity/', [Charity_Career_Interest_Test_ResultController::class, 'index'])->name('charity-career_interest_test_result');
       Route::post('/upload_career_interest_result_charity', [Charity_Career_Interest_Test_ResultController::class, 'store']);   
       Route::get('/delete_career_interest_test_result_charity/{id}', [Charity_Career_Interest_Test_ResultController::class, 'destroy']);
       Route::get('/download_career_interest_test_result_charity/{id}',[Charity_Career_Interest_Test_ResultController::class, 'downloadFile'])->name('download_career_interest_test_result_charity');


       Route::get('/show-student-charity/{id}/personality_test_result_charity/', [Charity_Personality_Test_ResultController::class, 'index'])->name('charity-personality_test_result');
       Route::post('/upload_personality_result_charity', [Charity_Personality_Test_ResultController::class, 'store']);   
       Route::get('/delete_personality_test_result_charity/{id}', [Charity_Personality_Test_ResultController::class, 'destroy']);
       Route::get('/download_personality_test_result_charity/{id}',[Charity_Personality_Test_ResultController::class, 'downloadFile'])->name('download_personality_test_result_charity');


       Route::get('/show-student-charity/{id}/student_information_sheet_charity/', [Charity_Student_Information_SheetController::class, 'index'])->name('charity-student_information_sheet');
       Route::post('/upload_student_information_charity', [Charity_Student_Information_SheetController::class, 'store']);   
       Route::get('/delete_student_information_sheet_charity/{id}', [Charity_Student_Information_SheetController::class, 'destroy']);
       Route::put('/update_student_information_sheet_charity/{id}', [Charity_Student_Information_SheetController::class, 'updateInfo']);

       //for 12 Hope Students
       Route::get('hope-students', [HopeStudentController::class, 'index'])->name('hope-list');
       Route::get('/edit-hope-student/{id}', [HopeStudentController::class, 'edit']);
       Route::get('/add-hope-student',[HopeStudentController::class, 'create']);
       Route::post('/add-new-hope-student', [HopeStudentController::class, 'store']);
       Route::post('/multiple-delete', [HopeStudentController::class, 'multipleDelete']);
       Route::put('/update-hope-student/{id}', [HopeStudentController::class, 'update'])->name('update-hope-student');
       Route::get('/show-student-hope/{id}', [HopeStudentController::class, 'showStudentRecord']);
    
       Route::get('/show-student-hope/{id}/anecdotal_record_hope/', [Hope_Anecdotal_RecordController::class, 'index'])->name('hope-anecdotal');
       Route::get('/show-student-hope/{id}/anecdotal_record_hope/create',[Hope_Anecdotal_RecordController::class, 'create']);
       Route::get('/show-student-hope/{id}/anecdotal_record_hope/{student}', [Hope_Anecdotal_RecordController::class, 'show'])->name('hope-student-anecdotal-list');
       Route::post('/add_anecdotal_record_hope',[Hope_Anecdotal_RecordController::class, 'store']);
       Route::put('/update_anecdotal_record_hope/{id}', [Hope_Anecdotal_RecordController::class, 'update']);
       Route::get('/delete_anecdotal_record_hope/{id}', [Hope_Anecdotal_RecordController::class, 'destroy']);


       Route::get('/show-student-hope/{id}/counseling_anecdotal_record_hope/', [Hope_Counseling_Anecdotal_RecordController::class, 'index']);
       Route::get('/show-student-hope/{id}/counseling_anecdotal_record_hope/create',[Hope_Counseling_Anecdotal_RecordController::class, 'create']);
       Route::get('/show-student-hope/{id}/counseling_anecdotal_record_hope/{student}', [Hope_Counseling_Anecdotal_RecordController::class, 'show']);
       Route::post('/add_counseling_anecdotal_record_hope', [Hope_Counseling_Anecdotal_RecordController::class, 'store']);
       Route::put('/update_counseling_anecdotal_record_hope/{id}', [Hope_Counseling_Anecdotal_RecordController::class, 'update']);
       Route::get('/delete_counseling_anecdotal_record_hope/{id}', [Hope_Counseling_Anecdotal_RecordController::class, 'destroy']);


       Route::post('/send_email_student_hope', [HopeStudentController::class, 'sendEmailStudent']);


       Route::get('/show-student-hope/{id}/parent_conference_record_hope/', [Hope_Parent_Conference_RecordController::class, 'index'])->name('hope-parent_conference_record');
       Route::get('/show-student-hope/{id}/parent_conference_record_hope/create',[Hope_Parent_Conference_RecordController::class, 'create']);
       Route::get('/show-student-hope/{id}/parent_conference_record_hope/{student}', [Hope_Parent_Conference_RecordController::class, 'show']);
       Route::post('/add_parent_conference_record_hope', [Hope_Parent_Conference_RecordController::class, 'store']);
       Route::put('/update_parent_conference_record_hope/{id}', [Hope_Parent_Conference_RecordController::class, 'update']);
       Route::get('/delete_parent_conference_record_hope/{id}', [Hope_Parent_Conference_RecordController::class, 'destroy']);


       Route::get('/show-student-hope/{id}/career_interest_test_result_hope/', [Hope_Career_Interest_Test_ResultController::class, 'index'])->name('hope-career_interest_test_result');
       Route::post('/upload_career_interest_result_hope', [Hope_Career_Interest_Test_ResultController::class, 'store']);   
       Route::get('/delete_career_interest_test_result_hope/{id}', [Hope_Career_Interest_Test_ResultController::class, 'destroy']);
       Route::get('/download_career_interest_test_result_hope/{id}',[Hope_Career_Interest_Test_ResultController::class, 'downloadFile'])->name('download_career_interest_test_result_hope');


       Route::get('/show-student-hope/{id}/personality_test_result_hope/', [Hope_Personality_Test_ResultController::class, 'index'])->name('hope-personality_test_result');
       Route::post('/upload_personality_result_hope', [Hope_Personality_Test_ResultController::class, 'store']);   
       Route::get('/delete_personality_test_result_hope/{id}', [Hope_Personality_Test_ResultController::class, 'destroy']);
       Route::get('/download_personality_test_result_hope/{id}',[Hope_Personality_Test_ResultController::class, 'downloadFile'])->name('download_personality_test_result_hope');

       
       Route::get('/show-student-hope/{id}/student_information_sheet_hope/', [Hope_Student_Information_SheetController::class, 'index'])->name('hope-student_information_sheet');
       Route::post('/upload_student_information_hope', [Hope_Student_Information_SheetController::class, 'store']);   
       Route::get('/delete_student_information_sheet_hope/{id}', [Hope_Student_Information_SheetController::class, 'destroy']);
       Route::put('/update_student_information_sheet_hope/{id}', [Hope_Student_Information_SheetController::class, 'updateInfo']);

       //for 12 Love Students
       Route::get('love-students', [LoveStudentController::class, 'index'])->name('love-list');
       Route::get('/edit-love-student/{id}', [LoveStudentController::class, 'edit']);
       Route::get('/add-love-student',[LoveStudentController::class, 'create']);
       Route::post('/add-new-love-student', [LoveStudentController::class, 'store']);
       Route::post('/multiple-delete', [LoveStudentController::class, 'multipleDelete']);
       Route::put('/update-love-student/{id}', [LoveStudentController::class, 'update'])->name('update-love-student');
       Route::get('/show-student-love/{id}', [LoveStudentController::class, 'showStudentRecord']);

       Route::get('/show-student-love/{id}/anecdotal_record_love/', [Love_Anecdotal_RecordController::class, 'index'])->name('love-anecdotal');
       Route::get('/show-student-love/{id}/anecdotal_record_love/create',[Love_Anecdotal_RecordController::class, 'create']);
       Route::get('/show-student-love/{id}/anecdotal_record_love/{student}', [Love_Anecdotal_RecordController::class, 'show'])->name('love-student-anecdotal-list');
       Route::post('/add_anecdotal_record_love',[Love_Anecdotal_RecordController::class, 'store']);
       Route::put('/update_anecdotal_record_love/{id}', [Love_Anecdotal_RecordController::class, 'update']);
       Route::get('/delete_anecdotal_record_love/{id}', [Love_Anecdotal_RecordController::class, 'destroy']);


       Route::get('/show-student-love/{id}/counseling_anecdotal_record_love/', [Love_Counseling_Anecdotal_RecordController::class, 'index']);
       Route::get('/show-student-love/{id}/counseling_anecdotal_record_love/create',[Love_Counseling_Anecdotal_RecordController::class, 'create']);
       Route::get('/show-student-love/{id}/counseling_anecdotal_record_love/{student}', [Love_Counseling_Anecdotal_RecordController::class, 'show']);
       Route::post('/add_counseling_anecdotal_record_love', [Love_Counseling_Anecdotal_RecordController::class, 'store']);
       Route::put('/update_counseling_anecdotal_record_love/{id}', [Love_Counseling_Anecdotal_RecordController::class, 'update']);
       Route::get('/delete_counseling_anecdotal_record_love/{id}', [Love_Counseling_Anecdotal_RecordController::class, 'destroy']);


       Route::post('/send_email_student_love', [LoveStudentController::class, 'sendEmailStudent']);


       Route::get('/show-student-love/{id}/parent_conference_record_love/', [Love_Parent_Conference_RecordController::class, 'index'])->name('love-parent_conference_record');
       Route::get('/show-student-love/{id}/parent_conference_record_love/create',[Love_Parent_Conference_RecordController::class, 'create']);
       Route::get('/show-student-love/{id}/parent_conference_record_love/{student}', [Love_Parent_Conference_RecordController::class, 'show']);
       Route::post('/add_parent_conference_record_love', [Love_Parent_Conference_RecordController::class, 'store']);
       Route::put('/update_parent_conference_record_love/{id}', [Love_Parent_Conference_RecordController::class, 'update']);
       Route::get('/delete_parent_conference_record_love/{id}', [Love_Parent_Conference_RecordController::class, 'destroy']);


       Route::get('/show-student-love/{id}/career_interest_test_result_love/', [Love_Career_Interest_Test_ResultController::class, 'index'])->name('love-career_interest_test_result');
       Route::post('/upload_career_interest_result_love', [Love_Career_Interest_Test_ResultController::class, 'store']);   
       Route::get('/delete_career_interest_test_result_love/{id}', [Love_Career_Interest_Test_ResultController::class, 'destroy']);
       Route::get('/download_career_interest_test_result_love/{id}',[Love_Career_Interest_Test_ResultController::class, 'downloadFile'])->name('download_career_interest_test_result_love');


       Route::get('/show-student-love/{id}/personality_test_result_love/', [Love_Personality_Test_ResultController::class, 'index'])->name('love-personality_test_result');
       Route::post('/upload_personality_result_love', [Love_Personality_Test_ResultController::class, 'store']);   
       Route::get('/delete_personality_test_result_love/{id}', [Love_Personality_Test_ResultController::class, 'destroy']);
       Route::get('/download_personality_test_result_love/{id}',[Love_Personality_Test_ResultController::class, 'downloadFile'])->name('download_personality_test_result_love');


       Route::get('/show-student-love/{id}/student_information_sheet_love/', [Love_Student_Information_SheetController::class, 'index'])->name('love-student_information_sheet');
       Route::post('/upload_student_information_love', [Love_Student_Information_SheetController::class, 'store']);   
       Route::get('/delete_student_information_sheet_love/{id}', [Love_Student_Information_SheetController::class, 'destroy']);
       Route::put('/update_student_information_sheet_love/{id}', [Love_Student_Information_SheetController::class, 'updateInfo']);

       //for SHS Parents
       Route::get('shs-parents', [ParentController::class, 'index'])->name('shs-parents');
       Route::get('/email_to_parent/{id}', [ParentController::class, 'emailToParent']);
       Route::post('/send_email_parent_admin', [ParentEmailController::class, 'sendEmail']);

        //for calendar admin panel
        // Route::get('fullcalender', [AdminCalendarController::class, 'index'])->name('calendar');
        // Route::post('fullcalenderAjax', [AdminCalendarController::class, 'ajax']);

    
       //for events admin

       Route::post('/add_new_event', [AdminEventController::class, 'store']);

       Route::get('/event-delete/{id}', [HomeController::class, 'destroy']);
       Route::post('/send-event', function(){
           $user = User::all();
        //    $student->notify(new EmailNotification());
        Notification::send($user, new EmailNotification());
        return redirect()->back();
        });
      
     });
    });

    //////For Advisers//////////////////////////////////////////
    Auth::routes(['verify' => true]);
    Route::middleware(['auth'])->group(function () {
        Route::get('/approval', 'AdviserHomePageController@approval')->name('approval');
    
        
    Route::middleware(['approved', 'auth', 'is_admin'])->group(function () {
        Route::get('/homepage', 'AdviserHomePageController@index')->name('homepage');


        Route::get('/adviserprofile', [
            AdviserProfileController::class, 'index'
        ])->name('adviserprofile');
        
        
    Route::post('/adviserprofile', [AdviserProfileController::class, 'update_avatar']);     
    Route::put('/update-adviser-info/{id}', [AdviserProfileController::class, 'update']);
    
    Route::get('/adviser-change-password/{id}', [
        AdviserProfileController::class, 'passwordIndex'
    ])->name('adviser-change-password');

    Route::post('/adviser-change-password', [AdviserProfileController::class, 'passwordChange'])->name('adviser-save-password');   





        Route::get('/advisory-list-students', [
            StudentListController::class, 'myStudents'
        ])->name('advisory-list-students');
        Route::get('/students/create',[StudentListController::class, 'create']);
        Route::post('/students', [StudentListController::class, 'store']);
        Route::get('/students/edit/{student}', [StudentListController::class, 'edit'])->middleware('can-edit');
        // Route::put('/update-mystudent/{id}',[StudentListController::class, 'update']);
        Route::put('/update-my-student/{student}', [StudentListController::class, 'update'])->middleware('can-edit');
        Route::get('/delete-student/{student}', [StudentListController::class, 'destroy']);
        Route::get('/show-my-student/{id}', [StudentListController::class, 'showStudentRecord']);


        Route::get('/show-my-student/{id}/anecdotal_record_myStudent/', [MyStudent_Anecdotal_RecordController::class, 'index'])->name('myStudent-anecdotal');
        Route::get('/delete_anecdotal_record_myStudent/{id}', [MyStudent_Anecdotal_RecordController::class, 'destroy']);
        Route::get('/show-my-student/{id}/anecdotal_record_myStudent/create',[MyStudent_Anecdotal_RecordController::class, 'create']);
        Route::post('/add_anecdotal_record_myStudent',[MyStudent_Anecdotal_RecordController::class, 'store']);
        Route::put('/update_anecdotal_record_myStudent/{id}', [MyStudent_Anecdotal_RecordController::class, 'update']);
        Route::get('/show-my-student/{id}/anecdotal_record_myStudent/{student}', [MyStudent_Anecdotal_RecordController::class, 'show']);


        Route::post('/send_email_myStudent', [StudentListController::class, 'sendEmailMyStudent']);

        //for PDF and Excel My Students Only
        Route::get('export_myStudents_pdf', [StudentListController::class, 'export_myStudents_pdf'])->name('export_myStudents_pdf');
        Route::get('export_myStudents_excel', [StudentListController::class, 'export_myStudents_excel'])->name('export_myStudents_excel'); 
          
        Route::get('export_myStudents_anecdotal_pdf/{id}', [MyStudent_Anecdotal_RecordController::class, 'export_myStudents_Anecdotal_ID_pdf'])->name('export_myStudents_anecdotal_pdf');

        //for Parents on my Advisory
        Route::get('parent-lists', [ParentListController::class, 'index'])->name('parent-lists');
        Route::get('/email_parent/{id}', [ParentListController::class, 'emailParent']);
        Route::post('/send_email_advisory_parent', [Parent_EmailController::class, 'sendEmail']);
        

        Route::get('/show-my-student/{id}/student_information_sheet_myStudent/', [MyStudent_Student_Information_SheetController::class, 'index'])->name('myStudent-student_information_sheet');
        Route::post('/upload_student_information_myStudent', [MyStudent_Student_Information_SheetController::class, 'store']);   
        Route::get('/delete_student_information_sheet_myStudent/{id}', [MyStudent_Student_Information_SheetController::class, 'destroy']);
        Route::put('/update_student_information_sheet_myStudent/{id}', [MyStudent_Student_Information_SheetController::class, 'updateInfo']);

        Route::get('export_myStudents_student_information_sheet_pdf/{id}', [MyStudent_Student_Information_SheetController::class, 'downloadInfo'])->name('export_myStudents_student_information_sheet_pdf');
        });
    });

  
  
    



      
    

    
   
