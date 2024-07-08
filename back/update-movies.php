<?php
session_start();

$id = $_POST['id'];
$titol = $_POST['titol'];
$resum = $_POST['resum'];
$portada = $_POST['portada'];
if(isset($_POST['tagsIDs'])){
    $tags = $_POST['tagsIDs'];
}
if(isset($_POST['directorsIDs'])){
    $directors = $_POST['directorsIDs'];
}
$valoracio = $_POST['valoracio'];

require 'connection.php';

$pucFer = true;
$_SESSION['errors_bag'] = [];

if (is_numeric($titol)){
    $pucFer = false;
    $_SESSION['errors_bag'][] = "El titol ha de ser un string";
}

if (is_numeric($resum)){
    $pucFer = false;
    $_SESSION['errors_bag'][] = "El resum ha de ser un string";
}

if (is_numeric($portada)){
    $pucFer = false;
    $_SESSION['errors_bag'][] = "La portada ha de ser un string";
}

if (is_numeric($valoracio)){
    $pucFer = false;
    $_SESSION['errors_bag'][] = "La valoració ha de ser un string";
}

if (empty($id)){
    $pucFer = false;
    $_SESSION['errors_bag'][] = "El titol de la peli a modificar no pot estar buit";
}



if (!empty($titol) || $pucFer){    
    $stmt = $connection->prepare("UPDATE movies
    SET title = ?
    WHERE id = ?");

    $stmt->execute([$titol, $id]);
}
if(!empty($resum) || $pucFer){
    $stmt = $connection->prepare("UPDATE movies
    SET description = ?
    WHERE id = ?");

    $stmt->execute([$resum, $id]);
}
if(!empty($portada) || $pucFer){
    $stmt = $connection->prepare("UPDATE movies
    SET cover = ?
    WHERE id = ?");

    $stmt->execute([$portada, $id]);
}
if(isset($tags) || $pucFer){

    $stmt = $connection->prepare("DELETE FROM movie_tag WHERE movie_id = ?");
    foreach($tags as $tag){
        $stmt->execute([$tag]);
    }

    $stmt = $connection->prepare("INSERT INTO movie_tag (movie_id, tag_id) VALUES (?,?)");
    foreach($tags as $tag){
        $stmt->execute([$id, $tag]);
    }

}
if(isset($directors) || $pucFer){

    $stmt = $connection->prepare("DELETE FROM movie_director WHERE movie_id = ?");
    foreach($directors as $director){
        $stmt->execute([$director]);
    }

    $stmt = $connection->prepare("INSERT INTO movie_director (movie_id, director_id) VALUES (?,?)");
    foreach($directors as $director){
        $stmt->execute([$id, $director]);
    }
    

}
if(!empty($valoracio) || $pucFer){
    $stmt = $connection->prepare("UPDATE movies
    SET assessment = ?
    WHERE id = ?");

    $stmt->execute([$valoracio, $id]);
}

header("Location: http://imdb.test/home/formulari-modificar");

?>