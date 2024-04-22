<?php

namespace App\Http\Controllers;

use App\Models\TestDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class TestDeviceController extends Controller
{
    public function index()
    {
        // Retrieve all test devices and pass them to the view
        $testDevices = TestDevice::all();
        return view('reports.report_sections.test_devices', compact('testDevices'));
    }

    public function store(Request $request)
    {
        // Get the current logged-in user's ID
        $userId = Auth::id();
        $id = Route::current()->parameter('id');

        // Validate the request data
        $request->validate([
            'typ_przyrzadu' => 'required',
            'nazwa_miernika' => 'required',
            'nr_seryjny' => 'required',
        ]);

        // Remove the 'updated_at' and 'created_at' fields from the request data
        $requestData = $request->except(['updated_at', 'created_at']);

        // Add the current user's ID to the request data
        $requestData['user_id'] = $userId;
        $requestData['report_id'] = $id;

        // Create a new test device
        TestDevice::create($requestData);

        // Redirect with success message
        return redirect()->route('reports.edit', ['id' => $id], 'header')->with('success', 'Test device created successfully.');
    }


    public function update(Request $request, TestDevice $testDevice)
    {

        $userId = Auth::id();
        $id = request()->segment(3);

        // Validate the request data
        $request->validate([
            'typPrzyrzadu' => 'required',
            'nazwaMiernika' => 'required',
            'nrSeryjny' => 'required',
        ]);

        // Update the test device
        $testDevice->update($request->all());

        // Redirect with success message
        $requestData = $request->except(['updated_at', 'created_at']);

        // Add the current user's ID to the request data
        $requestData['user_id'] = $userId;
        $requestData['report_id'] = $id;

        // Create a new test device
        TestDevice::create($requestData);

        // Redirect with success message
        return redirect()->route('reports.edit', ['id' => $id]);
    }


    public function destroy(TestDevice $testDevice)
    {
        // Delete the specified test device
        $testDevice->delete();

        // Redirect with success message
        return redirect()->route('test-devices.index')->with('success', 'Test device deleted successfully.');
    }

    // Implement other CRUD methods such as store, update, delete as per your requirements
}
