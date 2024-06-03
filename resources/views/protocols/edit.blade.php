@extends('layouts.app')

@section('content')
<div class="mx-auto w-full">
    <div class="flex w-full flex-col">

        <div class="relative w-full bg-white flex flex-row   border-b border-black">
            <a href="/protocols/{{$protocol->id}}/edit/header" class=" border-r  border-black">
                <h1 class="text-xl font-bold p-4 cursor-pointer">Nagłówek</h1>
            </a>
            <a href="/protocols/{{$protocol->id}}/edit/devices" class=" border-r border-black">
                <h1 class="text-xl font-bold p-4 cursor-pointer">Urządzenia Testowe</h1>
            </a>
            <a href="/protocols/{{$protocol->id}}/edit/results" class=" border-r  border-black">
                <h1 class="text-xl font-bold p-4 cursor-pointer">Wyniki pomiarów</h1>
            </a>

            <a href="/report/{{$protocol->id}}" class=" border-r  border-black" target="blank">
                <h1 class="text-xl font-bold p-4 cursor-pointer">Generuj Raport</h1>
            </a>
        </div>


        <div class="min-h-max w-full bg-white relative p-2 border-top-2 border-black">
            @if(request()->url() == ('http://127.0.0.1:8000/protocols/'.$protocol->id.'/edit/header'))
            @include('protocols.protocol_sections.header')

            @elseif(request()->url() == ('http://127.0.0.1:8000/protocols/'.$protocol->id.'/edit/devices'))
            @include('protocols.protocol_sections.devices')
            @elseif(request()->url() == ('http://127.0.0.1:8000/protocols/'.$protocol->id.'/edit/results'))
            @include('protocols.protocol_sections.results')
            @else
            <h1>Wybierz element z menu</h1>
            @endif
        </div>
    </div>

</div>

@endsection