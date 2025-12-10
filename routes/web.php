<?php

use App\Http\Controllers\PrintController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing-page');
})->name('lp');

Route::get('sukses/{id}', function ($id) {
    return view('landing-page-sukses', compact('id'));
})->name('success');

Route::get('biling/{record}/print', [PrintController::class, 'biling'])->name('print.biling');
Route::get('kuitansi/{record}/print', [PrintController::class, 'kuitansi'])->name('print.kuitansi');
Route::get('sertifikat/{record}/print', [PrintController::class, 'sertifikat'])->name('print.sertifikat');
