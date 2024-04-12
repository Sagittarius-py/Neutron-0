<!-- resources/views/reports/show.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Report Details</h1>
<p>ID: {{ $report->id }}</p>
<!-- Display other report attributes as needed -->
<a href="{{ route('reports.edit', $report->id) }}" class="btn btn-primary">Edit Report</a>
<form action="{{ route('reports.destroy', $report->id) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete Report</button>
</form>
@endsection