<?php
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];
$taille = $_POST['taille'];
$poids = $_POST['poids'];
$sexe = $_POST['sexe'];
$ville = $_POST['ville'];
$id = "mannequin". uniqid();
session_start();

            $texteold = file_get_contents('mannequin.php');
            $texteold .= "\n";
            //On écrit un premier texte dans notre fichier  
            file_put_contents('mannequin.php', $texteold);
            
            //On ajoute notre nouveau texte à l'ancien
            $texte .= "$$id"." "."="."[". "\n"."\"nom\""." "."=>"." ".$nom ."," .  "\n"."\"prenom\""." "."=>"." ".$prenom . "," . "\n"."\"age\""." "."=>"." ".$age ."," .  "\n"."\"taille\""." "."=>"." ".$taille ."," .  "\n"."\"poids\""." "."=>"." ".$poids ."," . "\n"."\"sexe\""." "."=>"." ".$sexe . "," . "\n"."\"ville\""." "."=>"." ".$ville . "," . "\n"."\"id\""." "."=>"." ".$id ."," ."]".";".    "\n"."//".date('H+2:i:s');
            $texteold .= "\n".$texte;
            
            //On écrit tout le texte dans notre fichier
            file_put_contents('mannequin.php', $texteold);
?>

<?php


// Charger tous les mannequins
$mannequins = json_decode(file_get_contents('mannequin.json'), true);

// Trouver le mannequin à modifier
$id = "mannequin". uniqid(); // Utilisez l'ID du mannequin que vous voulez modifier
foreach ($mannequins as &$mannequin) {
    if ($mannequin['id'] === $id) {
        // Modifier les valeurs du mannequin
        $mannequin['nom'] = $_POST['nom'];
        $mannequin['prenom'] = $_POST['prenom'];
        $mannequin['age'] = $_POST['age'];
        $mannequin['taille'] = $_POST['taille'];
        $mannequin['poids'] = $_POST['poids'];
        $mannequin['sexe'] = $_POST['sexe'];
        $mannequin['ville'] = $_POST['ville'];
        break;
    }
}

// Sauvegarder les mannequins modifiés
file_put_contents('mannequin.json', json_encode($mannequins));
?>