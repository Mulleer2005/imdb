<?php session_start(); ?>
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

    <?php foreach ($_SESSION['errors_bag'] as $error) : ?>       
        <div class="errors">
            <span class="errors--error"> <?php echo $error; ?></span>
        </div>
    <?php endforeach?>

    <div class="container">
        <h1>Formulari modificar pel·lícula</h1>
        <form name="formulari" method="post" action="/store/update/movie">
        <div class="form-part">
                <label for="titol">Pel·lícula a modificar</label><br><br>
                <select name="id" size="5">
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
                <input type="text" name="titol">
            </div>
            <div class="form-part">
                <label for="resum">Nou resum</label>
                <input type="text" name="resum"></input>
            </div>
            <div class="form-part">
                <label for="portada">Nova ruta de la portada</label>
                <input type="text" name="portada">
            </div>
            <div class="form-part">
                <label for="tags">Nous tags</label><br><br>
                <select multiple name="tagsIDs[]" size="10">
                <?php
                require 'back/connection.php';

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
                <select multiple name="directorsIDs[]" size="8">
                <?php
                require 'back/connection.php';

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
                <input type="number" name="valoracio" min="0" max="10" step="1">
            </div>
            <button>Modificar pel·lícula</button>
        </form>
    </div>

    <div class="footer">
        <h3>Footer</h3>
    </div>
</body>
</html>
