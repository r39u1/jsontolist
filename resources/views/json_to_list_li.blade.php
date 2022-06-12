@foreach ($data as $key => $value)
    <li>
        <span @if (item_has_child($value)) class="list_button" @endif>
        Name: {{ $key }}, 
        Type: {{ gettype($value) }}: 
        </span> 
        @if (item_has_child($value))
            <ul class="nested">
                @include('json_to_list_li', ['data' => $value])
            </ul>
        @else
            Value: {{ $value }}
        @endif   
    </li>
@endforeach