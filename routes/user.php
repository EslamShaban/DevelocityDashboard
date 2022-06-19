<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\UserController;

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


    // Auth users
    // users
    Route:: group(['prefix' => 'user'] , function(){
        Route::post('/register' , [UserController::class , 'register']);
        Route::post('/login' , [UserController::class , 'login']);
    });


