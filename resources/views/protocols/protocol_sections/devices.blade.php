<div>
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border">
            <thead>
                <tr class="bg-gray-200">

                    <th class="px-4 py-2">Device Type</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Serial Number</th>
                    <th class="px-4 py-2">Check Date</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($devices as $device)
                <tr class="border-t">

                    <td class="px-4 py-2">{{ $device->device_type }}</td>
                    <td class="px-4 py-2">{{ $device->name }}</td>
                    <td class="px-4 py-2">{{ $device->serial_number }}</td>
                    <td class="px-4 py-2">{{ $device->check_date }}</td>
                    <td class="px-4 py-2">
                        <!-- Edit button -->


                        <!-- Delete form -->
                        <form action="{{ route('devices.destroy', $device->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 ml-2 hover:underline" onclick="return confirm('Are you sure you want to delete this device?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                <tr class="border-t">
                    <td>
                        <h1 class="text-xl font-bold">Dodaj Nowe Urządzenie</h1>
                    </td>
                </tr>
                <tr class="border-t">
                    <form action="{{ route('devices.store') }}" method="POST">
                        @csrf
                        <td class="px-4 py-2"><input type="text" name="device_type" id="device_type" class="form-input w-full border-gray-300  border-2 border-black"></td>
                        <td class="px-4 py-2"> <input type="text" name="name" id="name" class="form-input w-full border-gray-300  border-2 border-black"></td>
                        <td class="px-4 py-2"> <input type="text" name="serial_number" id="serial_number" class="form-input w-full border-gray-300  border-2 border-black"></td>
                        <td class="px-4 py-2"><input type="date" name="check_date" id="check_date" class="form-input w-full border-gray-300  border-2 border-black"></td>
                        <td class="px-4 py-2"> <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ">Dodaj</button></td>
                    </form>
                </tr>
            </tbody>
        </table>
    </div>




</div>