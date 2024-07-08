<?php
session_start();

$tag = $_POST['tag'];

require 'connection.php';

$pucFer = true;
$_SESSION['errors_bag'] = [];

if (is_numeric($tag)) {
    $pucFer = false;
    $_SESSION['errors_bag'][] = "El tag ha de ser un string";
}

if (empty($director)) {
    $pucFer = false;
    $_SESSION['errors_bag'][] = "El tag no pot ser buit";
}

if($pucFer){
   
    $stmt = $connection->prepare("INSERT INTO tags (name) VALUES (?)");
    $stmt->execute([$tag]);
}

header("Location: http://imdb.test/home/formulari-crear-tags");

?>