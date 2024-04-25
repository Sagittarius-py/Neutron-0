<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class DeviceController extends Controller
{
    public function index()
    {
        // Retrieve all test devices and pass them to the view
        $testDevices = Device::all();
        return view('protocols.report_sections.devices', compact('testDevices'));
    }

    public function store(Request $request)
    {
        // Get the authenticated user's ID
        $user_id = Auth::user()->id;

        // Validate the request data
        $validatedData = $request->validate([
            'device_type' => 'required',
            'name' => 'required',
            'serial_number' => 'required',
            'check_date' => 'required|date',
            'document_file' => 'nullable',
        ]);

        // Add user_id to the validated data
        $validatedData['user_id'] = $user_id;

        // Create new device
        Device::create($validatedData);

        return redirect()->back()->with('success', 'Device created successfully.');
    }



    public function update(Request $request, Device $device)
    {
        // Validate the request data

        $validatedData = $request->validate([
            'device_type' => 'required',
            'name' => 'required',
            'serial_number' => 'required',
            'check_date' => 'required|date',
            'document_file' => 'nullable',
        ]);

        // Update the device
        $device->update($validatedData);

        return redirect()->back()->with('success', 'Device created successfully.');
    }


    public function destroy(Device $device)
    {
        $device->delete();
        return redirect()->back()->with('success', 'Device created successfully.');
    }

    // Implement other CRUD methods such as store, update, delete as per your requirements
}
