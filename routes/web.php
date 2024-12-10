<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/files', [FileController::class, 'index'])->name('files.index');
Route::get('/download/{id}', [FileController::class, 'download'])->name('files.download');
Route::post('/upload', [FileController::class, 'store'])->name('files.store');
Route::get('/downloads/count/{id}', [FileController::class, 'getDownloadCount'])->name('files.download.count');

