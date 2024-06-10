<?php

session_start();

$dossier = '../views/newProfilePic/';$fichier = basename($_FILES['image']['name']);
$nouveauNomFichier = uniqid() . '.' . pathinfo($fichier, PATHINFO_EXTENSION);
move_uploaded_file($_FILES['image']['tmp_name'], $dossier.$nouveauNomFichier);
$chemin = $dossier . $nouveauNomFichier;

$nom = strtolower($_POST['nom']);
$prenom = strtolower($_POST['prenom']);
$age = $_POST['age'];
$taille = $_POST['taille'];
$poids = $_POST['poids'];
$sexe = $_POST['sexe'];
$ville = strtolower($_POST['ville']);

$oldJson = file_get_contents('nouveauMannequin.json');
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

file_put_contents('nouveauMannequin.json', $newJson);

header('Location: index.php#contact');

