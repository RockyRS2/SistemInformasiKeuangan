<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('welcome',[
        'aspek' => [
            [
                'judul' => 'Pemasukan',
                'gambar' => 'https://blog.bankmega.com/wp-content/uploads/2024/11/freepik-export-20241104023908u8uc-scaled.jpeg'
            ],
            [
                'judul' => 'Pengeluaran',
                'gambar' => 'https://kasirpintar.co.id/blog/wp-content/uploads/2019/07/f1f2f62a-2b0a-4e5b-b2fa-a7aa0fd6e3e3-1024x684.jpg'
            ],
            [
                'judul' => 'Laporan',
                'gambar' => 'https://www.qoala.app/id/blog/wp-content/uploads/2021/01/40-Cara-Mengelola-Keuangan-dengan-Cermat-demi-Masa-Depan.jpg'
            ]
        ]
    ]);
});

// Tampilkan form registrasi
Route::get('/register', [UserController::class, 'create'])->name('register');

// Proses form registrasi
Route::post('/register', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'showLogin'])->name('login');

Route::post('/login', [UserController::class, 'login'])->name('login.process');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Dashboard Admin
// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard')->middleware('auth');

// Dashboard User
Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->name('user.dashboard')->middleware('auth');

Route::prefix('admin')->middleware(['auth', 'can:admin'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\UserController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{user}/edit', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/users/{user}', [\App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin.users.show');
});