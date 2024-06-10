<?php

session_start();

if($_SESSION['login'] !== 'admin' && $_SESSION['password'] !== 'admin'){
    header('Location: login.php');
    exit();
}

$dossier = 'profilePic/';
$fichier = basename($_FILES['image']['name']);
$nouveauNomFichier = uniqid() . '.' . pathinfo($fichier, PATHINFO_EXTENSION);
move_uploaded_file($_FILES['image']['tmp_name'], $dossier.$nouveauNomFichier);
$chemin = $dossier . $nouveauNomFichier;

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];
$taille = $_POST['taille'];
$poids = $_POST['poids'];
$sexe = $_POST['sexe'];
$ville = $_POST['ville'];
$image = $_POST['image'];

$nom = strtolower($nom);
$prenom = strtolower($prenom);
$ville = strtolower($ville);




$oldJson = file_get_contents('mannequins.json');
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
    'ville' => $ville,
    'chemin' => $chemin 
];

$tab[$id] = $mannequin;

$newJson = json_encode($tab, JSON_PRETTY_PRINT);

file_put_contents('mannequins.json', $newJson . PHP_EOL);

var_dump($newJson);
header('Location: listeMannequin.php');
?>
