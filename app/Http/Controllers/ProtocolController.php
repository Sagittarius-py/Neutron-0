<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Protocol;
use App\Models\ProtocolType;
use App\Models\Device;
use App\Models\Item;
use App\Models\Template;

use Illuminate\Http\Request;

class ProtocolController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $protocols = Protocol::where('user_id', $user->id)->get();
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
        $protocol_types = ProtocolType::all();
        $user = Auth::user();
        $devices = Device::where('user_id', $user->id)->get();
        $protocolItems = Item::where("protocol_id", $protocol->id)->get();
        $templates = Template::all();
        return view('protocols.edit', compact('protocol', 'protocol_types', 'devices', 'protocolItems', 'templates'));
    }
    public function update(Request $request, Protocol $protocol)
    {
        $validatedData = $request->validate([
            'title' => 'string|max:255',
            'number' => 'string|max:255',
            'protocol_type_id' => 'numeric|max:20',
            'date' => 'date',
            'notes' => 'string',
        ]);

        $protocol->update([
            'title' => $validatedData['title'],
            'protocol_type_id' => $validatedData['protocol_type_id'],
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
