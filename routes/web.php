<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RootController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');

// Auth
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Root Dashboard
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');
Route::post('/updateProfile', [UserController::class, 'updateProfile']);
Route::get('/password', [UserController::class, 'password'])->middleware('auth');
Route::post('/updatePassword', [UserController::class, 'updatePassword']);

Route::get('/users', [AdminController::class, 'index'])->middleware('auth');
Route::post('/users/{user:id}', [AdminController::class, 'deactivated']);
Route::get('/pending', [AdminController::class, 'pending'])->middleware('auth');
Route::post('/pending/{user:id}', [AdminController::class, 'activated']);

Route::get('/activities', [RootController::class, 'activities'])->middleware('auth');

Route::get('/changelog', [MessageController::class, 'index'])->middleware('auth');

// Admin Dashboard
Route::resource('/medicine', MedicineController::class)->middleware('auth');

Route::get('/history', [MedicineController::class, 'history'])->middleware('auth');

Route::get('/forecast', [ForecastController::class, 'index'])->middleware('auth')->name('forecast.index');

Route::get('/hash', function () {
    return Hash::make('password');
});
