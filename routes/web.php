<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/employees', [EmployeeController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('employees');
    
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/company/new', [CompanyController::class, 'create'])->name('company.new');
    Route::post('/company/new', [CompanyController::class, 'store'])->name('company.new');

    Route::get('/company/{company}', [CompanyController::class, 'show'])->name('company.show');

    Route::get('/company/{company}/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::patch('/company/{company}/edit', [CompanyController::class, 'update'])->name('company.update');
    Route::delete('/company/{company}/edit', [CompanyController::class, 'delete'])->name('company.delete');

    Route::get('/employee/new', [EmployeeController::class, 'create'])->name('employee.new');
    Route::post('/employee/new', [EmployeeController::class, 'store'])->name('employee.new');

    Route::get('/employee/{employee}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::patch('/employee/{employee}/edit', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('/employee/{employee}/edit', [EmployeeController::class, 'delete'])->name('employee.delete');
});

require __DIR__.'/auth.php';
