<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('stylist::index');
});

Route::get('/about', function () {
    return view('stylist::pages.about');
});

Route::get('/services', function () {
    return view('stylist::pages.api-development');
});

Route::get('/projects', function () {
    return view('stylist::pages.projects');
});

Route::get('/blog', function () {
    return view('stylist::pages.blog');
});

Route::get('/downloads', function () {
    return view('stylist::pages.downloads');
});

Route::get('/faq', function () {
    return view('stylist::pages.faq');
});


Route::get('/contact', function () {
    return view('stylist::pages.contact');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
