<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalaryController;

Route::get('/', function () {
    return redirect()->route('employees.index');
});

Route::resource('employees', EmployeeController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('positions', PositionController::class);
Route::resource('attendance', AttendanceController::class);
Route::resource('salaries', SalaryController::class);
Route::get('salaries/create/{employeeId}', [SalaryController::class, 'create'])->name('salaries.create');
Route::resource('salaries', SalaryController::class)->except(['create']);

