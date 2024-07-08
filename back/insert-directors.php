<?php
session_start();

$director = $_POST['director'];
$dataNaixe = $_POST['birthday'];

require 'connection.php';

$pucFer = true;
$_SESSION['errors_bag'] = [];


if (is_numeric($director)) {
    $pucFer = false;
    $_SESSION['errors_bag'][] = "El director ha de ser un string";
}

if (empty($director)) {
    $pucFer = false;
    $_SESSION['errors_bag'][] = "El director no pot ser buit";
}


if ($pucFer) {
    $stmt = $connection->prepare("INSERT INTO directors (name, birthdate) VALUES (?,?)");
    $stmt->execute([$director, $dataNaixe]);
}

header("Location: http://imdb.test/home/formulari-crear-directors");

?>