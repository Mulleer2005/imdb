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
        <h1>Formulari crear pel·lícula</h1>
        <form id="form" name="formulari" method="post" action="/store/movie">
            <div class="form-part">
                <label for="titol">Títol</label>
                <input id="titol" type="text" name="titol" required>
            </div>
            <div class="form-part">
                <label for="resum">Resum</label>
                <input id="resum" type="text" name="resum" required></input>
            </div>
            <div class="form-part">
                <label for="portada">Ruta portada</label>
                <input id="portada" type="text" name="portada" required>
            </div>
            <div class="form-part">
                <label for="tags">Tags</label><br><br>
                <select id="tags" multiple name="tags[]" required size="10">
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
                <label for="director">Directors</label><br><br>
                <select id="director" multiple name="directors[]" required size="10">
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
                <label for="valoracio">Valoració 1 - 10</label>
                <input id="valoracio" type="number" name="valoracio" min="0" max="10" step="1" required>
            </div>
            <button>Crear pel·lícula</button>
        </form>
    </div>
    <div id="resposta"></div>
    <div class="footer">
        <h3>Footer</h3>
    </div>

    <script src="../dist/formulari-crear.js" defer></script>



</body>
</html>