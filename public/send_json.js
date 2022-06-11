function sendJson(url) {
    let json = JSON.parse(document.getElementById('json_textarea').value);
    let result = document.getElementById('result_container');
    let xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            result.innerHTML = this.responseText;
        }
    };
    xhr.send(json);
}