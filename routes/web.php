<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// User Site
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard.index');

    Route::get('/attendances/index', [AttendanceController::class, 'showAttendance'])->name('user.attendances.index');
    Route::post('/attendances/masuk', [AttendanceController::class, 'checkIn'])->name('user.attendances.masuk');
    Route::post('/attendances/keluar', [AttendanceController::class, 'checkOut'])->name('user.attendances.keluar');

    Route::get('/settings', [UserController::class, 'showSetting'])->name('user.settings.index');
    Route::get('/settings/account-info', [UserController::class, 'showProfile'])->name('user.settings.account-info');
    Route::get('/settings/change-password', [UserController::class, 'showChangePassword'])->name('user.settings.change-password');
    Route::put('/settings/change-password', [UserController::class, 'changePassword'])->name('user.settings.change-password');
});

Route::resource('employees', EmployeeController::class);
Route::post('/employees/{employee}/createUser', [EmployeeController::class, 'createUser'])
    ->name('employees.createUser');

Route::resource('departments', DepartmentController::class);
Route::resource('positions', PositionController::class);
Route::resource('salaries', SalaryController::class);
Route::resource('attendances', AttendanceController::class);
