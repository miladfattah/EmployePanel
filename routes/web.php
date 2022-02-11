<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController ; 
use App\Http\Controllers\Backend\CountryController ; 
use App\Http\Controllers\Backend\ChangePasswordController ; 

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users' , UserController::class);
Route::resource('countries' , CountryController::class);


Route::put('users/{user}/change-password' , [ChangePasswordController::class , 'change_password'])->name('users.change.password');
Route::get('{any}', function () {
    return view('employees.index');
})->where('any', '.*');