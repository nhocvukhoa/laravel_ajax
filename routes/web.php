<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CategoryController;

Route::get('/', [UserController::class, 'index']);

Route::prefix('employee')->group(function() {
    Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');
    Route::post('/store', [EmployeeController::class, 'store'])->name('store');
    Route::get('/fetch-all', [EmployeeController::class, 'fetchAll'])->name('fetchAll');
    Route::get('/edit', [EmployeeController::class, 'edit'])->name('edit');
    Route::post('/update', [EmployeeController::class, 'update'])->name('update');
    Route::post('/delete', [EmployeeController::class, 'delete'])->name('delete');
});



Route::prefix('category')->group(function() {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/fetch-all', [CategoryController::class, 'fetchAll'])->name('category.fetchAll');
    Route::get('/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/delete', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/active', [CategoryController::class, 'active'])->name('category.active');
    Route::post('/perform_active', [CategoryController::class, 'performActive'])->name('category.perform_active');
    Route::get('/unactive', [CategoryController::class, 'unactive'])->name('category.unactive');
});