<!DOCTYPE html>
<html>
<head>
    <title>Send JSON</title>
</head>
<body>
    <hr>
    @include('send_json_form', ['method' => 'GET'])
    <hr>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <hr>
    @endif
    
    @include('send_json_form', ['method' => 'POST'])
    <hr>
</body>
</html>