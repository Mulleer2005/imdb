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
        <h1>Formulari afegir director</h1>
        <form name="formulari" method="post" action="/store/insert/directors">
            <div class="form-part">
                <label for="director">Nou director</label>
                <input type="text" name="director"></input>
            </div>

            <div class="form-part">
                <label for="birthday">Data naixement director</label>
                <input type="date" name="birthday" min="1900-01-01" max="2004-12-31"></input>
            </div>
            <button>Crear director</button>
        </form>
    </div>

    <div class="footer">
        <h3>Footer</h3>
    </div>
</body>
</html>
