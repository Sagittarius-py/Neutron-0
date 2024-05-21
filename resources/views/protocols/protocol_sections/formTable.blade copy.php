<table class="table-auto w-full border-collapse border">
    <thead class="h-24">
        <tr>
            <th>Lp.</th>
            @foreach($protocolItems[0]->forms[0]->template->columns as $column)
            <th>{{$column->name}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($protocolItems[0]->forms[0]->records as $record)
        <tr>
            <td>{{$record->id}}</td>
            @foreach($protocolItems[0]->forms[0]->template->columns as $column)
            <td>
                @if($column->type == 'text')
                <input type="text" data-record="{{$record->id}}" data-column="{{$column->id}}" class="form-value" value="{{$record->values->where('column_id', $column->id)->pluck('value')->first()}}">
                @elseif($column->type == 'decimal')
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
</table>