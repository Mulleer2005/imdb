<?php
require_once 'vendor/autoload.php';

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

    $movieId = $_GET['movieId'];
    $data = 'http://imdb.test/movies/detail?movie_id=' . $movieId;

    header('Content-Type: text/html');
    echo (new QRCode)->render($data);

?>
