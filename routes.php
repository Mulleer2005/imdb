<?php

$router->define([

    'home' =>'controllers/movies/home.php',
    'movies/detail' => 'controllers/movies/detail.php',

    'movies/create' => 'controllers/forms/movies/formulari-insert.php',
    'movies/delete' => 'controllers/forms/movies/formulari-drop.php',
    'movies/update' => 'controllers/forms/movies/formulari-update.php',

    'tags/create' => 'controllers/forms/tags/formulari-insert-tags.php',

    'directors/create' => 'controllers/forms/directors/formulari-insert-directors.php',

    'home/json' => 'back/insert-json.php',

    'api/movies/store' => 'back/api/movies/insert-movies.php',
    'api/movies/unstore' => 'back/api/movies/drop-movies.php',
    'api/movies/modify' => 'back/api/movies/update-movies.php',

    'api/tags/store' => 'back/api/tags/insert-tags.php',

    'api/directors/store' => 'back/api/directors/insert-directors.php',
    'movies/detailqr' => 'back/detail-qr.php',

]);
