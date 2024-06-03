@php
$array[] = $protocol->item;

$list_of_all_items = [];
$i = 0;

while (count($array) > 0) {
$list_of_all_items[$i] = $array[0];

foreach ($list_of_all_items[$i]->children as $child) {
$array[] = $child;
}
$i++;
array_shift($array);
}
function getAncestors($item)
{
$ancestors = [];

while ($item !== null) {
$ancestors[] = $item->name;
$item = $item->parent;
}

return array_reverse($ancestors);
}

@endphp
<!DOCTYPE html>
<html>

<head>
    <title>Protokół {{ $protocol->title }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        body {
            font-family: "Roboto", sans-serif;
            counter-reset: heading2;
        }

        h2:before {
            content: counter(heading2) ". ";
            counter-increment: heading2;
        }

        h2 {
            counter-reset: heading3;
        }

        h3:before {
            content: counter(heading3) ". ";
            counter-increment: heading3;
        }

        h3 {
            counter-reset: heading4;
        }

        h4:before {
            content: counter(heading3) "." counter(heading4) ". ";
            counter-increment: heading4;
        }

        th,
        td {
            border: 1px solid black;
        }

        .indent {
            padding-left: 25px;

        }

        th,
        td {
            border: 1px solid black;
            padding: 2px 10px 2px 10px;
        }

        table {
            border-collapse: collapse;
            border: 2px solid black;
        }

        thead>tr>th {
            border-bottom-width: 2px;
        }

        thead>tr>th:first-of-type,
        tbody>tr>th:first-of-type {
            border-right-width: 2px;
        }

        .text {
            text-align: left;
        }

        .number {
            text-align: right;
        }

        .grade {
            text-align: center;
        }
    </style>
</head>

<br>
<p style="text-align:right;">Data dokumentu: {{ date('Y-m-d') }}</p>

<h1 style="text-align:center;">Protokół
    @if($protocol->title)
    {{ $protocol->title }}
    @endif
</h1>

<div class="indent">
    @if($protocol->protocolType)
    <p style="text-align:center;">{{ $protocol->protocolType->name }}</p>
    @else
    <p style="text-align:center;">nie określono</p>
    @endif
</div>

<h2>Zleceniodawca</h2>
@if($protocol->customer)
<div class="indent">
    <p>Nazwa: {{ $protocol->customer->name }}</p>
    <p>Adres: {{ $protocol->customer->address }}</p>
</div>
@else
<div class="indent">
    <p>Nie określono</p>
</div>
@endif

<h2>Obiekt</h2>
<div class="indent">
    <p>{{ $protocol->object }}</p>
    <p>{{ $protocol->object_address }}</p>
</div>

<h2>Data badania: {{ date('Y-m-d', strtotime($protocol->date)) }}</h2>

<h2>Przyrządy pomiarowe</h2>
<div class="indent">
    @if ($protocol->devices != null)
    <ol>
        @foreach ($protocol->devices as $device)
        <li>{{ $device->device_type }} | {{ $device->name }} | nr seryjny: {{ $device->serial_number }} |
            data certyfikacji: {{ date('Y-m-d', strtotime($device->check_date))}}
        </li>
        @endforeach
    </ol>
    @else
    Brak.
    @endif
</div>

<h2>Wyniki pomiarowe</h2>
<div class="indent">
    @foreach ($list_of_all_items as $item)
    @if (count($item->forms) > 0)
    <h3> {{ implode(', ', getAncestors($item)) }}</h3>
    <div class="indent">
        @foreach ($item->forms as $form)
        <h4>{{ $form->template->name }}</h4>

        <table>
            <thead>
                <tr>
                    <th>Lp.</th>
                    @php
                    $types = [];
                    @endphp
                    @foreach ($form->template->columns as $column)
                    @php
                    $types[] = $column->type;
                    @endphp
                    <th>{{ $column->name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @php
                $lp = 1;
                @endphp
                @foreach ($form->records as $record)
                <tr>
                    <th>{{ $lp++ }}</th>
                    @php
                    $col = 0;
                    @endphp
                    @foreach ($record->values as $value)
                    <td class="{{ $types[$col] }}">{{ $value->value }}</td>
                    @php
                    $col++;
                    @endphp
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
        @endforeach
    </div>
    @endif
    @endforeach
</div>

<h2>Uwagi oraz wnioski</h2>
<div class="indent">
    @if ($protocol->notes != null)
    {{ $protocol->notes }}
    @else
    Brak.
    @endif
</div>

<!-- <h2>Daty następnych badań</h2>
<div class="indent">
    @if (count($protocol->nextTests) > 0)
    <ol>
        @foreach ($protocol->nextTests as $next_test)
        <li>{{ $next_test }}</li>
        @endforeach
    </ol>
    @else
    Nie określono.
    @endif
</div> -->

<h2>Wykonawcy pomiarów</h2>
<div class="indent">
    {{ Auth::user()->name }}
</div>
</body>


</html>