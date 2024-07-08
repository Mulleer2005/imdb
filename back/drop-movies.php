<?php
session_start();

$ids = $_POST['id'];


$_SESSION["TitleArrayException"] = "El titol ha de ser un array";

$_SESSION["TitleEmptyException"] = "El titol no pot estar buit";


if (!is_array($ids)){
    echo $_SESSION["TitleStringException"];
}elseif (empty($ids)){
    echo $_SESSION["TitleEmptyException"];
}

if (is_numeric($ids)) {
    $pucFer = false;
    $_SESSION['errors_bag'][] = "El titol ha de ser un array";
}

if (empty($ids)) {
    $pucFer = false;
    $_SESSION['errors_bag'][] = "El titol no pot estar buit";
}


require 'connection.php';

$pucFer = true;
$_SESSION['errors_bag'] = [];

if($pucFer){

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
}

header("Location: http://imdb.test/home/formulari-eliminar");

?>