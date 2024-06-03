<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Protocol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


class CustomerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $customers = Customer::where('user_id', $user->id)->get();
        return view('customers', compact('customers'));
    }


    public function store(Request $request)
    {
        // Get the authenticated user's ID
        $user_id = Auth::user()->id;

        // Validate the request data
        $validatedData = $request->validate([

            'name' => 'required',
            'address' => 'required',
        ]);

        // Add user_id to the validated data
        $validatedData['user_id'] = $user_id;

        // Create new device
        Customer::create($validatedData);

        return redirect()->back()->with('success', 'Device created successfully.');
    }



    public function update(Request $request, Customer $customer)
    {
        // Validate the request data

        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        // Update the device
        $customer->update($validatedData);

        return redirect()->back()->with('success', 'Device created successfully.');
    }


    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->back()->with('success', 'Device created successfully.');
    }


}
