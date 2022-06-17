<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('employe', function () {
    return view('employe/employe');
})->middleware(['auth'])->name('employe');

Route::get('pointage', function () {
    return view('employe/pointage');
})->middleware(['auth'])->name('pointage');

Route::get('Login', function () {
    return view('employe/Login');
})->middleware(['auth'])->name('Login');

Route::get('verification', function () {
    return view('employe/verification');
})->middleware(['auth'])->name('verification');

Route::get('employe',[EmployeController::class,'show']);
Route::get('/fetch-employee',[EmployeController::class,'fetchemployee']);
Route::get('edit/{id}',[EmployeController::class,'update']);
