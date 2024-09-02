document.getElementById('form').addEventListener('submit', function(event) {
    event.preventDefault();

    var valorsSeleccionats = [];
    var opcionsSeleccionades = document.getElementById('titol').selectedOptions;
    for (var i = 0; i < opcionsSeleccionades.length; i++) {
        valorsSeleccionats.push(opcionsSeleccionades[i].value);
    }

    var formData = {
        titol: valorsSeleccionats
    };

    fetch('http://imdb.test/api/movies/unstore', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData)
    })
    .then(resposta => resposta.json())
    .then(data => {
        document.getElementById('resposta').textContent = data.message;
        if (data.isValid) {
            document.getElementById('resposta').style.color = 'green';
        } else {
            document.getElementById('resposta').style.color = 'red';
        }
    })});