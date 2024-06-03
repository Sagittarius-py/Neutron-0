<div>
    <h1 class="text-3xl font-bold mb-4">Urządzenia testowe</h1>
    <div class="overflow-x-auto">
        <form>
            @csrf
            <table class="table-auto w-full border-collapse border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Device Type</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Serial Number</th>
                        <th class="px-4 py-2">Check Date</th>
                        <th class="px-4 py-2">Select</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($devices as $device)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $device->device_type }}</td>
                        <td class="px-4 py-2">{{ $device->name }}</td>
                        <td class="px-4 py-2">{{ $device->serial_number }}</td>
                        <td class="px-4 py-2">{{ $device->check_date }}</td>
                        <td class="px-4 py-2"><input type="checkbox" name="selected_devices[]" value="{{ $device->id }}" {{ $protocol->devices->contains($device->id) ? 'checked' : '' }}></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('input[name="selected_devices[]"]');

        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                const formData = new FormData(document.querySelector('form'));

                fetch('{{ route("devices.addSelected", ["protocol" => $protocol]) }}', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.text();
                    })
                    .then(data => {
                        console.log(data); // You can handle the response here
                    })
                    .catch(error => {
                        console.error('There was a problem with your fetch operation:', error);
                    });
            });
        });
    });
</script>