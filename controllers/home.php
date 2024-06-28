<?php
require 'back/movie.php';

require 'back/director.php';

require 'back/connection.php';

$stmt = $connection->prepare("SELECT id, title, cover, assessment, description  FROM movie");

$stmt->execute();

$movies = $stmt->fetchAll();

$moviesList = [];

foreach ($movies as $movie) {
    $stmt2 = $connection->prepare("SELECT id_tag FROM movie_tag WHERE id_movie = ?");
    $stmt2->execute([$movie['id']]);
    $tagsID = $stmt2->fetchAll();

    $tagsName = [];
    foreach ($tagsID as $tag){
        $stmt3 = $connection->prepare("SELECT name_tag FROM tag WHERE id = ?");
        $stmt3->execute([$tag['id_tag']]);
        $tagName = $stmt3->fetch();
        if($tagName){
            $tagsName[] = $tagName['name_tag'];
        }
    }

    $stmt4 = $connection->prepare("SELECT id_director FROM movie_director WHERE id_movie = ?");
    $stmt4->execute([$movie['id']]);
    $directorsID = $stmt4->fetchAll();

    $directorsName = [];
    foreach ($directorsID as $director){
        $stmt5 = $connection->prepare("SELECT name FROM director WHERE id = ?");
        $stmt5->execute([$director['id_director']]);
        $directorName = $stmt5->fetch();
        if($directorName){
            $directorsName[] = $directorName['name'];
        }
    }
    $moviesList[] = new Movie($movie['title'], $movie['cover'], $movie['assessment'], $tagsName, $movie['description'], $directorsName);

}

require 'views/home.view.php';
