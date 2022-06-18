<!DOCTYPE html>
@php
function item_has_child($item)
{
    return is_object($item) or is_array($item);
}

function is_active($depth, $currentDepth)
{
    return $depth === 'max' or $currentDepth <= $depth;
}
@endphp
<html>

<head>
    <title>JSON to List</title>
    <link rel="stylesheet" href="/collapsible_list.css">
</head>

<body
    @if (!empty($background['url']))
        style="background: url('{{ $background['url'] }}')"
    @elseif (!empty($background['rgb']))
        style="background: rgb{{ $background['rgb'] }}"
    @endif
    >
    <ul>
        @include('json_to_list_li', [
            'data' => $data,
            'depth' => $depth,
            'currentDepth' => 1,
        ])
    </ul>

    <script src="/collapsible_list.js"></script>
</body>

</html>
