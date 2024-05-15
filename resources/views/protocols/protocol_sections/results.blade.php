<div class="bg-blue-500 h-full w-48 min-h-96 ">
    <form></form>
    <div class="flex justify-around">
        <button class="px-2 bg-white " id="clear" onclick="clearSelectedItem()">X</button>
    </div>
    <!--  -->

    @foreach($protocolItems as $item)
    <h1 class="item" id="item_id_{{$item->id}}">{{$item->name}}</h1>
    @foreach($item->OGLForms as $form)
    <h2>OGLForm</h2>
    @endforeach
    @endforeach
</div>
<script>
    var selectedItem = null;


    var clearSelectedItem = () => {
        selectedItem.setAttribute('style', 'font-weight:normal')
        selectedItem = null;
    }

    var items = document.getElementsByClassName('item');

    for (let i = 0; i < items.length; i++) {
        items[i].addEventListener('click', () => handleClick(items[i]))
    }


    var handleClick = (item) => {
        selectedItem = item;
        selectedItem.setAttribute('style', 'font-weight:bold')
        console.log(selectedItem)
    };
</script>