<!DOCTYPE html>
<html>
<head>
    <script src="/send_json.js"></script>
</head>
<body>
    <div name="send_json_container" align="center">
        <label for="json_textarea">JSON</label><br>
        <textarea name="json_textarea" id="json_textarea" rows="20" cols="75"></textarea><br>
        <button name="send_json" onclick="sendJson('{{ route('jsonToList') }}')">Send JSON</button>
    </div>
    <hr>
</body>
</html>