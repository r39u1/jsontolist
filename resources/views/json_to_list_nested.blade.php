<ul>
    @foreach ($data as $key => $value)
        <li>
            Name: {{ $key }}, 
            Type: {{ gettype($value) }}: 
            @if (is_object($value) or is_array($value))
                @include('json_to_list_nested', ['data' => $value])
            @else
                Value: {{ $value }}
            @endif   
        </li>
    @endforeach
</ul>