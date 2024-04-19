<!-- resources/views/reports/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="flex w-full">
    <div id="left" class="min-h-screen w-1/5 bg-white relative pt-16">
        <div class="absolute w-full h-14 bg-blue-500 top-0"></div>

        @foreach(array_keys($data) as $sekcja)
        <a href="/reports/create/{{ $sekcja }}">
            <h1 id="{{$sekcja}}">{{$sekcja}}</h1>
        </a>
        @endforeach
    </div>
    <div id="right" class="min-h-screen w-4/5 bg-white relative pt-14 border-l-2 border-black">
        <div class="absolute w-full h-14 bg-blue-500 top-0 flex items-center pl-2">
            <button class="p-2 bg-white font-bold">Zapisz</button>
        </div>
        @if(request()->is('reports/create/naglowek'))
        @include('reports.report_sections.header')
        @elseif(request()->is('reports/create/wyniki-pomiarow'))
        @include('reports.report_sections.test')

        @else

        @endif


    </div>
</div>
@endsection