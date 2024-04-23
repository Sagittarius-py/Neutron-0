@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-4">Protocol Details</h1>

        <div class="mb-4">
            <p><strong>Title:</strong> {{ $protocol->title }}</p>
            <p><strong>Number:</strong> {{ $protocol->number }}</p>
            <p><strong>Date:</strong> {{ $protocol->date }}</p>
            <p><strong>Notes:</strong> {{ $protocol->notes }}</p>
            <!-- Dodaj inne pola protokołu, które chcesz wyświetlić -->
        </div>

        <!-- Dodaj tutaj przycisk lub link powrotu do listy protokołów -->
    </div>
@endsection
