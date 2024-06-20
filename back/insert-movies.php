<?php

$server = "127.0.0.1";
$user = "root";
$pass = "";
$db = "imdb";
$dsn = "mysql:host=$server;dbname=$db;charset=utf8";

$connection = new PDO($dsn, $user, $pass);

$stmt = $connection->prepare("set FOREIGN_KEY_CHECKS = 0; truncate movie_tag");
$stmt->execute();

$stmt = $connection->prepare("truncate movie_director");
$stmt->execute();

$stmt = $connection->prepare("truncate movie");
$stmt->execute();

$stmt = $connection->prepare("truncate director");
$stmt->execute();

$stmt = $connection->prepare("truncate tag; set FOREIGN_KEY_CHECKS = 1");
$stmt->execute();

$jsonData = file_get_contents('directors.json');

$directors = json_decode($jsonData, true);

$stmt = $connection->prepare("INSERT INTO director (name, birth_date) VALUES (?, ?)");



foreach ($directors as $director) {
    $name = $director['name'];
    $birth_date = $director['birthdate'];
    $stmt->execute([$name, $birth_date]);
}


$jsonData = file_get_contents('genres.json');

$genres = json_decode($jsonData, true);

$stmt = $connection->prepare("INSERT INTO tag (name_tag) VALUES (?)");


foreach ($genres as $tag) {
    $name_tag = $tag['name'];
    $stmt->execute([$name_tag]);
}


$jsonData = file_get_contents('movies.json');

$movies = json_decode($jsonData, true);

$stmt = $connection->prepare("INSERT INTO movie (title, assessment, description) VALUES (?, ?, ?)");
$stmt2 = $connection->prepare("SELECT id FROM director WHERE name = ?");
$stmt3 = $connection->prepare("INSERT INTO movie_director (id_movie, id_director) VALUES (?, ?)");
$stmt4 = $connection->prepare("SELECT id FROM tag WHERE name_tag = ?");
$stmt5 = $connection->prepare("INSERT INTO movie_tag (id_movie, id_tag) VALUES (?, ?)");



foreach ($movies as $movie) {
    $title = $movie['title'];
    $description = $movie['description'];
    $assessment = $movie['score'];
    $stmt->execute([$title, $assessment, $description]);

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