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
use App\Models\User;

use App\Http\Controllers\AdviserHomePageController;
use App\Http\Controllers\Adviser\AdviserProfileController;
use App\Http\Controllers\Adviser\StudentListController;




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
       Route::get('/delete-wisdom-student/{student}', [WisdomStudentController::class, 'destroy']);
       Route::put('/update-wisdom-student/{id}', [WisdomStudentController::class, 'update'])->name('update-wisdom-student');
       
        //for 11 Faith Students
       Route::get('faith-students', [FaithStudentController::class, 'index'])->name('faith-list');
       Route::get('/edit-faith-student/{id}', [FaithStudentController::class, 'edit']);
       Route::get('/delete-faith-student/{student}', [FaithStudentController::class, 'destroy']);
       Route::put('/update-faith-student/{id}', [FaithStudentController::class, 'update'])->name('update-faith-student');

       //for 11 Charity Students
       Route::get('charity-students', [CharityStudentController::class, 'index'])->name('charity-list');
       Route::get('/edit-charity-student/{id}', [CharityStudentController::class, 'edit']);
       Route::get('/delete-charity-student/{student}', [CharityStudentController::class, 'destroy']);
       Route::put('/update-charity-student/{id}', [CharityStudentController::class, 'update'])->name('update-charity-student');

       //for 12 Hope Students
       Route::get('hope-students', [HopeStudentController::class, 'index'])->name('hope-list');
       Route::get('/edit-hope-student/{id}', [HopeStudentController::class, 'edit']);
       Route::get('/delete-hope-student/{student}', [HopeStudentController::class, 'destroy']);
       Route::put('/update-hope-student/{id}', [HopeStudentController::class, 'update'])->name('update-hope-student');

       //for 12 Love Students
       Route::get('love-students', [LoveStudentController::class, 'index'])->name('love-list');
       Route::get('/edit-love-student/{id}', [LoveStudentController::class, 'edit']);
       Route::get('/delete-love-student/{student}', [LoveStudentController::class, 'destroy']);
       Route::put('/update-love-student/{id}', [LoveStudentController::class, 'update'])->name('update-love-student');




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
           
        });
    });

  
  
    



      
    

    
   
