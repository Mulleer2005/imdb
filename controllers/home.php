<?php
require __DIR__.'/../back/movie.php';

require __DIR__.'/../back/director.php';

require __DIR__.'/../back/connection.php';

$stmt = $connection->prepare("SELECT id, title, cover, assessment, description  FROM movies");

$stmt->execute();

$movies = $stmt->fetchAll();

$moviesList = [];

foreach ($movies as $movie) {
    $stmt2 = $connection->prepare("SELECT name
    FROM tags
    INNER JOIN movie_tag
    ON tags.id = movie_tag.tag_id
    WHERE movie_id = ?;");
    
    $stmt2->execute([$movie['id']]);
    $tagsList = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    $tagsName = [];
    foreach($tagsList as $tags){
        foreach($tags as $tag){
            $tagsName[] = $tag;
        }
    }

    $stmt4 = $connection->prepare("SELECT name
    FROM directors
    INNER JOIN movie_director
    ON directors.id = movie_director.director_id
    WHERE movie_id = ?;");
    $stmt4->execute([$movie['id']]);
    $directorsList = $stmt4->fetchAll(PDO::FETCH_ASSOC);
    
    $directorsName = [];
    foreach($directorsList as $directors){
        foreach($directors as $director){
            $directorsName[] = $director;
        }
    }

    $moviesList[] = new Movie($movie['title'], $movie['cover'], $movie['assessment'], $tagsName, $movie['description'], $directorsName);
}

require __DIR__.'/../views/home.view.php';
