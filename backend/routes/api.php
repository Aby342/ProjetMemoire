<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\PatientController;

// AUTH
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', fn(Request $request) => $request->user());

    // ADMIN
    Route::middleware('role:admin')->group(function () {
        Route::apiResource('doctors', DoctorController::class);
        Route::get('/patients', [PatientController::class, 'index']);
        Route::get('/patients/{id}', [PatientController::class, 'show']);
        Route::middleware(['auth:sanctum', 'admin'])->group(function () {
       Route::get('/admin/users', [AdminController::class, 'index']);
        Route::delete('/admin/user/{id}', [AdminController::class, 'destroy']);
});

        
    });

    // PATIENT
    Route::middleware('role:patient')->group(function () {
        Route::apiResource('appointments', AppointmentController::class)
            ->only(['store', 'index', 'show']);
    });

    // DOCTOR
    Route::middleware('role:doctor')->group(function () {
        Route::apiResource('appointments', AppointmentController::class)
            ->only(['update']);
        Route::apiResource('prescriptions', PrescriptionController::class);
    });
});
