<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PrescriptionController;

// ---------------------------
// AUTH
// ---------------------------
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// ---------------------------
// ROUTES PROTÉGÉES PAR AUTH SANCTUM
// ---------------------------
Route::middleware('auth:sanctum')->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // -----------------------
    // ADMIN ROUTES
    // -----------------------
    Route::middleware('role:admin')->group(function () {
        Route::apiResource('doctors', DoctorController::class);
    });

    // -----------------------
    // PATIENT ROUTES
    // -----------------------
    Route::middleware('role:patient')->group(function () {
        Route::apiResource('appointments', AppointmentController::class)
            ->only(['store', 'index', 'show']);
    });

    // -----------------------
    // MEDECIN ROUTES
    // -----------------------
    Route::middleware('role:medecin')->group(function () {
        Route::apiResource('appointments', AppointmentController::class)
            ->only(['update']);
        Route::apiResource('prescriptions', PrescriptionController::class);
    });

    // -----------------------
    // INFOS UTILISATEUR CONNECTÉ
    // -----------------------
    Route::get('/user', function(Request $request){
        return $request->user();
    });

});
