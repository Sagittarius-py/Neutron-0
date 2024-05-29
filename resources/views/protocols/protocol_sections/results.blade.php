<div class="flex no-wrap items-start  relative pt-12">
    <div class="w-full h-12 bg-red-500 absolute top-0 flex flex-row justify-around no-wrap items-center">
        <button class="px-2 bg-white" id="clear" onclick="clearSelectedItem()" style="display: none;">Wyczyść zaznaczenie obiektu</button>
        <form action="{{ route('forms.create') }}" method="POST">
            @csrf
            <select>
                <option value=""></option>
                @foreach ($templates as $template)
                <option value="{{$template->id}}">{{$template->name}}</option>
                @endforeach
            </select>
            <input type="hidden" id="parent_id-2" name="parent_id" value="">
            <button type="submit" class="px-2 bg-white">Dodaj Formularz</button>
        </form>
        <form action="{{ route('items.store') }}" method="POST">
            @csrf
            <input type="hidden" id="protocol_id" name="protocol_id" value="{{$protocol->id}}">
            <input type="text" name="name" placeholder="Item name" required>
            <input type="hidden" id="parent_id" name="parent_id" value="">
            <button type="submit" class="px-2 bg-white">Dodaj Obiekt</button>
        </form>
    </div>

    <div class="bg-blue-500 h-full w-64 min-h-96 overflow-x-scroll text-nowrap">
        <ul>
            @foreach($protocolItems as $item)
            @if(is_null($item->parent_id))
            @include('protocols.protocol_sections.treeItem', ['item' => $item, 'level' => 0])
            @endif
            @endforeach
        </ul>
    </div>

    <div id="table-container" class="w-full" style="display: none;">
        @if(null !== session('form'))
        <script>
        {{$form = session('form')}}
        </script>
        @include('protocols.protocol_sections.formTable')
        @endif
        <div id="form-data-container"></div>
    </div>
</div>

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


    function getFormData(formId) {
        // Tworzymy nowy obiekt XMLHttpRequest
        var xhr = new XMLHttpRequest();

        // Definiujemy metodę i adres URL żądania
        xhr.open('GET', '/form-data/' + formId, true);

        // Ustawiamy nagłówek żądania
        xhr.setRequestHeader('Content-Type', 'application/json');

        // Ustawiamy funkcję obsługi zdarzenia dla zmiany stanu żądania
        xhr.onreadystatechange = function() {
            // Sprawdzamy, czy żądanie zostało zakończone
            if (xhr.readyState === XMLHttpRequest.DONE) {
                // Sprawdzamy status odpowiedzi
                if (xhr.status === 200) {
                    // Parsujemy odpowiedź jako JSON i wyświetlamy ją w konsoli
                    var data = JSON.parse(xhr.responseText);
                    console.log(data); // Handle success response
                } else {
                    console.error('Request failed: ' + xhr.status); // Handle error
                }
            }
        };

        // Wysyłamy żądanie
        xhr.send();
    }

    // Wywołujemy funkcję getFormData z id formularza i przechwytujemy odpowiedź asynchronicznie
    getFormData(1);

    var selectedItem = null;
    var clearBtn = document.getElementById("clear");

    function clearSelectedItem() {
        if (selectedItem) {
            selectedItem.setAttribute('style', 'font-weight:normal');
            selectedItem = null;
            document.getElementById('parent_id').value = '';
            clearBtn.style.display = "none";
            document.getElementById('table-container').style.display = "none"; // Hide the table
        }
    }

    var items = document.getElementsByClassName('item');
    for (let i = 0; i < items.length; i++) {
        items[i].addEventListener('click', () => handleClick(items[i]));
    }

    function handleClick(item) {
        if (selectedItem) {
            selectedItem.setAttribute('style', 'font-weight:normal');
        }
        selectedItem = item;
        selectedItem.setAttribute('style', 'font-weight:bold');
        document.getElementById('parent_id').value = selectedItem.getAttribute('data-id');
        document.getElementById('parent_id-2').value = selectedItem.getAttribute('data-id');
        clearBtn.style.display = "block";
        document.getElementById('table-container').style.display = "block"; // Show the table
    }
</script>