<?php

require '../back/connection.php';


$stmt = $connection->prepare("set FOREIGN_KEY_CHECKS = 0; truncate movie_tag");
$stmt->execute();

$stmt = $connection->prepare("truncate movie_director");
$stmt->execute();

$stmt = $connection->prepare("truncate movies");
$stmt->execute();

$stmt = $connection->prepare("truncate directors");
$stmt->execute();

$stmt = $connection->prepare("truncate tags; set FOREIGN_KEY_CHECKS = 1");
$stmt->execute();

$jsonData = file_get_contents('directors.json');

$directors = json_decode($jsonData, true);

$stmt = $connection->prepare("INSERT INTO directors (name, birthdate) VALUES (?, ?)");



foreach ($directors as $director) {
    $name = $director['name'];
    $birthdate = $director['birthdate'];
    $stmt->execute([$name, $birthdate]);
}


$jsonData = file_get_contents('genres.json');

$genres = json_decode($jsonData, true);

$stmt = $connection->prepare("INSERT INTO tags (name) VALUES (?)");


foreach ($genres as $tag) {
    $name = $tag['name'];
    $stmt->execute([$name]);
}

$jsonData = file_get_contents('movies.json');

$movies = json_decode($jsonData, true);

$stmt = $connection->prepare("INSERT INTO movies (title, assessment,  description, cover) VALUES (?, ?, ?, ?)");
$stmt2 = $connection->prepare("SELECT id FROM directors WHERE name = ?");
$stmt3 = $connection->prepare("INSERT INTO movie_director (movie_id, director_id) VALUES (?, ?)");
$stmt4 = $connection->prepare("SELECT id FROM tags WHERE name = ?");
$stmt5 = $connection->prepare("INSERT INTO movie_tag (movie_id, tag_id) VALUES (?, ?)");



foreach ($movies as $movie) {
    $title = $movie['title'];
    $description = $movie['description'];
    $assessment = $movie['score'];
    $cover = $movie['cover'];
    $stmt->execute([$title, $assessment, $description, $cover]);

    $last_id = $connection->lastInsertId();

    $director = $movie['director'];

    $stmt2->execute([$director]);

    $directors = $stmt2->fetchAll();

    $stmt3->execute([$last_id, $directors[0]['id']]);

    $tags = $movie['genres'];

    foreach($tags as $reg){
        $arrayID = array($reg);
        foreach($arrayID as $ids){
            $stmt4->execute([$ids]);
            $tags = $stmt4->fetchAll();
            $stmt5->execute([$last_id, $tags[0]['id']]);
        }
    }
}
?>