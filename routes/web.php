<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','admin'])->group(function () {
    // Specialties
    Route::get('/specialties', [App\Http\Controllers\Admin\SpecialtyController::class, 'index'])->name('specialties');
    Route::post('/specialties', [App\Http\Controllers\Admin\SpecialtyController::class, 'send']);
    Route::get('/specialties/create', [App\Http\Controllers\Admin\SpecialtyController::class, 'create'])->name('specialties.create');
    Route::put('/specialties/{specialty}', [App\Http\Controllers\Admin\SpecialtyController::class, 'update']);
    Route::delete('/specialties/{specialty}', [App\Http\Controllers\Admin\SpecialtyController::class, 'destroy']);
    Route::get('/specialties/{specialty}/edit', [App\Http\Controllers\Admin\SpecialtyController::class, 'edit']);
    // Medics
    Route::resource('medics', 'App\Http\Controllers\Admin\DoctorController');
    // Patients
    Route::resource('patients', 'App\Http\Controllers\Admin\PatientController');
});

Route::middleware(['auth','doctor'])->group(function () {
    Route::get('/schedule', [App\Http\Controllers\Doctor\ScheduleController::class, 'edit']);
    Route::post('/schedule', [App\Http\Controllers\Doctor\ScheduleController::class, 'store']);
    // Patients
    Route::resource('patients', 'App\Http\Controllers\Admin\PatientController');
    // Histories
    Route::get('/histories', [App\Http\Controllers\Doctor\HistoryController::class, 'index'])->name('histories');
    Route::get('/histories/{history}', [App\Http\Controllers\Doctor\HistoryController::class, 'show']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/book/create', [App\Http\Controllers\AppointmentController::class, 'create']);
    Route::post('/book', [App\Http\Controllers\AppointmentController::class, 'store']);
    Route::get('/appointments', [App\Http\Controllers\AppointmentController::class, 'index']);
    Route::get('/appointments/{appointment}', [App\Http\Controllers\AppointmentController::class, 'show']);
    Route::get('/appointments/{appointment}/invoice', [App\Http\Controllers\AppointmentController::class, 'invoice']);
    Route::post('/appointments/{appointment}/cancel', [App\Http\Controllers\AppointmentController::class, 'cancel']);
    Route::get('/appointments/{appointment}/cancel', [App\Http\Controllers\AppointmentController::class, 'formCancel']);
    Route::post('/appointments/{appointment}/confirm', [App\Http\Controllers\AppointmentController::class, 'confirm']);
    Route::post('/appointments/{appointment}/appointment', [App\Http\Controllers\AppointmentController::class, 'done']);
    Route::get('/appointments/{appointment}/appointment', [App\Http\Controllers\AppointmentController::class, 'formAppointment']);
    Route::get('/specialties/{specialty}/doctors', [App\Http\Controllers\Api\SpecialtyController::class, 'doctors']);
    Route::get('/schedule/hours', [App\Http\Controllers\Api\ScheduleController::class, 'hours']);
});
