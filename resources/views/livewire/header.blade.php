<!-- resources/views/reports/report_sections/create.blade.php -->

<form class="min-h-full w-full relative">
    <div class="border bg-gray-300 p-2">
        <h1 class="text-lg font-bold">Nagłówek</h1>
        <fieldset class=" flex justify-around">

            <div class="w-1/3">
                <label for="data_badania" class="block font-semibold">Data badania:</label>
                <input type="text" id="data_badania" name="data_badania" value="{{ $data['naglowek']['opis']['data_badania'] }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" wire:model="data_badania" wire:change="handleInputChange">
            </div>
            <div class=" w-1/3">
                <label for="rodzaj_protokolu" class="block font-semibold">Rodzaj protokołu:</label>
                <input type="text" id="rodzaj_protokolu" name="rodzaj_protokolu" value="{{ $data['naglowek']['opis']['rodzaj_protokolu'] }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" wire:model="rodzaj_protokolu" wire:change="handleInputChange">
            </div>
        </fieldset>
    </div>
    <div class="border  p-2">
        <h1 class="text-lg font-bold">Zleceniodawca</h1>
        <fieldset class=" flex justify-around">

            <div class="w-1/3">
                <label for="nazwa_zleceniodawcy" class="block font-semibold">Nazwa zleceniodawcy:</label>
                <input type="text" id="nazwa_zleceniodawcy" name="nazwa_zleceniodawcy" value="{{ $data['naglowek']['zleceniodawca']['nazwa_zleceniodawcy'] }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" wire:model="nazwa_zleceniodawcy" wire:change="handleInputChange">
            </div>
            <div class="w-1/3">
                <label for="adres_zleceniodawcy" class="block font-semibold">Adres zleceniodawcy:</label>
                <input type="text" id="adres_zleceniodawcy" name="adres_zleceniodawcy" value="{{ $data['naglowek']['zleceniodawca']['adres_zleceniodawcy'] }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" wire:model="adres_zleceniodawcy" wire:change="handleInputChange" />
            </div>
        </fieldset>
    </div>
    <div class="border bg-gray-300 p-2">
        <h1 class="text-lg font-bold">Obiekt</h1>
        <fieldset class=" flex justify-around">

            <div class="w-1/3">
                <label for="nazwa_obiektu" class="block font-semibold">Nazwa obiektu:</label>
                <input type="text" id="nazwa_obiektu" name="nazwa_obiektu" value="{{ $data['naglowek']['obiekt']['nazwa_obiektu'] }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" wire:model="nazwa_obiektu" wire:change="handleInputChange">
            </div>
            <div class="w-1/3">
                <label for="lokalizacja_obiektu" class="block font-semibold">Lokalizacja obiektu:</label>
                <input type="text" id="lokalizacja_obiektu" name="lokalizacja_obiektu" value="{{ $data['naglowek']['obiekt']['lokalizacja_obiektu'] }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" wire:model="lokalizacja_obiektu" wire:change="handleInputChange">
            </div>
        </fieldset>
    </div>
    <fieldset class="min-w-max h-full bg-white">
        <h1 class="text-lg font-bold">Przyrządy pomiarowe</h1>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Typ przyrządu</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nazwa miernika</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nr seryjny</th>
                    <th scope="col" class="flex justify-center text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Operacje</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200" id="table-body">
                <td>Dodaj nowy przyrząd</td>
                <tr>

                    <td class="px-6 py-4 whitespace-nowrap"><input type="text" id="typPrzyrzadu" placeholder="Typ przyrządu" required></td>
                    <td class="px-6 py-4 whitespace-nowrap"><input type="text" id="nazwaMiernika" placeholder="Nazwa miernika" required></td>
                    <td class="px-6 py-4 whitespace-nowrap"><input type="text" id="nrSeryjny" placeholder="Nr seryjny" required></td>
                    <td class="flex justify-around items-center"><button id="dodaj" onclick="createAndPassObject()" class="bg-blue-500 p-2">Dodaj</button></td>
                </tr>

                <td>Lista dodanych przyrządów</td>
                @foreach($data['naglowek']['przyrzady_pomiarowe'] as $przyrzad)
                <tr>

                    <td class="px-6 py-4 whitespace-nowrap">{{ $przyrzad['typ_przyrzadu'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $przyrzad['nazwa_miernika'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $przyrzad['nr_seryjny'] }}</td>
                    <td class="flex justify-around items-center">
                        <button id="dodaj" onclick="dodajNowy()" class="bg-orange-500 p-2">Edytuj</button>
                        <button id="dodaj" onclick="dodajNowy()" class="bg-red-500 p-2">Unuń</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </fieldset>

</form>

<script>
    function createAndPassObject() {
        var przyrzad = {
            "typ_przyrzadu": document.getElementById("typPrzyrzadu").value,
            "nazwa_miernika": document.getElementById("nazwaMiernika").value,
            "nr_seryjny": document.getElementById("nrSeryjny").value
        }

        console.log("cokolwiek")

        Livewire.emit('objectCreated', przyrzad);

    };
</script>