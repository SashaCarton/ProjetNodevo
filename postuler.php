<?php
print_r($_SERVER);

die();
session_start();
if($_SESSION['login'] !== 'admin' && $_SESSION['password'] !== 'admin'){
    header('Location: login.php');
    exit();
}


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

$dossier = 'newProfilePic/';
$fichier = basename($_FILES['image']['name']);
$nouveauNomFichier = uniqid() . '.' . pathinfo($fichier, PATHINFO_EXTENSION);
move_uploaded_file($_FILES['image']['tmp_name'], $dossier.$nouveauNomFichier);
$chemin = $dossier . $nouveauNomFichier;

$oldJson = file_get_contents('nouveauMannequin.json');
$tab = json_decode($oldJson, true);

header('Location: index.php#contact');
