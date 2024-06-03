<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProtocolController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TestsController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\RecordController;

use App\Models\Record;
use App\Models\Value;
use App\Models\Column;

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
    Route::get('/protocols/delete/{protocol}', [ProtocolController::class, 'destroy'])->name('protocols.destroy');
    Route::get('/protocols/{protocol}/edit/{any?}', [ProtocolController::class, 'edit'])->name('protocols.edit');
    Route::get('/report/{protocol}', [ProtocolController::class, 'generate'])->name('report.generate');

    Route::get('/customers', [CustomerController::class, 'index']);
    Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
    Route::delete('/customers/{testDevice}', [CustomerController::class, 'destroy'])->name('customers.destroy');

    Route::get('/devices', [DeviceController::class, 'index']);
    Route::post('/devices', [DeviceController::class, 'store'])->name('devices.store');
    Route::delete('/devices/{testDevice}', [DeviceController::class, 'destroy'])->name('devices.destroy');
    Route::post('/devices/addSelected/{protocol}', [DeviceController::class, 'addSelected'])->name('devices.addSelected');

    Route::post('/items/create', [ItemController::class, 'store'])->name('items.store');
    Route::post('/items/delete', [ItemController::class, 'destroy'])->name('items.destroy');
    Route::post('/items/update', [ItemController::class, 'update'])->name('items.update');

    Route::post('/forms/create', [FormController::class, 'create'])->name('forms.create');
    Route::post('/forms/fetch-data', [FormController::class, 'getFormData'])->name('forms.fetchData');

    Route::post('/forms/reload', [FormController::class, 'reload'])->name('forms.reload');

    Route::post('/add-record', [RecordController::class, 'addRecord'])->name('record.create');
    Route::patch('/{record}/{column}/{value}', function (Record $record, Column $column, $value) {
        // Find the corresponding Value for the given Record and Column
        $existingValue = Value::where('record_id', $record->id)
            ->where('column_id', $column->id)
            ->first();

        if ($existingValue) {
            // If the Value exists, update its value
            $existingValue->update(['value' => $value]);
        } else {
            // If the Value doesn't exist, create a new one
            Value::create([
                'record_id' => $record->id,
                'column_id' => $column->id,
                'value' => $value,
            ]);
        }

        return response()->json(['message' => 'Value updated or added successfully']);
    });
});
