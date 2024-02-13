<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CourseController::class, 'index'])->name('dashboard');

Route::group(['as' => 'user.', 'prefix' => 'user'], function () {
    Route::get('/index', [UserController::class, 'index'])->name('index');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('show');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/edit', [UserController::class, 'edit'])->name('edit');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/create', [UserController::class, 'create'])->name('create');
    Route::post('/update', [UserController::class, 'update'])->name('update');
    Route::post('/auth', [UserController::class, 'auth'])->name('auth');
});

Route::group(['as' => 'course.', 'prefix' => 'course'], function () {
    Route::get('/mycourses', [CourseController::class, 'mycourses'])->name('mycourses');
    Route::get('/show/{id}', [CourseController::class, 'show'])->name('show');
    Route::get('/create', [CourseController::class, 'create'])->name('create');
    Route::get('/purchased', [CourseController::class, 'purchased'])->name('purchased');
    Route::post('/store', [CourseController::class, 'store'])->name('store');
});

Route::group(['as' => 'cart.', 'prefix' => 'cart'], function () {
    Route::get('/index', [CartController::class, 'index'])->name('index');
    Route::get('/purchase', [CartController::class, 'purchase'])->name('purchase');
    Route::get('/add/{id}', [CartController::class, 'add'])->name('add');
    Route::get('/remove/{id}', [CartController::class, 'remove'])->name('remove');
});

Route::group(['as' => 'category.', 'prefix' => 'category'], function () {
    Route::get('/toggle/{course_id}/{category_id}', [CategoryController::class, 'toggle'])->name('toggle');
    Route::post('/store', [CategoryController::class, 'store'])->name('store');
});
