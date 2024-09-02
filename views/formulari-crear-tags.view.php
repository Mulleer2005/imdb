
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
        <h1>Formulari afegir tag</h1>
        <form id="form" name="formulari" method="post" action="/store/insert/tags">
            <div class="form-part">
                <label for="tag">Nou tag</label>
                <input id="tag" type="text">
                <div id="resposta"><div>
            </div>
            <button type="submit">Crear tag</button>
        </form>
    </div>
    <div class="footer">
        <h3>Footer</h3>
    </div>

    <script src="../dist/formulari-crear-tags.js" defer></script>

</body>
</html>
