<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\DurianController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('admin');

    Route::resource('durians', DurianController::class)->middleware('admin');
    Route::resource('admins', AdminController::class)->middleware('admin');
    Route::resource('users', UserController::class)->middleware('admin');
});

Auth::routes();
