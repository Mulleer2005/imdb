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
        <h1>Formulari de Contingut</h1>
        <form>
            <div class="form-part">
                <label for="titol">Títol</label>
                <input type="text" id="titol" required>
            </div>
            <div class="form-part">
                <label for="resum">Resum</label>
                <input type="text" id="resum" required></input>
            </div>
            <div class="form-part">
                <label for="portada">Portada</label>
                <input type="file" id="portada" accept="image/*" required>
            </div>
            <div class="form-part">
                <label for="tags">Tags</label>
                <input type="text" id="tags" required>
            </div>
            <div class="form-part">
                <label for="director">Director</label>
                <input type="text" id="director" required>
            </div>
            <div class="form-part">
                <label for="valoracio">Valoració en estrelles</label>
                <input type="number" id="valoracio" min="0" max="5" step="1" required>
            </div>
            <button>Enviar</button>
        </form>
    </div>

    <div class="footer">
        <h3>Footer</h3>
    </div>
</body>
</html>
