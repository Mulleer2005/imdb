<?php

require 'back/connection.php';

$stmt = $connection->prepare("SELECT id, title FROM movies");
$stmt->execute();
$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

require __DIR__.'/../../../views/formulari-eliminar.view.php';
