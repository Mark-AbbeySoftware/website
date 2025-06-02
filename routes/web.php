<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/services', function () {
    return view('pages.api-development');
});

Route::get('/projects', function () {
    return view('pages.projects');
});

Route::get('/blog', function () {
    return view('pages.blog');
});

Route::get('/downloads', function () {
    return view('pages.downloads');
});

Route::get('/faq', function () {
    return view('pages.faq');
});


Route::get('/contact', function () {
    return view('pages.contact');
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
