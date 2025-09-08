<?php

use App\Http\Controllers\SampleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SampleController::class, 'index'])->name('sample.index');
Route::post('/upload', [SampleController::class, 'upload'])->name('sample.upload');
