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
        <h1>Formulari afegir director</h1>
        <form id="form" name="formulari" method="post" action="/store/insert/directors">
            <div class="form-part">
                <label for="name">Nou director</label>
                <input id="name" type="text" name="director"></input>
            </div>

            <div class="form-part">
                <label for="birthdate">Data naixement director</label>
                <input id="birthdate"type="date" name="birthdate" min="1900-01-01" max="2004-12-31"></input>
            </div>
            <button>Crear director</button>
        </form>
    </div>
    <div id="resposta"></div>
    <div class="footer">
        <h3>Footer</h3>
    </div>

    <script src="../formulari-crear-directors/.js" defer></script>

</body>
</html>
