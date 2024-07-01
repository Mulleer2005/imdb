<?php
$server = "127.0.0.1";
$user = "root";
$pass = "";
$db = "imdb";
$dsn = "mysql:host=$server;dbname=$db;charset=utf8";

$connection = new PDO($dsn, $user, $pass);