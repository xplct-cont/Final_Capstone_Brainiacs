<?php

use Carbon\Carbon;
use App\Notifications\EmailNotification;
use App\Mail\EmailNotif;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdviserController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminCalendarController;
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


        Route::get('/advisers', [
            AdviserController::class, 'index'
        ])->name('advisers');
        // Route::get('/show-adviser/{id}', [
        //     AdviserController::class, 'show']);
        Route::get('/delete-adviser/{id}', [
            AdviserController::class, 'destroy']);
        Route::get('/edit-adviser/{id}', [
            AdviserController::class, 'edit']);
        Route::put('/update-adviser/{id}', [
            AdviserController::class, 'update']);


            //for PDF and Excel Advisers
        Route::get('export_user_pdf', [AdviserController::class, 'export_user_pdf'])->name('export_user_pdf');
        Route::get('export_user_excel', [AdviserController::class, 'export_user_excel'])->name('export_user_excel');
        
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
    Route::middleware(['auth', ])->group(function () {
        Route::get('/approval', 'AdviserHomePageController@approval')->name('approval');
    
        
    Route::middleware(['approved', 'auth', 'is_admin'])->group(function () {
        Route::get('/homepage', 'AdviserHomePageController@index')->name('homepage');


        Route::get('/adviserprofile', [
            AdviserProfileController::class, 'index'
        ])->name('adviserprofile');
        
        
    Route::post('/adviserprofile', [AdviserProfileController::class, 'update_avatar']);     
    Route::put('/update-adviser-info/{id}', [AdviserProfileController::class, 'update']);

        Route::get('/advisory-list-students', [
            StudentListController::class, 'index'
        ])->name('advisory-list-students');

        Route::get('/adviser-change-password/{id}', [
            AdviserProfileController::class, 'passwordIndex'
        ])->name('adviser-change-password');

    Route::post('/adviser-change-password', [AdviserProfileController::class, 'passwordChange'])->name('adviser-save-password');   
    


           
        });
    });

  
  
    



      
    

    
   
