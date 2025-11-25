<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceEmployeeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SubTaskController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', function () {
    return view('landing.index');
})->name('landing.page');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');

// User
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/attendances/index', [AttendanceEmployeeController::class, 'showAttendance'])->name('user.attendances.index');
    Route::post('/attendances/masuk', [AttendanceEmployeeController::class, 'checkIn'])->name('user.attendances.masuk');
    Route::post('/attendances/keluar', [AttendanceEmployeeController::class, 'checkOut'])->name('user.attendances.keluar');

    Route::get('/tasks/index', [TaskUserController::class, 'index'])->name('user.tasks.index');
    Route::get('/tasks/showCreate', [TaskUserController::class, 'create'])->name('user.tasks.create');
    Route::post('/tasks/storeTask', [TaskUserController::class, 'store'])->name('user.tasks.store');
    Route::patch('/tasks/updateStatus/{task_id}', [TaskUserController::class, 'updateStatus'])->name('user.tasks.updateStatus');
    Route::get('/tasks/editTask/{task_id}', [TaskUserController::class, 'edit'])->name('user.tasks.edit');
    Route::put('/tasks/update/{task_id}', [TaskUserController::class, 'update'])->name('user.tasks.update');
    Route::delete('/tasks/destroyTask/{id}', [TaskUserController::class, 'destroy'])->name('user.tasks.destroy');

    Route::post('/subtasks/store', [SubTaskController::class, 'store'])->name('user.subtasks.store');
    Route::patch('/subtasks/{subtask_id}', [SubTaskController::class, 'update'])->name('user.subtasks.update');

    Route::get('/settings', [UserController::class, 'showSetting'])->name('user.settings.index');
    Route::get('/settings/account-info', [UserController::class, 'showProfile'])->name('user.settings.account-info');
    Route::get('/settings/change-password', [UserController::class, 'showChangePassword'])->name('user.settings.change-password');
    Route::put('/settings/change-password', [UserController::class, 'changePassword'])->name('user.settings.change-password');
});

// Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('employees', EmployeeController::class);
    Route::post('/employees/{employee}/createUser', [UserController::class, 'createUser'])
        ->name('employees.createUser');

    Route::resource('departments', DepartmentController::class);
    Route::resource('positions', PositionController::class);
    Route::resource('salaries', SalaryController::class);
    Route::resource('attendances', AttendanceController::class);
    Route::resource('tasks', TaskController::class);

    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/download', [ReportController::class, 'downloadExcel'])->name('reports.download');
});
