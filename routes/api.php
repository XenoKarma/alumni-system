<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AlumniController;
use App\Http\Controllers\API\AdminController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return response()->json([
        'message' => 'API Alumni System Running!'
    ]);
});

// Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Alumni Profiles
    Route::get('/alumni', [AlumniController::class, 'index']); // Public list of alumni (or protected)
    Route::get('/alumni/profile', [AlumniController::class, 'profile']); // Get my profile
    Route::post('/alumni/profile', [AlumniController::class, 'store']); // Create my profile
    Route::put('/alumni/profile', [AlumniController::class, 'update']); // Update my profile
    Route::get('/study-programs', [AlumniController::class, 'studyPrograms']);

});

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

    Route::get('/admin/alumni', [AdminController::class, 'alumni']);

    Route::get(
        '/admin/alumni/status/{status}',
        [AdminController::class, 'alumniByStatus']
    );

});