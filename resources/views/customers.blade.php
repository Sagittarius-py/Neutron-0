@extends('layouts.app')

@section('content')

<div class="bg-white">
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border">
            <thead>
                <tr class="bg-gray-200">


                    <th class="px-4 py-2">Nazwa</th>
                    <th class="px-4 py-2">Adres</th>

                    <th class="px-4 py-2">Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr class="border-t">

                    <td class="px-4 py-2">{{ $customer->name }}</td>
                    <td class="px-4 py-2">{{ $customer->address }}</td>

                    <td class="px-4 py-2">
                        <!-- Edit button -->


                        <!-- Delete form -->
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 ml-2 hover:underline" onclick="return confirm('Are you sure you want to delete this device?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                <tr class="border-t">
                    <td>
                        <h1 class="text-xl font-bold">Dodaj Nowego Klienta</h1>
                    </td>
                </tr>
                <tr class="border-t">
                    <form action="{{ route('customers.store') }}" method="POST">
                        @csrf
                        <td class="px-4 py-2"> <input type="text" name="name" id="name" class="form-input w-full border-gray-300  border-2 border-black"></td>
                        <td class="px-4 py-2"> <input type="text" name="address" id="address" class="form-input w-full border-gray-300  border-2 border-black"></td>
                        <td class="px-4 py-2"> <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ">Dodaj</button></td>
                    </form>
                </tr>
            </tbody>
        </table>
    </div>




</div>

@endsection