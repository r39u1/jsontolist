<!DOCTYPE html>
<html>
<head>
    <title>Send JSON</title>
</head>
<body>
    <hr>
    @include('send_json_form', ['method' => 'GET'])
    <hr>
    @include('send_json_form', ['method' => 'POST'])
    <hr>
</body>
</html>