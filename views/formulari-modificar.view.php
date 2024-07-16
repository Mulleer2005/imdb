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

                <?php foreach($tags as $tag) : ?>
                    <option value="<?php echo $tag["id"]?>"><?php echo $tag["name"]?></option>
                <?php endforeach?> 
                </select>
            </div>
            <div class="form-part">
                <label for="director">Nous directors</label><br><br>
                <select id="director" multiple name="directorsIDs[]" size="8">
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

    <script src="../dist/formulari-modificar.js" defer></script>

</body>
</html>
