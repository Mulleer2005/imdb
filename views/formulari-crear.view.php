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
        <h1>Formulari crear pel·lícula</h1>
        <form name="formulari" method="post" action="/store/movie">
            <div class="form-part">
                <label for="titol">Títol</label>
                <input type="text" name="titol" required>
            </div>
            <div class="form-part">
                <label for="resum">Resum</label>
                <input type="text" name="resum" required></input>
            </div>
            <div class="form-part">
                <label for="portada">Ruta portada</label>
                <input type="text" name="portada" required>
            </div>
            <div class="form-part">
                <label for="tags">Tags</label><br><br>
                <select multiple name="tags[]" required size="10">
                    <option value="Comedy">Comedy</option>
                    <option value="History">History</option>
                    <option value="Sci-Fi">Sci-Fi</option>
                    <option value="Romance">Romance</option>
                    <option value="Thriller">Thriller</option>
                    <option value="Mystery">Mystery</option>
                    <option value="Drama">Drama</option>
                    <option value="Horror">Horror</option>
                    <option value="War">War</option>
                    <option value="Action">Action</option>
                    <option value="Musical">Musical</option>
                    <option value="Superhero">Superhero</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Animation">Animation</option>
                    <option value="Adventure">Adventure</option>
                </select>
            </div>
            <div class="form-part">
                <label for="director">Directors</label><br><br>
                <select multiple name="directors[]" required size="10">
                    <option value="Akira Kurosawa">Akira Kurosawa</option>
                    <option value="Alfred Hitchcock">Alfred Hitchcockr</option>
                    <option value="Christopher Nolan">Christopher Nolan</option>
                    <option value="Clint Eastwood">Clint Eastwood</option>
                    <option value="George Lucas">George Lucas</option>
                    <option value="Hayao Miyazaki">Hayao Miyazaki</option>
                    <option value="James Cameron">James Cameron</option>
                    <option value="Ridley Scott">Ridley Scott</option>
                    <option value="Tim Burton">Tim Burton</option>
                    <option value="Zack Snyder">Zack Snyder</option>
                </select>
            </div>
            <div class="form-part">
                <label for="valoracio">Valoració 1 - 10</label>
                <input type="number" name="valoracio" min="0" max="10" step="1" required>
            </div>
            <button>Crear pel·lícula</button>
        </form>
    </div>

    <div class="footer">
        <h3>Footer</h3>
    </div>
</body>
</html>
