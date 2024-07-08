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
        <h1>Formulari eliminar pel·lícula</h1>
        <form name="formulari" method="post" action="/store/drop/movie">
            <div class="form-part">
                <label for="titol">Títol</label><br><br>
                <select multiple name="id[]" required size="5">
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
        <button>Eliminar pel·lícula</button>
        </form>
    </div>

    <div class="footer">
        <h3>Footer</h3>
    </div>
</body>
</html>
