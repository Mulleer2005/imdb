<?php
require 'connection.php';

$stmt = $connection->prepare("DELETE FROM movie_director WHERE movie_id = ?");
foreach($ids as $id){
    $stmt->execute([$id]);
}
$stmt = $connection->prepare("DELETE FROM movie_tag WHERE movie_id = ?");
foreach($ids as $id){
    $stmt->execute([$id]);
}
$stmt = $connection->prepare("DELETE FROM movies WHERE id = ?");
foreach($ids as $id){
    $stmt->execute([$id]);
}

?>