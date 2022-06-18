<form id="send_json_container" method="{{ $method }}" action="{{ route('jsonToList') }}">
    @include('send_json_form_fields')
    <input type="submit" value="Send JSON {{ $method }}">
</form>
