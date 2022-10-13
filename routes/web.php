<?php

use Carbon\Carbon;
use App\Notifications\EmailNotification;
use App\Mail\EmailNotif;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\Admin\AdviserController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminCalendarController;
use App\Http\Controllers\Admin\Student\WisdomStudentController;
use App\Http\Controllers\Admin\Student\FaithStudentController;
use App\Http\Controllers\Admin\Student\CharityStudentController;
use App\Http\Controllers\Admin\Student\HopeStudentController;
use App\Http\Controllers\Admin\Student\LoveStudentController;
use App\Http\Controllers\Admin\Parent\ParentController;
use App\Models\User;

use App\Http\Controllers\Admin\Anecdotal_Record\Wisdom_Anecdotal_RecordController;
use App\Http\Controllers\Admin\Anecdotal_Record\Charity_Anecdotal_RecordController;
use App\Http\Controllers\Admin\Anecdotal_Record\Faith_Anecdotal_RecordController;
use App\Http\Controllers\Admin\Anecdotal_Record\Hope_Anecdotal_RecordController;
use App\Http\Controllers\Admin\Anecdotal_Record\Love_Anecdotal_RecordController;

use App\Http\Controllers\AdviserHomePageController;
use App\Http\Controllers\Adviser\AdviserProfileController;
use App\Http\Controllers\Adviser\StudentListController;
use App\Http\Controllers\Adviser\ParentListController;
use App\Http\Controllers\Adviser\MyStudent_Anecdotal_RecordController;




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
            //for PDF and Excel Faith Students
        Route::get('export_faithStudents_pdf', [FaithStudentController::class, 'export_faithStudents_pdf'])->name('export_faithStudents_pdf');
        Route::get('export_faithStudents_excel', [FaithStudentController::class, 'export_faithStudents_excel'])->name('export_faithStudents_excel');
            //for PDF and Excel Charity Students
        Route::get('export_charityStudents_pdf', [CharityStudentController::class, 'export_charityStudents_pdf'])->name('export_charityStudents_pdf');
        Route::get('export_charityStudents_excel', [CharityStudentController::class, 'export_charityStudents_excel'])->name('export_charityStudents_excel'); 
            //for PDF and Excel Hope Students
        Route::get('export_hopeStudents_pdf', [HopeStudentController::class, 'export_hopeStudents_pdf'])->name('export_hopeStudents_pdf');
        Route::get('export_hopeStudents_excel', [HopeStudentController::class, 'export_hopeStudents_excel'])->name('export_hopeStudents_excel'); 
             //for PDF and Excel Love Students
        Route::get('export_loveStudents_pdf', [LoveStudentController::class, 'export_loveStudents_pdf'])->name('export_loveStudents_pdf');
        Route::get('export_loveStudents_excel', [LoveStudentController::class, 'export_loveStudents_excel'])->name('export_loveStudents_excel'); 
             
       
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
       Route::get('/show-student-wisdom/anecdotal_record_wisdom/{student}', [Wisdom_Anecdotal_RecordController::class, 'show'])->name('wisdom-student-anecdotal-list');
       Route::get('/show-student-wisdom/{id}/anecdotal_record_wisdom/create',[Wisdom_Anecdotal_RecordController::class, 'create']);
       Route::post('/add_anecdotal_record_wisdom',[Wisdom_Anecdotal_RecordController::class, 'store']);
       Route::get('/delete_anecdotal_record_wisdom/{id}', [Wisdom_Anecdotal_RecordController::class, 'destroy']);


       //for 11 Faith Students
       Route::get('faith-students', [FaithStudentController::class, 'index'])->name('faith-list');
       Route::get('/edit-faith-student/{id}', [FaithStudentController::class, 'edit']);
       Route::get('/add-faith-student',[FaithStudentController::class, 'create']);
       Route::post('/add-new-faith-student', [FaithStudentController::class, 'store']);
       Route::post('/multiple-delete', [FaithStudentController::class, 'multipleDelete']);
       Route::put('/update-faith-student/{id}', [FaithStudentController::class, 'update'])->name('update-faith-student');
       Route::get('/show-student-faith/{id}', [FaithStudentController::class, 'showStudentRecord']);
      
       Route::get('/show-student-faith/{id}/anecdotal_record_faith/', [Faith_Anecdotal_RecordController::class, 'index'])->name('faith-anecdotal');
       Route::get('/show-student-faith/anecdotal_record_faith/{student}', [Faith_Anecdotal_RecordController::class, 'show'])->name('faith-student-anecdotal-list');
       Route::get('/show-student-faith/{id}/anecdotal_record_faith/create',[Faith_Anecdotal_RecordController::class, 'create']);
       Route::post('/add_anecdotal_record_faith',[Faith_Anecdotal_RecordController::class, 'store']);
       Route::get('/delete_anecdotal_record_faith/{id}', [Faith_Anecdotal_RecordController::class, 'destroy']);
            

       //for 11 Charity Students
       Route::get('charity-students', [CharityStudentController::class, 'index'])->name('charity-list');
       Route::get('/edit-charity-student/{id}', [CharityStudentController::class, 'edit']);
       Route::get('/add-charity-student',[CharityStudentController::class, 'create']);
       Route::post('/add-new-charity-student', [CharityStudentController::class, 'store']);
       Route::put('/update-charity-student/{id}', [CharityStudentController::class, 'update'])->name('update-charity-student');
       Route::post('/multiple-delete', [CharityStudentController::class, 'multipleDelete']);
       Route::get('/show-student-charity/{id}', [CharityStudentController::class, 'showStudentRecord']);

       Route::get('/show-student-charity/{id}/anecdotal_record_charity/', [Charity_Anecdotal_RecordController::class, 'index'])->name('charity-anecdotal');
       Route::get('/show-student-charity/anecdotal_record_charity/{student}', [Charity_Anecdotal_RecordController::class, 'show'])->name('charity-student-anecdotal-list');
       Route::get('/show-student-charity/{id}/anecdotal_record_charity/create',[Charity_Anecdotal_RecordController::class, 'create']);
       Route::post('/add_anecdotal_record_charity',[Charity_Anecdotal_RecordController::class, 'store']);
       Route::get('/delete_anecdotal_record_charity/{id}', [Charity_Anecdotal_RecordController::class, 'destroy']);


       //for 12 Hope Students
       Route::get('hope-students', [HopeStudentController::class, 'index'])->name('hope-list');
       Route::get('/edit-hope-student/{id}', [HopeStudentController::class, 'edit']);
       Route::get('/add-hope-student',[HopeStudentController::class, 'create']);
       Route::post('/add-new-hope-student', [HopeStudentController::class, 'store']);
       Route::post('/multiple-delete', [HopeStudentController::class, 'multipleDelete']);
       Route::put('/update-hope-student/{id}', [HopeStudentController::class, 'update'])->name('update-hope-student');
       Route::get('/show-student-hope/{id}', [HopeStudentController::class, 'showStudentRecord']);
    
       Route::get('/show-student-hope/{id}/anecdotal_record_hope/', [Hope_Anecdotal_RecordController::class, 'index'])->name('hope-anecdotal');
       Route::get('/show-student-hope/anecdotal_record_hope/{student}', [Hope_Anecdotal_RecordController::class, 'show'])->name('hope-student-anecdotal-list');
       Route::get('/show-student-hope/{id}/anecdotal_record_hope/create',[Hope_Anecdotal_RecordController::class, 'create']);
       Route::post('/add_anecdotal_record_hope',[Hope_Anecdotal_RecordController::class, 'store']);
       Route::get('/delete_anecdotal_record_hope/{id}', [Hope_Anecdotal_RecordController::class, 'destroy']);
            

       //for 12 Love Students
       Route::get('love-students', [LoveStudentController::class, 'index'])->name('love-list');
       Route::get('/edit-love-student/{id}', [LoveStudentController::class, 'edit']);
       Route::get('/add-love-student',[LoveStudentController::class, 'create']);
       Route::post('/add-new-love-student', [LoveStudentController::class, 'store']);
       Route::post('/multiple-delete', [LoveStudentController::class, 'multipleDelete']);
       Route::put('/update-love-student/{id}', [LoveStudentController::class, 'update'])->name('update-love-student');
       Route::get('/show-student-love/{id}', [LoveStudentController::class, 'showStudentRecord']);

       Route::get('/show-student-love/{id}/anecdotal_record_love/', [Love_Anecdotal_RecordController::class, 'index'])->name('love-anecdotal');
       Route::get('/show-student-love/anecdotal_record_love/{student}', [Love_Anecdotal_RecordController::class, 'show'])->name('love-student-anecdotal-list');
       Route::get('/show-student-love/{id}/anecdotal_record_love/create',[Love_Anecdotal_RecordController::class, 'create']);
       Route::post('/add_anecdotal_record_love',[Love_Anecdotal_RecordController::class, 'store']);
       Route::get('/delete_anecdotal_record_love/{id}', [Love_Anecdotal_RecordController::class, 'destroy']);


       //for SHS Parents
       Route::get('shs-parents', [ParentController::class, 'index'])->name('shs-parents');
       Route::get('/email_to_parent/{id}', [ParentController::class, 'emailToParent']);

        //for calendar admin panel
        Route::get('fullcalender', [AdminCalendarController::class, 'index'])->name('calendar');
        Route::post('fullcalenderAjax', [AdminCalendarController::class, 'ajax']);

    
       //for events admin

       Route::get('/event-delete/{id}', [HomeController::class, 'destroy']);
       Route::post('/send-event', function(){
           $user = User::all();
        //    $user->notify(new EmailNotification());
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


        Route::get('/show-student-myStudent/{id}/anecdotal_record_myStudent/', [MyStudent_Anecdotal_RecordController::class, 'index'])->name('myStudent-anecdotal');
        Route::get('/delete_anecdotal_record_myStudent/{id}', [MyStudent_Anecdotal_RecordController::class, 'destroy']);
        Route::get('/show-student-myStudent/{id}/anecdotal_record_myStudent/create',[MyStudent_Anecdotal_RecordController::class, 'create']);
        Route::post('/add_anecdotal_record_myStudent',[MyStudent_Anecdotal_RecordController::class, 'store']);
        Route::get('/show-student-myStudent/{id}/anecdotal_record_myStudent/{student}', [MyStudent_Anecdotal_RecordController::class, 'show']);

        //for PDF and Excel My Students Only
        Route::get('export_myStudents_pdf', [StudentListController::class, 'export_myStudents_pdf'])->name('export_myStudents_pdf');
        Route::get('export_myStudents_excel', [StudentListController::class, 'export_myStudents_excel'])->name('export_myStudents_excel'); 
             
        //for Parents on my Advisory
        Route::get('parent-lists', [ParentListController::class, 'index'])->name('parent-lists');
        Route::get('/email_parent/{id}', [ParentListController::class, 'emailParent']);
        
        });
    });

  
  
    



      
    

    
   
