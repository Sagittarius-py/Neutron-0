<!-- resources/views/reports/create.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Create New Report</h1>
<form action="{{ route('reports.store') }}" method="POST">
    @csrf
    <label for="user_id">User ID:</label>
    <input type="text" name="user_id" id="user_id">
    <!-- Other fields as needed -->
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection