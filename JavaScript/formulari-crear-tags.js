document.getElementById('form').addEventListener('submit', function(event) {
    event.preventDefault();

    fetch('http://imdb.test/api/tags/store', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ tag: document.getElementById('tag').value })
    })
    .then(resposta => resposta.json())
    .then(data => {
        document.getElementById('resposta').textContent = data.message;
        if (data.isValid) {
            document.getElementById('resposta').style.color = 'green';
        } else {
            document.getElementById('resposta').style.color = 'red';
        }
    })
});