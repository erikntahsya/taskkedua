<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

/*
|---------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminController::class, 'login']);
Route::get('/register', [AdminController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AdminController::class, 'createUser'])->name('register.submit');

Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/admin/profile', [AdminController::class, 'profile'])->middleware('auth')->name('admin.profile');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return Auth::user()->role === 'Admin' 
            ? redirect()->route('admin.dashboard') 
            : redirect()->route('user.dashboard');
    })->name('dashboard');
    
    Route::middleware('role:Admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/kelola', [AdminController::class, 'kelola'])->name('users.kelola'); // Halaman Kelola User
        
        // Route untuk menampilkan form pembuatan user baru
        Route::get('/users/create', function () {
            return view('createUser'); // Pastikan Anda membuat view createUser.blade.php
        })->name('users.create');

        // Route untuk proses pembuatan user baru
        Route::post('/users', [AdminController::class, 'store'])->name('users.store');
        Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('users.destroy');
        

        // Route untuk mengelola pengguna, exclude edit & create
        // Route::resource('users', AdminController::class)->except(['edit', 'create']);
        Route::put('/users/{id}', [AdminController::class, 'update'])->name('users.update');

    });

    Route::middleware('role:User')->group(function () {
        Route::get('/user/dashboard', [AdminController::class, 'indek'])->name('user.dashboard');
    });

});
