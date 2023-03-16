<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\UserAddController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserManagementController;

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
// The roor of the app
Route::get('/',[DashboardController::class, 'index'])->name("dashboard")->middleware('auth');

//  The sign-in Page
Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'store']);

// Logging out
Route::post('/logout',[LogoutController::class,'store'])->name("logout");

//The super Admin can add users unsing thess routes
Route::get('/user-add',[UserAddController::class,'showForm'])->name('user-add-form');
Route::post('/user-add',[UserAddController::class,'storeUser'])->name('user-add-store');

// The dashboard Page
Route::get('/dashboard',[DashboardController::class, 'index'])->name("dashboard")->middleware('auth');

// The Room Management Page
Route::get('/room',[SalleController::class,'index'])->name('room');
Route::post('/room',[SalleController::class,'store']);
Route::put('/room/{id}',[SalleController::class,'update'])->name('room.update');
Route::delete('/room/{id}', [SalleController::class, 'destroy'])->name('room.destroy');

// The Machine Management PAge
Route::get('/machine',[MachineController::class,'index'])->name('machine');
Route::post('/machine',[MachineController::class,'store']);
Route::delete('/machine/{id}', [MachineController::class, 'destroy'])->name('machine.destroy');

//
Route::get('/user-management',[UserManagementController::class,'showTable'])->name("user-management");
Route::delete('/user-management/{id}',[UserManagementController::class,'delete'])->name("user-management-delete");
Route::patch('/user-management/{id}',[UserManagementController::class,'update_status'])->name("user-management-change-status");
