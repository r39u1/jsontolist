<!DOCTYPE html>
<html>
<head>
    <title>Send JSON</title>
    <script src="/send_json.js"></script>
</head>
<body>
    <div id="send_json_container" align="center">
        <label for="json_textarea">JSON</label><br>
        <textarea id="json_textarea" rows="20" cols="75"></textarea><br>
        <button onclick="sendJson('{{ route('jsonToList') }}')">Send JSON</button>
    </div>
    <hr>
    <div id="result_container"></div>
</body>
</html>