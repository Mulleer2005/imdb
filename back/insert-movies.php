<?php
session_start();

$titol = $_POST['titol'];
$resum = $_POST['resum'];
$portada = $_POST['portada'];
$tags = $_POST['tags'];
$directors = $_POST['directors'];
$valoracio = $_POST['valoracio'];


require 'connection.php';

$pucFer = true;
$_SESSION['errors_bag'] = [];

if (is_numeric($titol)){
    $pucFer = false;
    $_SESSION['errors_bag'][] = "El titol ha de ser un string";}

if (is_numeric($resum)){
    $pucFer = false;
    $_SESSION['errors_bag'][] = "El resum ha de ser un string";}

if (is_numeric($portada)){
    $pucFer = false;
    $_SESSION['errors_bag'][] = "La portdada ha de ser un string";}

if (is_numeric($tags)){
    $pucFer = false;
    $_SESSION['errors_bag'][] = "Els tags han de ser un string";}

if (is_numeric($directors)){
    $pucFer = false;
    $_SESSION['errors_bag'][] = "Els directors han de ser un string";}

if (!is_numeric($valoracio)){
    $pucFer = false;
    $_SESSION['errors_bag'][] = "La valoració ha de ser un número enter";}

if (empty($titol)){
    $pucFer = false;
    $_SESSION['errors_bag'][] = "El titol no pot ser buit";}

if (empty($resum)){
    $pucFer = false;
    $_SESSION['errors_bag'][] = "El resum no pot ser buit";}

if (empty($portada)){
    $pucFer = false;
    $_SESSION['errors_bag'][] = "La portada no pot ser buida";}

if (empty($valoracio)){
    $pucFer = false;
    $_SESSION['errors_bag'][] = "La valoració no pot ser buida";}

if ($valoracio < 0 || $valoracio > 10){
    $pucFer = false;
    $_SESSION['errors_bag'][] = "La valoració ha d'estar entre 1 i 10";}

if($pucFer){
$stmt = $connection->prepare("INSERT INTO movies (title, cover, assessment, description) VALUES (?,?,?,?)");
$stmt->execute([$titol, $portada, $valoracio, $resum]);

$stmt = $connection->prepare("SELECT id FROM movies WHERE title = ?");
$stmt->execute([$titol]);

$idMovie = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt2 = $connection->prepare("SELECT id FROM directors WHERE name = ?");


$directorsList = [];
foreach($directors as $director){

    $stmt2->execute([$director]);

    $directorsList[] = $stmt2->fetchAll(PDO::FETCH_ASSOC);

}

$stmt3 = $connection->prepare("INSERT INTO movie_director (movie_id, director_id) VALUES (?,?)");

foreach($directorsList as $director){
    foreach($director as $i){
        foreach($i as $reg){
            foreach($idMovie as $id){
                $stmt3->execute([$id, $reg]);
            }
        }
    }
}


$stmt2 = $connection->prepare("SELECT id FROM tags WHERE name = ?");


$tagsList = [];
foreach($tags as $tag){

    $stmt2->execute([$tag]);

    $tagsList[] = $stmt2->fetchAll(PDO::FETCH_ASSOC);

}

$stmt3 = $connection->prepare("INSERT INTO movie_tag (movie_id, tag_id) VALUES (?,?)");

foreach($tagsList as $tag){
    foreach($tag as $i){
        foreach($i as $reg){
            foreach($idMovie as $id){
                $stmt3->execute([$id, $reg]);
            }
        }
    }
}
}

header("Location: http://imdb.test/home/formulari-crear");

?>