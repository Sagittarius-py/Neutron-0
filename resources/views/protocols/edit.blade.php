@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex w-full">

        <div id="left" class="min-h-max w-1/5 bg-white relative flex flex-col ">
            <a href="/protocols/{{$protocol->id}}/edit/header">
                <h1 class="text-xl font-bold p-4 w-full border-y-2 cursor-pointer">Nagłówek</h1>
            </a>
            <a href="/protocols/{{$protocol->id}}/edit/devices">
                <h1 class="text-xl font-bold p-4 w-full bg-slate-200 cursor-pointer">Urządzenia Testowe</h1>
            </a>
            <a href="/protocols/{{$protocol->id}}/edit/results">
                <h1 class="text-xl font-bold p-4 w-full border-y-2 cursor-pointer">Wyniki pomiarów</h1>
            </a>



        </div>
        <div id=" right" class="min-h-max w-4/5 bg-white relative p-4 border-l-2 border-black">
            @if(request()->url() == ('http://127.0.0.1:8000/protocols/'.$protocol->id.'/edit/header'))
            @include('protocols.protocol_sections.header')
            @elseif(request()->url() == ('http://127.0.0.1:8000/protocols/'.$protocol->id.'/edit/devices'))
            @include('protocols.protocol_sections.devices')
            @elseif(request()->url() == ('http://127.0.0.1:8000/protocols/'.$protocol->id.'/edit/results'))
            @include('protocols.protocol_sections.results')
            @endif

        </div>
    </div>

</div>

@endsection