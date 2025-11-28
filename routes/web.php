<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\ServiceDetail;
use App\Livewire\AdminDashboard;
use App\Livewire\CustomerDashboard;
use App\Livewire\MechanicDashboard;
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

Route::get('/', function () {
    return view('welcome');
});




Route::middleware(['auth'])->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
        Route::get('/admin/service/{id}', ServiceDetail::class)
    ->name('admin.service.detail');

    });

    Route::middleware('role:mechanic')->group(function () {
        Route::get('/mechanic/dashboard', MechanicDashboard::class)->name('mechanic.dashboard');
        Route::get('/mechanic/service/{id}', \App\Livewire\Mechanic\ServiceDetail::class) ->name('mechanic.service.detail');
    });

    Route::middleware('role:customer')->group(function () {
        Route::get('/customer/dashboard', CustomerDashboard::class)->name('customer.dashboard');
        Route::get('/customer/services', \App\Livewire\Customer\Services::class)->name('customer.services');

    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
