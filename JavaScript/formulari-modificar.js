document.getElementById('form').addEventListener('submit', function(event) {
    event.preventDefault();

    var textSeleccionat1 = document.getElementById('titolAntic').value;
    var textSeleccionat2 = document.getElementById('titol').value;
    var textSeleccionat3 = document.getElementById('resum').value;
    var textSeleccionat4 = document.getElementById('portada').value;

    var valorsSeleccionats5 = [];
    var opcionsSeleccionades5 = document.getElementById('tags').selectedOptions;
    for (var i = 0; i < opcionsSeleccionades5.length; i++) {
        valorsSeleccionats5.push(opcionsSeleccionades5[i].value);
    }

    var valorsSeleccionats6 = [];
    var opcionsSeleccionades6 = document.getElementById('director').selectedOptions;
    for (var i = 0; i < opcionsSeleccionades6.length; i++) {
        valorsSeleccionats6.push(opcionsSeleccionades6[i].value);
    }

    var textSeleccionat7 = document.getElementById('valoracio').value;


    var formData = {
        titolAntic: textSeleccionat1,
        titol: textSeleccionat2,
        resum: textSeleccionat3,
        portada: textSeleccionat4,
        tags: valorsSeleccionats5,
        director: valorsSeleccionats6,
        valoracio: textSeleccionat7
    };

    fetch('http://imdb.test/api/movies/modify', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData)
    })
    .then(resposta => resposta.json())
    .then(data => {
        document.getElementById('resposta').innerHTML = '';
        for (var camp in data.missatges) {
            var elementMissatge = document.createElement('p');
            elementMissatge.textContent = data.missatges[camp];
            if (data.isValid) {
                elementMissatge.style.color = 'green';
            } else {
                elementMissatge.style.color = 'red';
            }
            document.getElementById('resposta').appendChild(elementMissatge);
        }
    })
});