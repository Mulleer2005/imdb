<?php
require __DIR__  . './../../connection.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

$missatges = [];
$isValid = true;


if (!isset($input['titolAntic'])) {
    $missatges['titolAntic'] = 'El titol de la pelicula a modificar no és una cadena vàlida.';
    $isValid = false;
}

if(isset($input['titol'])){

if (is_numeric($input['titol'])) {
    $missatges['titol'] = 'El nou titol no és una cadena vàlida.';
    $isValid = false;
}
}

if(isset($input['resum'])){

if (is_numeric($input['resum'])) {
    $missatges['resum'] = 'El resum no és una cadena vàlida.';
    $isValid = false;
}
}
if(isset($input['portada'])){

if (is_numeric($input['portada'])) {
    $missatges['portada'] = 'La portada no és una cadena vàlida.';
    $isValid = false;
}
}
if(isset($input['tags'])){

if (!is_array($input['tags'])) {
    $missatges['tags'] = 'El selector de tags no és una cadena vàlida.';
    $isValid = false;
}
}
if(isset($input['director'])){

if (!is_array($input['director'])) {
    $missatges['director'] = 'El selector de directors no és una cadena vàlida.';
    $isValid = false;
}
}


if($isValid){
    if(isset($input['titol'])){
    $stmt = $connection->prepare("UPDATE movies
    SET title = ?
    WHERE id = ?");

    $stmt->execute([$input['titol'], $input['titolAntic']]);
    }

    if(isset($input['resum'])){

    $stmt = $connection->prepare("UPDATE movies
    SET description = ?
    WHERE id = ?");

    $stmt->execute([$input['resum'], $input['titolAntic']]);

    }
    if(isset($input['portada'])){

    $stmt = $connection->prepare("UPDATE movies
    SET cover = ?
    WHERE id = ?");

    $stmt->execute([$input['portada'], $input['titolAntic']]);
    }

    if(isset($input['tags'])){

    $stmt = $connection->prepare("DELETE FROM movie_tag WHERE movie_id = ?");
    $stmt->execute([$input['titolAntic']]);

    $stmt = $connection->prepare("INSERT INTO movie_tag (movie_id, tag_id) VALUES (?,?)");
    foreach($input['tags'] as $tag){
        $stmt->execute([$input['titol'], $tag]);
    }
}

    if(isset($input['director'])){

    $stmt = $connection->prepare("DELETE FROM movie_director WHERE movie_id = ?");
    $stmt->execute([$input['titolAntic']]);

    $stmt = $connection->prepare("INSERT INTO movie_director (movie_id, director_id) VALUES (?,?)");
    foreach($input['director'] as $director){
        $stmt->execute([$input['titol'], $director]);
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