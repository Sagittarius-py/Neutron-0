<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{


    public function store(Request $request)
    {
        error_log('Some message here.');
        $validated = $request->validate([
            'protocol_id' => 'required',
            'name' => 'required',
            'parent_id' => 'nullable',
        ]);



        Item::create($validated);

        return redirect()->back()->with('success', 'Item created successfully.');
    }
}
