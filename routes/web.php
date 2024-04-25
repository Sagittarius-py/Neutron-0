<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProtocolController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\DeviceController;


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

    Route::get('/protocols', [ProtocolController::class, 'index'])->name('protocols.index');
    Route::get('/protocols/create', [ProtocolController::class, 'create'])->name('protocols.create');
    Route::get('/protocols/{protocol}', [ProtocolController::class, 'show'])->name('protocols.show');
    Route::put('/protocols/{protocol}', [ProtocolController::class, 'update'])->name('protocols.update');
    Route::delete('/protocols/{protocol}', [ProtocolController::class, 'destroy'])->name('protocols.destroy');
    Route::get('/protocols/{protocol}/edit/{any?}', [ProtocolController::class, 'edit'])->name('protocols.edit');

    // Define routes related to reports and test devices
    // Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    // Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
    // Route::get('/reports/create', [ReportController::class, 'create'])->name('reports.create');
    // Route::get('/reports/{id}', [ReportController::class, 'show'])->name('reports.show');

    // Route::get('/reports/edit/{id}/header', [ReportController::class, 'edit'])->name('reports.edit');
    // Route::get('/reports/edit/{id}/tests', [ReportController::class, 'edit'])->name('reports.edit');
    // Route::get('/reports/edit/{id}/additional', [ReportController::class, 'edit'])->name('reports.edit');

    // Route::put('/reports/{id}', [ReportController::class, 'update'])->name('reports.update');
    // Route::delete('/reports/{id}', [ReportController::class, 'destroy'])->name('reports.destroy');

    Route::get('/devices', [DeviceController::class, 'index']);
    Route::post('/devices', [DeviceController::class, 'store'])->name('devices.store');
    Route::put('/devices/{testDevice}', [DeviceController::class, 'update'])->name('devices.update');
    Route::delete('/devices/{testDevice}', [DeviceController::class, 'destroy'])->name('devices.destroy');
});
