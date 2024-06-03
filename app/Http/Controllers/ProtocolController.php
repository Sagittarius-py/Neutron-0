<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Protocol;
use App\Models\ProtocolType;
use App\Models\Device;
use App\Models\Item;
use App\Models\Template;
use App\Models\Customer;

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
        $protocol = Protocol::create(['user_id' => Auth::id()]);
        $item = Item::create(['protocol_id' => $protocol->id, 'name' => "Obiekt"]);
        $protocol->update(['item_id' => $item->id]);

        return redirect()->route('protocols.edit', $protocol->id);
    }

    public function show(Protocol $protocol)
    {

        return view('report', compact('protocol'));
    }

    public function edit(Protocol $protocol)
    {
        $protocol_types = ProtocolType::all();
        $user = Auth::user();
        $devices = Device::where('user_id', $user->id)->get();
        $customers = Customer::where('user_id', $user->id)->get();
        $protocolItems = Item::where("protocol_id", $protocol->id)->get();
        $templates = Template::all();
        return view('protocols.edit', compact('protocol', 'protocol_types', 'devices', 'protocolItems', 'templates', 'customers'));
    }
    public function update(Request $request, Protocol $protocol)
    {
        $protocol->update([
            'title' => $request['title'],
            'protocol_type_id' => $request['protocol_type_id'],
            'customer_id' => $request['customer_id'],
            'number' => $request['number'],
            'object' => $request['object'],
            'object_address' => $request['object_address'],
            'date' => $request['date'],
            'notes' => $request['notes'],
        ]);

        error_log($protocol);

        return redirect()->back()->with('success', 'Protocol updated successfully.');
    }

    public function destroy(Protocol $protocol)
    {
        Item::find($protocol->item_id)->delete();
        $protocol->delete();
        return redirect()->route('protocols.index');
    }


    public function generate(Protocol $protocol)
    {
        error_log($protocol);

        return view('report', compact('protocol'));
    }
}
