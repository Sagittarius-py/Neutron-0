<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Protocol;
use Illuminate\Http\Request;

class ProtocolController extends Controller
{
    public function index()
    {
        $protocols = Protocol::all();
        return view('protocols.index', compact('protocols'));
    }

    public function create()
    {
        $protocol = new Protocol(['user_id' => Auth::id()]);
        $protocol->save();
        return redirect()->route('protocols.edit', $protocol->id);
    }

    public function show(Protocol $protocol)
    {
        return view('protocols.show', compact('protocol'));
    }

    public function edit(Protocol $protocol)
    {
        return view('protocols.edit', compact('protocol'));
    }
    public function update(Request $request, Protocol $protocol)
    {
        $validatedData = $request->validate([
            'title' => 'string|max:255',
            'number' => 'string|max:255',
            'date' => 'date',
            'notes' => 'string',
        ]);

        $protocol->update([
            'title' => $validatedData['title'],
            'number' => $validatedData['number'],
            'date' => $validatedData['date'],
            'notes' => $validatedData['notes'],
        ]);

        return redirect()->route('protocols.index')->with('success', 'Protocol updated successfully.');
    }

    public function destroy(Protocol $protocol)
    {
        $protocol->delete();
        return redirect()->route('protocols.index');
    }
}