function sendJsonGet(url) {

    let json = JSON.parse(document.getElementById('json').value);
    let depth = document.getElementById('depth').value;
    let background = document.getElementById('background').value;

    url += '?json=' + encodeURIComponent(JSON.stringify(json));
    url += '&depth=' + encodeURIComponent(depth);
    url += '&background=' + encodeURIComponent(background);

    let xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.open();
            document.write(xhr.responseText);
            document.close();
        }
    };
    xhr.send();
}

function sendJsonPost(url) {

    let json = document.getElementById('json').value;
    let depth = document.getElementById('depth').value;
    let background = document.getElementById('background').value;
    let _token = document.getElementsByName('_token')[0].value;

    let boundary = String(Math.random()).slice(2);
    let boundaryMiddle = '--' + boundary + '\r\n';
    let boundaryLast = '--' + boundary + '--\r\n';
    let contentString = 'Content-Disposition: form-data; name="';

    let data = ['\r\n'];
    data.push(contentString + 'json' + '"\r\n\r\n' + json + '\r\n');
    data.push(contentString + 'depth' + '"\r\n\r\n' + depth + '\r\n');
    data.push(contentString + 'background' + '"\r\n\r\n' + background + '\r\n');
    data = data.join(boundaryMiddle) + boundaryLast;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "multipart/form-data; boundary=" + boundary);
    xhr.setRequestHeader('X-CSRF-TOKEN', _token);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.open();
            document.write(xhr.responseText);
            document.close();
        }
    };
    xhr.send(data);
}