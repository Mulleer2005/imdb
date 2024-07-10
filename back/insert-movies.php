<?php
require 'connection.php';
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

$missatges = [];
$isValid = true;

if (!isset($input['titol']) && is_numeric($input['titol'])) {
    $missatges['titol'] = 'El nou titol no és una cadena vàlida.';
    $isValid = false;
}

if (!isset($input['resum']) && is_numeric($input['resum'])) {
    $missatges['resum'] = 'El resum no és una cadena vàlida.';
    $isValid = false;
}

if (!isset($input['portada']) && is_numeric($input['portada'])) {
    $missatges['portada'] = 'La portada no és una cadena vàlida.';
    $isValid = false;
}

if (!isset($input['tags']) && !is_array($input['tags'])) {
    $missatges['tags'] = 'El selector de tags no és una cadena vàlida.';
    $isValid = false;
}

if (!isset($input['director']) && !is_array($input['director'])) {
    $missatges['director'] = 'El selector de directors no és una cadena vàlida.';
    $isValid = false;
}

if (!isset($input['valoracio']) && !is_numeric($input['valoracio'])) {
    $missatges['valoracio'] = 'La valoracio no és vàlida.';
    $isValid = false;
}

if($isValid){
    $stmt = $connection->prepare("INSERT INTO movies (title, cover, assessment, description) VALUES (?,?,?,?)");
    $stmt->execute([$input['titol'], $input['portada'], $input['valoracio'], $input['resum']]);
    
    $stmt = $connection->prepare("SELECT id FROM movies WHERE title = ?");
    $stmt->execute([$input['titol']]);
    
    $idMovie = $stmt->fetch(PDO::FETCH_ASSOC);        
    
    $stmt = $connection->prepare("INSERT INTO movie_director (movie_id, director_id) VALUES (?,?)");
    
    foreach($input['director'] as $directors){
            foreach($idMovie as $id){
            $stmt->execute([$id, $directors]);
        }
    }
    
    $stmt = $connection->prepare("INSERT INTO movie_tag (movie_id, tag_id) VALUES (?,?)");
    
    foreach($input['tags'] as $tags){
        foreach($idMovie as $id){
            $stmt->execute([$id, $tags]);
        }
    }
    $missatges['verificacio'] = 'Tots els camps son vàlids.';
}
$resposta = [
    'isValid' => $isValid,
    'missatges' => $missatges
];

echo json_encode($resposta);
?>