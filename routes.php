<?php

$router->define([
    'home' =>'controllers/home.php',
    'home/details-avatar' =>'controllers/details-avatar.php',
    'home/details-godzilla' =>'controllers/details-godzilla.php',
    'home/formulari-crear' =>'controllers/formulari-insert.php',
    'home/formulari-eliminar' =>'controllers/formulari-drop.php',
    'home/formulari-modificar' =>'controllers/formulari-update.php',
    'home/formulari-crear-tags' =>'controllers/formulari-insert-tags.php',
    'home/formulari-crear-directors' =>'controllers/formulari-insert-directors.php',
    'store/movie' => 'back/insert-movies.php',
    'store/drop/movie' => 'back/drop-movies.php',
    'store/update/movie' => 'back/update-movies.php',
    'store/insert/tags' => 'back/insert-tags.php',
    'store/insert/directors' => 'back/insert-directors.php',
]);