<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PrescriptionController;

// Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Routes protégées
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    // Admin
    Route::middleware('role:admin')->group(function () {
        Route::apiResource('doctors', DoctorController::class);
    });

    // Patient
    Route::middleware('role:patient')->group(function () {
        Route::apiResource('appointments', AppointmentController::class)->only(['store', 'index', 'show']);
    });

    // Médecin
    Route::middleware('role:medecin')->group(function () {
        Route::apiResource('appointments', AppointmentController::class)->only(['update']);
        Route::apiResource('prescriptions', PrescriptionController::class);
    });

    // Infos user connecté
    Route::get('/user', function(Request $request){
        return $request->user();
    });
});
