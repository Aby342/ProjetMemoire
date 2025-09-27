<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PrescriptionController;

// Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

// Espace admin : gestion des médecins
    Route::middleware('role:admin')->group(function () {
        Route::apiResource('doctors', DoctorController::class);
    });
 // Espace patient : prise de rendez-vous
    Route::middleware('role:patient')->group(function () {
        Route::apiResource('appointments', AppointmentController::class)->only(['store', 'index', 'show']);
    });

 // Espace médecin : consultations + prescriptions
    Route::middleware('role:medecin')->group(function () {
        Route::apiResource('appointments', AppointmentController::class)->only(['update']);
        Route::apiResource('prescriptions', PrescriptionController::class);
    });
//espace user

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

});

