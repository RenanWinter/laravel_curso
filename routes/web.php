<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\HomeAboutController;

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
    return view('frontend.index');
})->name('index');

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/admin/profile/edit', 'editProfile')->name('admin.profile.edit');
    Route::post('/admin/profile/store', 'storeProfile')->name('admin.profile.store');
    Route::get('/admin/profile/passord/change', 'changePassword')->name('admin.profile.password.change');
    Route::post('/admin/profile/passord/update', 'updatePassword')->name('admin.profile.password.update');
});

Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/admin/home/slide', 'edit')->name('admin.home.slide');
    Route::patch('/admin/home/slide/update', 'update')->name('admin.home.slide.update');
});

Route::controller(HomeAboutController::class)->group(function () {
    Route::get('/admin/home/about', 'edit')->name('admin.home.about');
    Route::patch('/admin/home/about/update', 'update')->name('admin.home.about.update');
    Route::get('/about', 'index')->name('home.about');
});
require __DIR__ . '/auth.php';
