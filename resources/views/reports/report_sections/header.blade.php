<!-- resources/views/reports/report_sections/create.blade.php -->
<div class="absolute w-full h-14 bg-blue-500 top-0 flex items-center pl-2">
    <button class="p-2 bg-white font-bold" wire:click="handleSave">Zapisz</button>
</div>
<div class="min-h-full w-full relative">
    <form ></form>
    <div class="border bg-gray-300 p-2">
        <h1 class="text-lg font-bold">Nagłówek</h1>
        <fieldset class=" flex justify-around">

            <div class="w-1/3">
                <label for="data_badania" class="block font-semibold">Data badania:</label>
                <input type="text" id="title" name="title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" />
            </div>
            <div class="w-1/3">
                <label for="data_badania" class="block font-semibold">Data badania:</label>
                <input type="text" id="data_badania" name="data_badania" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" />
            </div>
            <div class=" w-1/3">
                <label for="rodzaj_protokolu" class="block font-semibold">Rodzaj protokołu:</label>
                <input type="text" id="rodzaj_protokolu" name="rodzaj_protokolu" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" />
            </div>
        </fieldset>
    </div>
    <div class="border  p-2">
        <h1 class="text-lg font-bold">Zleceniodawca</h1>
        <fieldset class=" flex justify-around">

            <div class="w-1/3">
                <label for="nazwa_zleceniodawcy" class="block font-semibold">Nazwa zleceniodawcy:</label>
                <input type="text" id="nazwa_zleceniodawcy" name="nazwa_zleceniodawcy" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" />
            </div>
            <div class="w-1/3">
                <label for="adres_zleceniodawcy" class="block font-semibold">Adres zleceniodawcy:</label>
                <input type="text" id="adres_zleceniodawcy" name="adres_zleceniodawcy" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" />
            </div>
        </fieldset>
    </div>
    <div class="border bg-gray-300 p-2">
        <h1 class="text-lg font-bold">Obiekt</h1>
        <fieldset class=" flex justify-around">

            <div class="w-1/3">
                <label for="nazwa_obiektu" class="block font-semibold">Nazwa obiektu:</label>
                <input type="text" id="nazwa_obiektu" name="nazwa_obiektu" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
            </div>
            <div class="w-1/3">
                <label for="lokalizacja_obiektu" class="block font-semibold">Lokalizacja obiektu:</label>
                <input type="text" id="lokalizacja_obiektu" name="lokalizacja_obiektu" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" />
            </div>
        </fieldset>
    </div>
    @include('reports.report_sections.test_devices')


</div>