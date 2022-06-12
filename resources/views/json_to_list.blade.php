@php
    function item_has_child($item) {
        return is_object($item) or is_array($item);
    }    
@endphp

<link rel="stylesheet" href="/collapsible_list.css">

<ul>
    @include('json_to_list_li', ['data' => $data])
</ul>

<script src="/collapsible_list.js"></script>