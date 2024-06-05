<?php

session_start();

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];
$taille = $_POST['taille'];
$poids = $_POST['poids'];
$sexe = $_POST['sexe'];
$ville = $_POST['ville'];

$nom = strtolower($nom);
$prenom = strtolower($prenom);
$ville = strtolower($ville);



$oldJson = file_get_contents('/var/www/html/ProjetNodevo/mannequins.json');
$tab = json_decode($oldJson, true);

$id = "mannequin" . uniqid();
$mannequin = [
    'id' => $id,
    'nom' => $nom,
    'prenom' => $prenom,
    'age' => $age,
    'taille' => $taille,
    'poids' => $poids,
    'sexe' => $sexe,
    'ville' => $ville
];

$tab[$id] = $mannequin;

$newJson = json_encode($tab, JSON_PRETTY_PRINT);

file_put_contents('/var/www/html/ProjetNodevo/mannequins.json', $newJson . PHP_EOL);

var_dump($newJson);
?>
