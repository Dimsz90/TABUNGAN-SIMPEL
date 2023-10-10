<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController; 



 
Route::get('/', function () {
    return view('/auth/login');
});
 
Route::resource("/student", StudentController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::patch('/student/{id}', 'StudentController@updateStudent');
Route::get('/student/{id}/history', [StudentController::class, 'history']);








