document.getElementById('form').addEventListener('submit', function(event) {
    event.preventDefault();

    var textSeleccionat1 = document.getElementById('titol').value;
    var textSeleccionat2 = document.getElementById('resum').value;
    var textSeleccionat3 = document.getElementById('portada').value;

    var valorsSeleccionats4 = [];
    var opcionsSeleccionades4 = document.getElementById('tags').selectedOptions;
    for (var i = 0; i < opcionsSeleccionades4.length; i++) {
        valorsSeleccionats4.push(opcionsSeleccionades4[i].value);
    }

    var valorsSeleccionats5 = [];
    var opcionsSeleccionades5 = document.getElementById('director').selectedOptions;
    for (var i = 0; i < opcionsSeleccionades5.length; i++) {
        valorsSeleccionats5.push(opcionsSeleccionades5[i].value);
    }

    var textSeleccionat6 = document.getElementById('valoracio').value;


    var formData = {
        titol: textSeleccionat1,
        resum: textSeleccionat2,
        portada: textSeleccionat3,
        tags: valorsSeleccionats4,
        director: valorsSeleccionats5,
        valoracio: textSeleccionat6
    };

    fetch('http://imdb.test/api/movies/store', {
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
