<!DOCTYPE html>
<html>
<head>
    <title>Send JSON</title>
    <script src="/send_json.js"></script>
</head>
<body>
    <hr>
    <div id="send_json_container">
        @include('send_json_form_fields')
        <button onclick="sendJsonGet('{{ route('jsonToList') }}')">Send JSON GET</button>
        <button onclick="sendJsonPost('{{ route('jsonToList') }}')">Send JSON POST</button>
    </div>
    <hr>
</body>
</html>