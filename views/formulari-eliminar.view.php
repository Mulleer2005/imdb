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
        <h1>Formulari eliminar pel·lícula</h1>
        <form name="formulari" method="post" id="form">
            <div class="form-part">
                <label for="titol">Títol</label><br><br>
                <select id= "titol" multiple name="id[]" required size="5">
                <?php
                $stmt = $connection->prepare("SELECT id, title FROM movies");
                $stmt->execute();
                $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <?php foreach($movies as $movie) : ?>
                    <option value="<?php echo $movie["id"]?>"><?php echo $movie["title"]?></option>
                <?php endforeach?> 
                </select>
            </div>
        <button>Eliminar pel·lícula</button>
        </form>
    </div>
    <div id="resposta"><div>

    <div class="footer">
        <h3>Footer</h3>
    </div>

    <script>
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
    </script>
</body>
</html>