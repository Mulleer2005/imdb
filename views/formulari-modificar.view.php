<?php require 'back/connection.php'; ?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari de Contingut</title>
    <link rel="stylesheet" href="../css/formulari.css">
</head>
<body>
    <div class="header">
        <h3>Header</h3>
    </div>

    <div class="container">
        <h1>Formulari modificar pel·lícula</h1>
        <form id="form" name="formulari" method="post" action="/store/update/movie">
        <div class="form-part">
                <label for="titolAntic">Pel·lícula a modificar</label><br><br>
                <select id="titolAntic" name="id" size="5">
                <?php
                require 'back/connection.php';

                $stmt = $connection->prepare("SELECT id, title FROM movies");
                $stmt->execute();
                $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <?php foreach($movies as $movie) : ?>
                    <option value="<?php echo $movie["id"]?>"><?php echo $movie["title"]?></option>
                <?php endforeach?> 
                </select>
            </div>
            <div class="form-part">
                <label for="titol">Nou títol</label>
                <input id="titol" type="text" name="titol">
            </div>
            <div class="form-part">
                <label for="resum">Nou resum</label>
                <input id="resum" type="text" name="resum"></input>
            </div>
            <div class="form-part">
                <label for="portada">Nova ruta de la portada</label>
                <input id="portada" type="text" name="portada">
            </div>
            <div class="form-part">
                <label for="tags">Nous tags</label><br><br>
                <select id="tags" multiple name="tagsIDs[]" size="10">
                <?php
                $stmt = $connection->prepare("SELECT id, name FROM tags");
                $stmt->execute();
                $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <?php foreach($tags as $tag) : ?>
                    <option value="<?php echo $tag["id"]?>"><?php echo $tag["name"]?></option>
                <?php endforeach?> 
                </select>
            </div>
            <div class="form-part">
                <label for="director">Nous directors</label><br><br>
                <select id="director" multiple name="directorsIDs[]" size="8">
                <?php
                $stmt = $connection->prepare("SELECT id, name FROM directors");
                $stmt->execute();
                $directors = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <?php foreach($directors as $director) : ?>
                    <option value="<?php echo $director["id"]?>"><?php echo $director["name"]?></option>
                <?php endforeach?> 
                </select>
            </div>
            <div class="form-part">
                <label for="valoracio">Nova valoració 0 - 10</label>
                <input id="valoracio" type="number" name="valoracio" min="0" max="10" step="1">
            </div>
            <button>Modificar pel·lícula</button>
        </form>
    </div>
    <div id="resposta"></div>
    <div class="footer">
        <h3>Footer</h3>
    </div>

    <script>
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
    </script>
</body>
</html>
