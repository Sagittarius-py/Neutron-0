<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Protocol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


class DeviceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Retrieve all test devices and pass them to the view

        $devices = Device::where('user_id', $user->id)->get();
        return view('devices', compact('devices'));
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


    public function addSelected(Request $request, Protocol $protocol)
    {
        // Get the selected device IDs from the form
        $selectedDeviceIds = $request->input('selected_devices', []);

        // Get the IDs of devices already associated with the protocol
        $existingDeviceIds = $protocol->devices->pluck('id')->toArray();

        // Find out which devices are newly selected
        $newDeviceIds = array_diff($selectedDeviceIds, $existingDeviceIds);

        // Find out which devices are unchecked
        $removedDeviceIds = array_diff($existingDeviceIds, $selectedDeviceIds);

        // Attach only the new devices to the protocol
        if (!empty($newDeviceIds)) {
            $protocol->devices()->attach($newDeviceIds);
        }

        // Detach the unchecked devices from the protocol
        if (!empty($removedDeviceIds)) {
            $protocol->devices()->detach($removedDeviceIds);
        }

        return redirect()->back()->with('success', 'Selected devices updated successfully.');
    }
    // Implement other CRUD methods such as store, update, delete as per your requirements
}
