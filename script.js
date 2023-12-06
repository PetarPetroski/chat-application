function updateChat() {
    const name = document.getElementById('name').value;
    const message = document.getElementById('message').value;

    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Optional: Handle the response if needed
            } else {
                console.error('Error: Unable to update chat.');
            }
        }
    };

    xhr.open('POST', 'update_chat.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(`name=${encodeURIComponent(name)}&message=${encodeURIComponent(message)}`);
}

function retrieveChat() {
    const name = document.getElementById('listenName').value; // Update to use the correct input field
    const resultMessage = document.getElementById('listenMessage');

    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                resultMessage.innerText = xhr.responseText;
            } else {
                resultMessage.innerText = 'Error: Unable to retrieve chat.';
            }
        }
    };

    xhr.open('GET', `get_chat.php?name=${encodeURIComponent(name)}&_=${new Date().getTime()}`, true);
    xhr.send();
}

setInterval(function () {
    retrieveChat();
}, 1000);