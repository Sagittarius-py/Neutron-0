<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Protocol;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Device;

class ProtocolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $it = Item::create([
            'protocol_id' => 1,
            'name' => "Sample item",
        ]);

        $cus = Customer::create([
            'user_id' => 2, // Replace with the desired user ID
            'name' => 'Sample Protocol',
            'address' => 'Kwiatowa 124, Nysa, 48-300',
        ]);

        $dev =  Device::create([
            'device_type' => 'Sample type',
            'user_id' => 2,
            'name' => "sample name - amperowmierz",
            'serial_number' => 'Sample Ser Nr',
            'check_date' => now(),
            'document_file' => null,
        ]);
        // Create a new protocol record
        $prot = Protocol::create([
            'user_id' => 2, // Replace with the desired user ID
            'title' => 'Sample Protocol',
            'number' => 'PRO-001',
            'date' => now(),
            'customer_id' => $cus->id, // Replace with the desired customer ID
            'object' => 'Sample Object',
            'object_address' => 'Sample Object Address',
            'item_id' => $it->id, // Replace with the desired item ID
            'protocol_type_id' => 1, // Replace with the desired protocol type ID
            'verdict' => 'Pass', // Replace with the desired verdict
            'notes' => 'Sample Notes',
        ]);

        $prot->devices()->attach($dev);
        $prot->save();
    }
}
