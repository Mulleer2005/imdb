<?php
require __DIR__  . './../../connection.php';
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

$message = '';

$isValid = true;

if (isset($input['tag'])) {
    if (is_numeric($input['tag'])) {
        $message = 'El camp no és un string valid.';
        $isValid = false;
    }
} else {
    $message = 'El camp no sha enviat.';
}

if($isValid){
    $stmt = $connection->prepare("INSERT INTO tags (name) VALUES (?)");
    $stmt->execute([$input['tag']]);
    $message = 'El camp és vàlid';
}

$response = [
    'isValid' => $isValid,
    'message' => $message
];

echo json_encode($response);

?>