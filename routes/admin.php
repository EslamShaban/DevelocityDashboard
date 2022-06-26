<?php

use App\Http\Controllers\Api\Admin\AdminController;
use App\Http\Controllers\Api\Admin\BranchController;
use App\Http\Controllers\Api\Admin\SectionController;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\Admin\TaskController;
use App\Http\Controllers\Api\Admin\ComplaintController;
use App\Http\Controllers\Api\Admin\RequirementController;
use App\Http\Controllers\Api\Admin\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
   2|BgzjmcytysX5jUlULcG9d1SAD0ERzrNUFr71Boxy
|--------------------------------------------------------------------------
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    // Auth admins
    Route::group(['prefix' => 'admin'] , function(){
        Route::post('/register' , [AdminController::class , 'register']);
        Route::post('/login' , [AdminController::class , 'login']);

    });

    // =============================================================================================

    // routes for admins
    Route::group(['middleware' => 'auth.guard:admin-api'] , function(){

        //  admins
        Route::group(['prefix' => 'admins'] , function(){
            Route::get('/' , [AdminController::class , 'index']);
            Route::get('/get-admin/{id}' , [AdminController::class , 'getAdmin']);
            Route::post('/update/{id}' , [AdminController::class , 'update']);
            Route::post('/delete/{id}' , [AdminController::class , 'destroy']);
        });

        //branches
        Route::group(['prefix' => 'companies'] , function(){
            Route::get('/' , [BranchController::class , 'index']);
            Route::post('/create' , [BranchController::class , 'store']);
            Route::post('/update/{id}' , [BranchController::class , 'update']);
            Route::post('/delete/{id}' , [BranchController::class , 'destroy']);
        });

         //sections
         Route::group(['prefix' => 'sections'] , function(){
            Route::get('/' , [SectionController::class , 'index']);
            Route::post('/create' , [SectionController::class , 'store']);
            Route::post('/update/{id}' , [SectionController::class , 'update']);
            Route::post('/delete/{id}' , [SectionController::class , 'destroy']);
        });

        // users
        Route:: group(['prefix' => 'users'] , function(){
            Route::get('/' , [UserController::class , 'index']);
            Route::get('/get-user/{id}' , [UserController::class , 'getUser']);
            Route::post('/update/{id}' , [UserController::class , 'update']);
            Route::post('/delete/{id}' , [UserController::class , 'destroy']);
        });


         //tasks
         Route::group(['prefix' => 'tasks'] , function(){
            Route::get('/{id?}' , [TaskController::class , 'index']);
            Route::post('/create' , [TaskController::class , 'store']);
            Route::post('/update/{id}' , [TaskController::class , 'update']);
            Route::post('/delete/{id}' , [TaskController::class , 'destroy']);
            Route::post('/{id}/rate' , [TaskController::class , 'rate']);
        });


         //complaints
         Route::group(['prefix' => 'complaints'] , function(){
            Route::get('/{id?}' , [ComplaintController::class , 'index']);
        });

        
         //requirements
         Route::group(['prefix' => 'requirements'] , function(){
            Route::get('/{id?}' , [RequirementController::class , 'index']);
            Route::post('/{id}/update-status' , [RequirementController::class , 'update_status']);
        });

        //news
         Route::group(['prefix' => 'news'] , function(){
            Route::get('/{id?}' , [NewsController::class , 'index']);
            Route::post('/create' , [NewsController::class , 'store']);
            Route::put('/update/{id}' , [NewsController::class , 'update']);
            Route::post('/delete/{id}' , [NewsController::class , 'destroy']);
        });

        Route::post('admin/logout' , [AdminController::class , 'logout']);
    });






