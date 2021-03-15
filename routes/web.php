<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postcontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [postcontroller::class, 'index'])->name('posts.index');

Route::get('/posts/create', [postcontroller::class, 'create'])->name('posts.create');
Route::POST('/posts', [postcontroller::class, 'store'])->name('posts.store');

Route::get('/posts/{post}/edit', [postcontroller::class, 'edit'])->name('posts.edit');


Route::get('/posts/{post}', [postcontroller::class, 'show'])->name('posts.show');
Route::PUT('/posts/{post}', [postcontroller::class, 'update'])->name('posts.update');
Route::DELETE('/posts/{post}', [postcontroller::class, 'destroy'])->name('posts.destroy');
