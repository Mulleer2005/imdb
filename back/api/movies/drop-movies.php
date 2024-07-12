<?php
require __DIR__  . './../../connection.php';
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

$message = '';
$isValid = true;

if (isset($input['titol']) && is_array($input['titol'])) {
    foreach ($input['titol'] as $value) {
        if (!is_string($value)) {
            $isValid = false;
            break;
        }
    }
} else {
    $isValid = false;
    $message = 'El camp no es un array de cadenes vàlid.';
}

if($isValid){
$stmt = $connection->prepare("DELETE FROM movie_director WHERE movie_id = ?");
foreach($input['titol'] as $value){
    $stmt->execute([$value]);
}
$stmt = $connection->prepare("DELETE FROM movie_tag WHERE movie_id = ?");
foreach($input['titol'] as $value){
    $stmt->execute([$value]);
}
$stmt = $connection->prepare("DELETE FROM movies WHERE id = ?");
foreach($input['titol'] as $value){
    $stmt->execute([$value]);
}
$message = 'Pelicula esborrada correctament.';
}

$resposta = [
    'isValid' => $isValid,
    'message' => $message
];

echo json_encode($resposta);

?>