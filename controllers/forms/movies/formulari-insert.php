<?php
require 'back/connection.php';

$stmt = $connection->prepare("SELECT id, name FROM tags");
$stmt->execute();
$tags = $stmt->fetchAll(PDO::FETCH_ASSOC);


$stmt = $connection->prepare("SELECT id, name FROM directors");
$stmt->execute();
$directors = $stmt->fetchAll(PDO::FETCH_ASSOC);

require __DIR__.'/../../../views/formulari-crear.view.php';
