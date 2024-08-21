<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\UserController;


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


//Leads
Route::get('dashboard/leads', [LeadController::class, 'leads'])->name('leads')->middleware('check.permission:Listing,Leads');
Route::get('dashboard/leads-detail/{id?}', [LeadController::class, 'leads_detail'])->name('leads_detail')->middleware('check.permission:View,Leads');
Route::get('dashboard/update-leads-detail/{id?}/{status?}', [LeadController::class, 'update_leads_detail'])->name('update_leads_detail')->middleware('check.permission:Update,Leads');
Route::get('/get-leads', [LeadController::class, 'getLeads'])->name('getLeads')->middleware('check.permission:Listing,Leads');


//User
Route::get('dashboard/user-management', [UserController::class, 'user_management'])->name('user_management')->middleware('check.permission:Listing,Users');
Route::get('dashboard/add-user', [UserController::class, 'add_user'])->name('add_user')->middleware('check.permission:Add,Users');
Route::post('store-add-user', [UserController::class, 'store_add_user'])->name('store_add_user')->middleware('check.permission:Add,Users');
Route::get('dashboard/edit-user/{id?}', [UserController::class, 'edit_user'])->name('edit_user')->middleware('check.permission:View,Users');
Route::post('update-user', [UserController::class, 'update_user'])->name('update_user')->middleware('check.permission:Update,Users');
Route::get('dashboard/delete-user/{id?}', [UserController::class, 'delete_user'])->name('delete_user')->middleware('check.permission:Delete,Users');
Route::get('dashboard/edit-permission/{id?}', [UserController::class, 'edit_permission'])->name('edit_permission')->middleware('check.permission:View,Permissions');


