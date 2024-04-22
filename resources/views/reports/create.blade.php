<!-- resources/views/reports/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="flex w-full">
    <div id="left" class="min-h-screen w-1/5 bg-white relative pt-16 flex flex-col ">
        <div class="absolute w-full h-14 bg-blue-500 top-0"></div>

        <a href="/reports/edit/{{$id}}/header">
            <h1 class="w-full h-12 text-xl mx-2">Nagłówek</h1>
        </a>
        <a href="/reports/edit/{{$id}}/tests">
            <h1 class="w-full h-12 text-xl mx-2">Pomiary</h1>
        </a>
        <a href="/reports/edit/{{$id}}/additional">
            <h1 class="w-full h-12 text-xl mx-2">Informacje Dodatkowe</h1>
        </a>
    </div>
    <div id="right" class="min-h-screen w-4/5 bg-white relative pt-14 border-l-2 border-black">
        @if(request()->is('reports/edit/' . $id . '/header'))
        @include('reports.report_sections.header')
        @elseif(request()->is('reports/edit/' . $id . '/tests'))
        @include('reports.report_sections.test')
        @else

        @endif


    </div>
</div>

@endsection