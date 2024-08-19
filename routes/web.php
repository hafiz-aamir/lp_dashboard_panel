<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Authentication Routes
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('postlogin', [LoginController::class, 'postlogin'])->name('postlogin');


// Dashboard Routes
Route::get('logout', [DashboardController::class, 'logout'])->name('logout');
Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard');
Route::get('dashboard/leads', [DashboardController::class, 'leads'])->name('leads');
Route::get('dashboard/leads-detail/{id?}', [DashboardController::class, 'leads_detail'])->name('leads_detail');
Route::get('dashboard/update-leads-detail/{id?}/{status?}', [DashboardController::class, 'update_leads_detail'])->name('update_leads_detail');
Route::get('dashboard/user-management', [DashboardController::class, 'user_management'])->name('user_management');
Route::get('dashboard/add-user', [DashboardController::class, 'add_user'])->name('add_user');
Route::get('dashboard/edit-user', [DashboardController::class, 'edit_user'])->name('edit_user');
Route::get('/get-leads', [DashboardController::class, 'getLeads'])->name('getLeads');