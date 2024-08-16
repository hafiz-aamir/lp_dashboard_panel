<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadController;


Route::post('/leads', [LeadController::class, 'add_lead_by_api']);

// Route::middleware('auth:api')->group(function(){
    
//     Route::post('logout', [UserController::class, 'logout']);
//     Route::post('register', [UserController::class, 'register']);
    
// });