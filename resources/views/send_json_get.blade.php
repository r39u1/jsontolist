<!DOCTYPE html>
<html>
<head>
    <title>Send JSON GET</title>
</head>
<body>
    <form id="send_json_container" 
    align="center" method="GET" action="{{ route('jsonToList') }}">
        @csrf
        <label for="json_textarea">JSON</label><br>
        <textarea id="json_textarea" rows="20" cols="75" name="json"></textarea><br>
        <label for="depth">Depth</label>
        <input id="depth" name="depth" type="text"><br>
        <label for="background">Background</label>
        <input id="background" name="background" type="text"><br>
        <input type="submit" value="Send JSON">
    </div>
    <hr>
</body>
</html>