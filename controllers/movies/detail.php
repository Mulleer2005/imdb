<?php
require 'back/connection.php';


$movieId = $_GET['movie_id'];

$stmt = $connection->prepare("SELECT title, cover, assessment, description FROM movies WHERE id = ?");
$stmt->execute([$movieId]);
$movie = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $connection->prepare("SELECT name
FROM directors
INNER JOIN movie_director
ON directors.id = movie_director.director_id
WHERE movie_id = ?;");

$stmt->execute([$movieId]);
$directors = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $connection->prepare("SELECT name
FROM tags
INNER JOIN movie_tag
ON tags.id = movie_tag.tag_id
WHERE movie_id = ?;");
$stmt->execute([$movieId]);
$tags = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'views/movies/detail.view.php';