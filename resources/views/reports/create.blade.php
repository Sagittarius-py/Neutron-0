<!-- resources/views/reports/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="flex w-full">
    <div id="left" class="min-h-screen w-1/5 bg-white relative pt-16">
        <div class="absolute w-full h-14 bg-blue-500 top-0"></div>
        <div id="json-tree">
            <h2>JSON Tree</h2>
            <ul id="json-list"></ul>
        </div>
    </div>
    <div id="right" class="min-h-screen w-4/5 bg-white relative pt-14 border-l-2 border-black">

        @include('reports.report_sections.header')

    </div>
</div>
<script>
    function updateData(input) {
        // Get the new value entered by the user
        var newValue = input.value;
        console.log(input.id);

        // // Send the new value to the server using AJAX
        // axios.post('/update-data', {
        //         inputName: input.name,
        //         newValue: newValue
        //     })
        //     .then(function(response) {
        //         console.log(response.data);
        //     })
        //     .catch(function(error) {
        //         console.error('Error:', error);
        //     });
    }
</script>


@endsection