<div class="flex no-wrap items-start  relative">
    <div class="bg-slate-400 h-full h-full overflow-x-scroll text-nowrap" style="min-height: 100%; width: 400px">
        <ul>
            @foreach($protocolItems as $item)
            @if(is_null($item->parent_id))
            @include('protocols.protocol_sections.treeItem', ['item' => $item, 'level' => 0])
            @endif
            @endforeach
        </ul>
    </div>

    <div id="table-container" class="w-full" style="display: block;">

        @if(null !== session('form'))
        @php
        $form = session('form')
        @endphp
        @include('protocols.protocol_sections.formTable')
        @else
        <div class="h-94 w-94 flex justify-between flex-col p-4">
            <form action="{{ route('forms.create') }}" method="POST">
                @csrf
                <select name="template_id" id="template_id" style="border: 1px solid black; width: 300px; margin-bottom: 20px">
                    @foreach ($templates as $template)
                    <option value="{{$template->id}}">{{$template->name}}</option>
                    @endforeach
                </select>
                <input type="hidden" id="parent_id-2" name="item_id" value="">
                <button type="submit" class="px-2 bg-green-500" style="border: 1px solid black; margin-bottom: 20px; width: 200px">Dodaj Formularz</button>
            </form>
            <form action="{{ route('items.store') }}" method="POST">
                @csrf
                <input type="hidden" id="protocol_id" name="protocol_id" value="{{$protocol->id}}">
                <input type="text" name="name" placeholder="Item name" required style="border: 1px solid black; width: 300px; margin-bottom: 20px">
                <input type="hidden" id="parent_id" name="parent_id" value="">
                <button type="submit" class="px-2 bg-green-500" style="border: 1px solid black; margin-bottom: 20px; width: 200px">Dodaj Obiekt</button>
            </form>
            <form action="{{ route('items.update') }}" method="POST">
                @csrf
                <input type="hidden" id="parent_id-4" name="parent_id" value="">
                <input type="text" name="name" placeholder="Item name" required style="border: 1px solid black; width: 300px; margin-bottom: 20px">
                <button type="submit" class="px-2 bg-blue-500" style="border: 1px solid black; margin-bottom: 20px; width: 200px">Zmień Nazwę Obiektu</button>
            </form>


            <form action="{{ route('items.destroy') }}" method="POST">
                @csrf
                <input type="hidden" id="parent_id-3" name="parent_id" value="" />
                <button type="submit" class="px-2 bg-red-500" style="border: 1px solid black; margin-bottom: 20px; width: 200px">Usuń Obiekt</button>
            </form>
        </div>

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
        document.getElementById('parent_id-3').value = selectedItem.getAttribute('data-id');
        document.getElementById('parent_id-4').value = selectedItem.getAttribute('data-id');

        clearBtn.style.display = "block";
        document.getElementById('table-container').style.display = "block"; // Show the table
    }




    @if(null !== session('form'))
    handleClick(document.querySelector("#form_item_{{$form->id}}"))
    @elseif(null !== session('item'))
    @php
    $item = session('item')
    @endphp
    handleClick(document.querySelector("#item_{{$item}}"))
    @endif
</script>