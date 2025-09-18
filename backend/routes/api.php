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

    // Médecins
    Route::apiResource('doctors', DoctorController::class);

    // Rendez-vous
    Route::apiResource('appointments', AppointmentController::class);

    // Prescriptions
    Route::apiResource('prescriptions', PrescriptionController::class);
});
