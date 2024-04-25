<h1 class="text-3xl font-bold mb-4">Edit Protocol</h1>

<form action="{{ route('protocols.update', $protocol->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $protocol->title) }}" class="border border-gray-300 rounded p-2 w-full">
    </div>

    <div class="mb-4">
        <label for="protocol_type_id" class="block text-gray-700 font-bold mb-2">Potocol Type</label>
        <select type="text" id="protocol_type_id" name="protocol_type_id" class="border border-gray-300 rounded p-2 w-full">
            @foreach ($protocol_types as $type)
            @if($protocol->protocol_type_id == $type->id)
            <option value="{{ old('number', $type->id) }} selected">
                {{ $type->name }}
            </option>
            @else
            <option value="{{ old('number', $type->id) }}">
                {{ $type->name }}
            </option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="number" class="block text-gray-700 font-bold mb-2">Number</label>
        <input type="text" id="number" name="number" value="{{ old('number', $protocol->number) }}" class="border border-gray-300 rounded p-2 w-full">
    </div>


    <div class="mb-4">
        <label for="date" class="block text-gray-700 font-bold mb-2">Date</label>
        <input type="date" id="date" name="date" value="{{ old('date', $protocol->date->format('Y-m-d')) }}" class="border border-gray-300 rounded p-2 w-full">
    </div>

    <div class="mb-4">
        <label for="notes" class="block text-gray-700 font-bold mb-2">Notes</label>
        <textarea id="notes" name="notes" class="border border-gray-300 rounded p-2 w-full">{{ old('notes', $protocol->notes) }}</textarea>
    </div>

    <div>
        <button type="submit" class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-700">Update
            Protocol</button>
    </div>
</form>