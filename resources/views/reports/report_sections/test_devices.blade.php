<!-- resources/views/reports/report_sections/test_devices.blade.php -->
<fieldset class="min-w-max h-full bg-white">
    <h1 class="text-lg font-bold">Przyrządy pomiarowe</h1>
    <!-- Create Form -->

    <table class="min-w-full divide-y divide-gray-200">
        <!-- Table Header -->
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Typ przyrządu</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nazwa miernika</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nr seryjny</th>
                <th scope="col" class="flex justify-center text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Operacje</th>
            </tr>
        </thead>
        <!-- Table Body -->
        <tbody class="bg-white divide-y divide-gray-200" id="table-body">
            <form action="{{ route('test-devices.store') }}" method="POST">
                @csrf
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap"><input type="text" name="typ_przyrzadu" id="typ_przyrzadu" placeholder="Typ przyrządu" required></td>
                    <td class="px-6 py-4 whitespace-nowrap"><input type="text" name="nazwa_miernika" id="nazwa_miernika" placeholder="Nazwa miernika" required></td>
                    <td class="px-6 py-4 whitespace-nowrap"><input type="text" name="nr_seryjny" id="nr_seryjny" placeholder="Nr seryjny" required></td>
                    <input type="text" value="{{$report->id}}" name="report_id" id="report_id" style="display: none;" />
                    <td class="flex justify-around items-center">
                        <button type="submit" id="dodaj_miernik" class="bg-blue-500 p-2">Dodaj</button>
                    </td>
                </tr>
            </form>
            <!-- Display Test Devices -->
            @foreach($testDevices as $testDevice)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $testDevice->typ_przyrzadu }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $testDevice->nazwa_miernika }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $testDevice->nr_seryjny }}</td>
                <td class="flex justify-around items-center">
                    <!-- Edit Form -->
                    <form action="{{ route('test-devices.update', $testDevice->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="bg-orange-500 p-2">Edytuj</button>
                    </form>
                    <!-- Delete Form -->
                    <form action="{{ route('test-devices.destroy', $testDevice->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 p-2">Usuń</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</fieldset>