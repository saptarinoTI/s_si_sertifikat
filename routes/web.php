<?php

use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("landing-page");
})->name('lp');

Route::get("sukses/{id}", function($id) {
    return view("landing-page-sukses", compact("id"));
})->name('success');
