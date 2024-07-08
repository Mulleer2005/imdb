
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

    <?php $_SESSION['errors_bag'] = []; ?>

    
    <div class="container">
        <h1>Formulari afegir tag</h1>
        <form name="formulari" method="post" action="/store/insert/tags">
            <div class="form-part">
                <label for="tag">Nou tag</label>
                <input type="text" name="tag">
            </div>
            <button>Crear tag</button>
        </form>
    </div>

    <div class="footer">
        <h3>Footer</h3>
    </div>
</body>
</html>
