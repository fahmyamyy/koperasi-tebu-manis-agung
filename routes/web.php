<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', function () {
    return view('components.layout');
})->name('home');

Route::get('/admin/user/create', function () {
    return view('admin.user.index.create');
})->name('admin.user.create.page');

// Route::get('/login', function () {
//     return view('login');
// })->name('login');

// Auth
Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');


// Pinjaman
Route::post('/pinjaman', [PinjamanController::class, 'createPinjaman'])->name('pinjaman.create');
Route::patch('/pinjaman', [PinjamanController::class, 'updateStatusPinjaman'])->name('pinjaman.update');
Route::get('/pinjaman', [PinjamanController::class, 'getAllPinjamanUser'])->name('pinjaman.index');


Route::get('/login', [AuthenticationController::class, 'showLoginForm'])->name('login.form');

Route::get('/admin/users', [UserController::class, 'getAllUsers'])->name('admin.user.index');
Route::get('/admin/users/{userId}', [UserController::class, 'viewUser'])->name('admin.user.detail');
Route::patch('/admin/users', [UserController::class, 'createUser'])->name('admin.user.create');
Route::put('/admin/users', [UserController::class, 'updateUser'])->name('admin.user.update');
Route::delete('/admin/users/{userId}', [UserController::class, 'deleteUser'])->name('admin.user.delete');