<!-- resources/views/reports/index.blade.php -->
@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-4">All Reports</h1>
<a href="{{ route('reports.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create New Report</a>
<ul class="mt-4">
    @foreach ($reports as $report)
    <a href="{{ route('reports.show', $report->id) }}" class="block hover:bg-gray-100 rounded-lg px-4 py-2 mb-2 ">
        <li class="w-full flex justify-between w-auto">
            <h1 class="text-xl font-semibold">{{$report->report_number}}</h1>
            <h1 class="text-xl font-semibold">{{$report->report['title']}}</h1>
            <h1 class="text-xl font-semibold">{{$report->created_at}}</h1>
            <!-- Display other report attributes as needed -->
        </li>
    </a>
    @endforeach
</ul>
@endsection