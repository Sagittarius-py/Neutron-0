<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{


    public function store(Request $request)
    {
        $validated = $request->validate([
            'protocol_id' => 'required',
            'name' => 'required',
            'parent_id' => 'nullable',
        ]);

        $item = Item::create($validated);

        return redirect()->back()->with('item', $item->id);
    }

    public function destroy(Request $request)
    {
        $item = Item::find($request['parent_id']);
        error_log($item);
        if ($item && $item->parent_id !== null) {
            $item->delete();
        }
        return redirect()->back()->with('success', 'gitara');
    }


    public function update(Request $request)
    {
        $item = Item::find($request['parent_id']);

        $item->update([
            'name' => $request['name']
        ]);


        return redirect()->back()->with('success', 'gitara');
    }
}
