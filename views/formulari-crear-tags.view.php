
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

    <script>
        document.getElementById('form').addEventListener('submit', function(event) {
            event.preventDefault();

            fetch('http://imdb.test/store/insert/tags', {
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
    </script>
</body>
</html>
