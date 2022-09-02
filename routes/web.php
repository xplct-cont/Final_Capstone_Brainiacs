<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdviserController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdviserHomePageController;


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
    Route::get('/approval', 'AdviserHomePageController@approval')->name('approval');

    Route::middleware(['approved', 'auth', 'is_admin'])->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
        // Route::get('/homepage', 'AdviserHomePageController@index')->name('homepage');
    });

    Route::middleware(['admin', ])->group(function () {
        Route::get('/users', 'UserController@index')->name('admin.users.index');
        Route::get('/users/{user_id}/approve', 'UserController@approve')->name('admin.users.approve');
        Route::get('/users/{user_id}/destroy', 'UserController@destroy')->name('admin.users.destroy');


        Route::get('/advisers', [
            AdviserController::class, 'index'
        ])->name('advisers');
        Route::get('/show-adviser/{id}', [
            AdviserController::class, 'show']);
        Route::get('/delete-adviser/{id}', [
            AdviserController::class, 'destroy']);
        Route::get('/edit-adviser/{id}', [
            AdviserController::class, 'edit']);
        Route::put('/update-adviser/{id}', [
            AdviserController::class, 'update']);


            //for edit admin profile

        
        Route::get('/adminprofile', [
                AdminProfileController::class, 'index'
            ])->name('adminprofile');
            
            
        Route::post('/adminprofile', [AdminProfileController::class, 'update_avatar']);     
        Route::get('/edit-info/{id}', [AdminProfileController::class, 'edit']);
        Route::put('/update-info/{id}', [AdminProfileController::class, 'update']);
        
       

       });
    });


        ///For Adviser Page///////////////////////////////////
        Route::get('/homepage', [   
            AdviserHomePageController::class, 'index'
         ])->name('homepage');
      
    

    
   
