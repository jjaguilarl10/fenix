<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;


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

Route::get('/', function () {
    return view('welcome');
});


/*---
  Version : 01
  Created : Dic 21 2023
  Author  : JJ.
  Description : Prueba tecnica fenix.
---*/

# Login 
Route::group(['prefix' => '/auth'], function(){
    Route::get('/login',[LoginController::class, "signIn"])->name('auth.singin');
    Route::post('/login',[LoginController::class, "signInPost"])->name('auth.singin.post');
    Route::get('/logout',[LoginController::class, "logout"])->name('auth.logout');
});

# Dashboard 
Route::group(['prefix' => '/intra',  'middleware' => 'auth'], function(){
    Route::get('/dashboard',[DashboardController::class, "index"])->name('dash.index');

    Route::group(['prefix' => '/users'], function(){
        
        Route::get('/items',[UserController::class, "index"])->name('users.index');

        Route::get('/security/{uuid}',[UserController::class, "security"])->name('security');
        Route::post('/security/{uuid}',[UserController::class, "security_save"])->name('security.save');

        Route::get('/items/add',[UserController::class, "add"])->name('users.add');
        Route::post('/items/add',[UserController::class, "save"])->name('users.save');

        Route::get('/items/{uuid}',[UserController::class, "edit"])->name('users.edit');
        Route::post('/items/{uuid}',[UserController::class, "update"])->name('users.update');

        Route::post('/trash',[UserController::class, "trash"])->name('users.trash');
        
    });

});
