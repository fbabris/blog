<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/posts/create', function () {
    return view('create');
})->name('posts.create');

Route::post('/posts', function (Request $request) {
    $request->validate([
        'title' => 'required',
        'description' => ['required', 'min:10'],
    ]);

    return redirect()
    ->route('posts.create')
    ->with('success', 'Post is submitted! Title: ' .
    $request->input('title') . ' Description: ' .
    $request->input('description'));
})->name('posts.store');
