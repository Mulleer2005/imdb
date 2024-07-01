<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="header">
        <span>IMDB</span>
    </div>

    <div class="films">
        <?php
            foreach ($moviesList as $movie) :
        ?>
            <div class="films__card">
                <div class="card__poster card__poster--blue">
                    <img src="<?php echo ($movie->getCover()); ?>">
                </div>
                <div class ="card__details">
                    <h1><?php echo ($movie->getTitle()); ?></h1>
                    <h3>Dirigida per <?php echo(implode(", ", $movie->getDirector())); ?></h3>
                    <div class="details__assessment">
                        <span>Valoració: <?php echo ($movie->getAssessment()); ?>/10</span>
                    </div>
                    <div class="details__tags">
                        <span><?php echo (implode(", ", $movie->getTags())); ?></span>
                    </div>
                </div>
            </div>

        <?php endforeach?>

        <!-- <div class="films__card">
            <div class="card__poster card__poster--orange">
                <img src="../imatges/godzilla.jpeg">
            </div>
            <div class ="card__details">
                <img src="../imatges/lletresGodzilla.png" class="details--logo">
                <h3>Dirigida per Adam Wingard</h3>
                <div class="details__assessment">
                    <span class="assessment--stars">★★★★★</span>
                    <span>5/5</span>
                </div>
                <div class="details__tags">
                    <span>Ciència ficció</span>
                    <span class="tags--action">Acció</span>
                    <span class="tags--adventure">Aventura</span>
                </div>
            </div>
        </div> -->
    </div>

    <footer class="footer">
        <div class="footer__line1">
            <div class="line1__contact">
                <h3>Follow IMDb in social</h3>
                <img src="../imatges/social.png">
            </div>

            <div class="line1__app">
                <div class="app__textAPP">
                <h3>Get the IMDb app</h3>
                <p>For Android and iOS</p>
                </div>
                <img src="../imatges/codiQR.png">
            </div> 
        </div>

        <div class="footer__line2">
                <h3>Help</h3>
                <h3>Site Index</h3>
                <h3>IMDbPro</h3>
                <h3>Box Office Mojo</h3>
                <h3>License IMDb Data</h3>
        </div>

        <div class="footer__line3">
                <h3>Press Room</h3>
                <h3>Advertising</h3>
                <h3>Jobs</h3>
                <h3>Conditions of Use</h3>
                <h3>Privacy Policy</h3>
                <img src="../imatges/Ads.png">
                <h3>Your Ads Privacy Choises</h3>
        </div>

        <div class="footer__line4">
                <h3>an amazon company</h3>
        </div>

            <p>1990-2024 by IMDb.com, Inc.</p>
    </footer>
</body>
</html>
