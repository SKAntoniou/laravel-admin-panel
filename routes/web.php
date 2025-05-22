<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;
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
});

require __DIR__.'/auth.php';
