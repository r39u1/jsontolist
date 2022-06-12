@php
    function item_has_child($item) {
        return is_object($item) or is_array($item);
    }

    function is_active($depth, $currentDepth) {
        return $depth === "max" or $currentDepth <= $depth;
    }
@endphp

<link rel="stylesheet" href="/collapsible_list.css">

<div 
    @if (!empty($backgroundUrl))
        style="background: url('{{ $backgroundUrl }}')"
    @elseif (!empty($backgroundRgb))
        style="background: rgb{{ $backgroundRgb }}"
    @endif
>
    <ul>
        @include('json_to_list_li', [
            'data' => $data,
            'depth' => $depth,
            'currentDepth' => 1
        ])
    </ul>
</div>


<script src="/collapsible_list.js"></script>