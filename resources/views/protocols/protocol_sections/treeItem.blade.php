<li class="item" id="item_id_{{$item->id}}" data-id="{{$item->id}}">
    <div class="flex no-wrap">
        @if($level > 0)
        @for($i = 0; $i < $level; $i++) <p>&nbsp;&nbsp;&nbsp;&nbsp;</p>
            @endfor
            <p>└─</p>
            @endif
            {{$item->name}}
    </div>
</li>
@if(!$item->forms->isEmpty())
@foreach($item->forms as $form)
<li class="form" id="form_id_{{$form->id}}" data-id="{{$form->id}}">
    <div class="flex no-wrap">
        @for($i = 0; $i <= $level; $i++) <p>&nbsp;&nbsp;&nbsp;&nbsp;</p>
            @endfor
            <p>└─</p>
            <form action="{{ route('forms.fetchData') }}" method="POST">
                @csrf
                <input type="hidden" id="form_id" name="form_id" value="{{$form->id}}">
                <button class="p-0 m-0 item" type="submit">{{$form->template->name}}</button>
            </form>

    </div>
</li>
@endforeach
@endif
@if(!$item->children->isEmpty())
<ul>
    @foreach($item->children as $child)
    @include('protocols.protocol_sections.treeItem', ['item' => $child, 'level' => $level + 1])
    @endforeach
</ul>
@endif