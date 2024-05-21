<?php

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
    Route::delete('/protocols/{protocol}', [ProtocolController::class, 'destroy'])->name('protocols.destroy');
    Route::get('/protocols/{protocol}/edit/{any?}', [ProtocolController::class, 'edit'])->name('protocols.edit');

    Route::get('/devices', [DeviceController::class, 'index']);
    Route::post('/devices', [DeviceController::class, 'store'])->name('devices.store');
    Route::put('/devices/{testDevice}', [DeviceController::class, 'update'])->name('devices.update');
    Route::delete('/devices/{testDevice}', [DeviceController::class, 'destroy'])->name('devices.destroy');
    Route::post('/items', [ItemController::class, 'store'])->name('items.store');

    Route::post('/forms/create', [FormController::class, 'create'])->name('forms.create');
    Route::post('/forms/fetch-data', [FormController::class, 'getFormData'])->name('forms.fetchData');

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
