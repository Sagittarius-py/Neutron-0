<!-- resources/views/reports/edit.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Edit Report</h1>
<form action="{{ route('reports.update', $report->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="user_id">User ID:</label>
    <input type="text" name="user_id" id="user_id" value="{{ $report->user_id }}">
    <!-- Other fields as needed -->
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection