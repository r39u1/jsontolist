@foreach ($data as $key => $value)
    <li>
        <span
            @if (item_has_child($value)) 
                class="list_button
                    @if (is_active($depth, $currentDepth))
                         minus
                    @endif
                "
            @endif
            >
            Name: {{ $key }},
            Type: {{ gettype($value) }}:
        </span>
        @if (item_has_child($value))
            <ul class="nested @if (is_active($depth, $currentDepth)) active @endif">
                @include('json_to_list_li', [
                    'data' => $value,
                    'depth' => $depth,
                    'currentDepth' => $currentDepth + 1,
                ])
            </ul>
        @else
            Value: {{ $value }}
        @endif
    </li>
@endforeach
