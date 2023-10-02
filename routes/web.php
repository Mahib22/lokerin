<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VacancyController;
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

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isClient'])->group(function () {
    Route::get('dashboard/client', [DashboardController::class, 'clientIndex'])->name('client.dashboard');
    Route::post('dashboard/client', [VacancyController::class, 'store'])->name('vacancy.store');
    Route::get('vacancies', [DashboardController::class, 'jobCreated'])->name('vacancy.show');
    Route::get('vacancies/{id}', [DashboardController::class, 'jobDetail'])->name('vacancy.detail');
});

Route::middleware(['auth', 'isWorker'])->group(function () {
    Route::get('dashboard/worker', [DashboardController::class, 'workerIndex'])->name('worker.dashboard');
    Route::post('apply/{id}', [DashboardController::class, 'applyJob'])->name('apply');
    Route::get('history/worker', [DashboardController::class, 'historyJob'])->name('worker.history');
});
