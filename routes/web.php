<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Admin\PerfumeController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/perfumes', [PerfumeController::class, 'index'])->name('perfumes.index');
    Route::get('/perfumes/create', [PerfumeController::class, 'create'])->name('perfumes.create');
    Route::post('/perfumes', [PerfumeController::class, 'store'])->name('perfumes.store');
});