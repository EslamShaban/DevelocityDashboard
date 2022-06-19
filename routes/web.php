<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\DashboarController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ComplaintController;
use App\Http\Controllers\Admin\RateController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Company\RequirementController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
// */

Route::get('/', function () {
    return view('auth.login');
});



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        // Admin Dashboard

        Route::get('/dashboard' , [DashboarController::class , 'index'])->middleware(['auth:admin'])->name('dashboard');


        Route::group(['prefix' => 'admin' , 'middleware' => 'auth:admin'] , function(){

            // admins
            Route::resource('admins' , AdminController::class);
            // companies
            Route::resource('companies' , CompanyController::class);
            // sections
            Route::resource('sections' , SectionController::class);
            // users
            Route::resource('users' , UserController::class);
            Route::get('user-section/{id}' , [UserController::class , 'get_section']);
            Route::get('export/{user_id}' , [UserController::class , 'export']);
            Route::get('user/uploadcsv', [UserController::class , 'uploadcsv'])->name('users.uploadcsv');
            Route::post('users/importcvs', [UserController::class , 'importcvs'])->name('users.importcvs');;

            // tasks
            Route::resource('tasks' , TaskController::class);
            Route::get('task-sections/{id}' , [TaskController::class , 'get_sections']);
            Route::get('task-user/{section_ids}' , [TaskController::class , 'get_users_by_section_ids']);
            Route::get('get_user_tasks/{id}' , [TaskController::class , 'get_user_tasks']);
            Route::get('check-task-users/{task}/{user_id}' , [TaskController::class , 'check_task_users']);
            Route::get('task/uploadcsv', [TaskController::class , 'uploadcsv'])->name('tasks.uploadcsv');
            Route::post('task/importcvs', [TaskController::class , 'importcvs'])->name('tasks.importcvs');;
            Route::post('task/rate/{task}', [TaskController::class , 'rate_task'])->name('task.rate');;

            // Rates
            Route::resource('rates' , RateController::class);
            // complaint
            Route::get('complaints' , [ComplaintController::class , 'index'])->name('admin.complaints.index');
            // requirements
            Route::get('/requirement' , [RequirementController::class , 'requirements'])->name('admin.requirement.requirements');
            Route::put('/requirment/{id}' , [RequirementController::class , 'changStatus'])->name('requirment.changStatus');








        });


        require __DIR__.'/auth.php';


});
