<table class="table-auto w-full border-collapse border">
    <thead class="h-24">
        <tr>
            <th>Lp.</th>
            @foreach($form->template->columns as $column)
            <th>{{$column->name}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($form->records as $record)
        <tr>
            <td>{{$record->id}}</td>
            @foreach($form->template->columns as $column)
            <td>
                @if($column->type == 'text')
                <input type="text" data-record="{{$record->id}}" data-column="{{$column->id}}" class="form-value" value="{{$record->values->where('column_id', $column->id)->pluck('value')->first()}}">
                @elseif($column->type == 'number')
                <input type="number" step="0.01" data-record="{{$record->id}}" data-column="{{$column->id}}" class="form-value" value="{{$record->values->where('column_id', $column->id)->pluck('value')->first()}}">
                @elseif($column->type == 'grade')
                <input type="text" list="suggestions" data-record="{{$record->id}}" data-column="{{$column->id}}" class="form-value" value="{{$record->values->where('column_id', $column->id)->pluck('value')->first()}}">
                <datalist id="suggestions">
                    <option value="tak">
                    <option value="nie">
                    <option value="pozytywna">
                    <option value="negatywna">
                    <option value="nie dotyczy">
                    <option value="uwagi">
                </datalist>
                @endif
            </td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
    <form action="{{route('record.create')}}" method="post">
        @csrf
        <input type="hidden" name="form_id" value="{{$form->id}}">
        <tr>
            <td>
                <!-- Lp. będzie automatycznie numerowane przez JavaScript -->
            </td>
            @foreach($form->template->columns as $column)
            <td>
                @if($column->type == 'text')
                <input type="text" name="column{{$column->id}}" class="form-value">
                @elseif($column->type == 'number')
                <input type="number" step="0.01" name="column{{$column->id}}" class="form-value">
                @elseif($column->type == 'grade')
                <input type="text" list="suggestions" name="column{{$column->id}}" class="form-value">
                <datalist id="suggestions">
                    <option value="tak">
                    <option value="nie">
                    <option value="pozytywna">
                    <option value="negatywna">
                    <option value="nie dotyczy">
                    <option value="uwagi">
                </datalist>
                @endif
            </td>
            @endforeach
            <td>
                <button type="submit">Dodaj</button>
            </td>
        </tr>
    </form>
</table>

<script>
    // Get all input elements with class "form-value"
    document.querySelectorAll('.form-value').forEach(function(input) {
        // Add onChange event listener to each input
        input.addEventListener('change', function() {
            // Get the record ID and column ID from data attributes
            var recordId = this.getAttribute('data-record');
            var columnId = this.getAttribute('data-column');
            var value = this.value; // Get the new value entered by the user

            // Send AJAX PATCH request to update or add the value
            var xhr = new XMLHttpRequest();
            xhr.open('PATCH', '/' + recordId + '/' + columnId + '/' + value, true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText); // Handle success response
                    } else {
                        console.error('Request failed: ' + xhr.status); // Handle error
                    }
                }
            };
            xhr.send(JSON.stringify({
                value: value
            }));
        });
    });
</script>


