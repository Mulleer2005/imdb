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

    <script src="../dist/formulari-eliminar.js" defer></script>

</body>
</html>