<?php
require 'connection.php';


header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

$missatges = [];
$isValid = true;

if (!isset($input['name']) && is_numeric($input['name'])) {
    $missatges['name'] = 'El primer camp no és una cadena valida.';
    $isValid = false;
}

if (!isset($input['birthdate'])) {
    $missatges['birthdate'] = 'El segon camp no és una cadena valida.';
    $isValid = false;
}

if($isValid){
    $stmt = $connection->prepare("INSERT INTO directors (name, birthdate) VALUES (?,?)");
    $stmt->execute([$input['name'], $input['birthdate']]);
    $missatges['verificacio'] = 'Tots el camps son vàlids.';
}

$resposta = [
    'isValid' => $isValid,
    'missatges' => $missatges
];

echo json_encode($resposta);

?>