<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;



Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/or', [PageController::class, 'OR'])->name('or'); 
Route::get('/Bulk_Upload', [PageController::class, 'Bulk_Upload'])->name('bulk_upload'); 
Route::get('/Location_Transfer', [PageController::class, 'Location_Transfer'])->name('location_transfer'); 
Route::get('/Asset_Replacement', [PageController::class, 'Asset_Replacement'])->name('asset_replacement'); 
Route::get('/Asset_Disposal', [PageController::class, 'Asset_Disposal'])->name('asset_disposal'); 
Route::get('/Loan_Asset', [PageController::class, 'Loan_Asset'])->name('loan_asset');
Route::get('/Pre_Asset_Recognition', [PageController::class, 'Pre_Asset_Recognition'])->name('pre_asset_recognition');
Route::get('/My_Approval_Queue', [PageController::class, 'My_Approval_Queue'])->name('my_approval_queue');
Route::get('/Reports', [PageController::class, 'Reports'])->name('reports');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
