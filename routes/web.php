<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TestDeviceController;


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

Auth::routes();

// Define routes after authentication middleware
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Define routes related to reports and test devices
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
    Route::get('/reports/create', [ReportController::class, 'create'])->name('reports.create');
    Route::get('/reports/{id}', [ReportController::class, 'show'])->name('reports.show');

    Route::get('/reports/edit/{id}/header', [ReportController::class, 'edit'])->name('reports.edit');
    Route::get('/reports/edit/{id}/tests', [ReportController::class, 'edit'])->name('reports.edit');
    Route::get('/reports/edit/{id}/additional', [ReportController::class, 'edit'])->name('reports.edit');

    Route::put('/reports/{id}', [ReportController::class, 'update'])->name('reports.update');
    Route::delete('/reports/{id}', [ReportController::class, 'destroy'])->name('reports.destroy');

    Route::get('/test-devices', [TestDeviceController::class, 'index']);
    Route::post('/test-devices', [TestDeviceController::class, 'store'])->name('test-devices.store');
    Route::put('/test-devices/{testDevice}', [TestDeviceController::class, 'update'])->name('test-devices.update');
    Route::delete('/test-devices/{testDevice}', [TestDeviceController::class, 'destroy'])->name('test-devices.destroy');
});
