<?php

include_once  dirname(__DIR__) . '/views/translate/langues.php';

$langue = $_COOKIE['langue'] ?? $langue;

$json = file_get_contents( __DIR__ . '/mannequins.json');
$tab = json_decode($json, true) ?? [];

function affichage($id){
    global $tab;
    echo '<img src="'. $tab[$id]['chemin'] .'" alt="">';
    echo '<p>'. $tab[$id]['nom'] . ' ' . $tab[$id]['prenom'] .'<br>'. ' ' . $tab[$id]['age'] . ' '.'ans' .'<br>'. $tab[$id]['taille'] .'m'. '<br> ' . $tab[$id]['poids'] .'kg' .'<br>'.' ' . $tab[$id]['sexe'] .' <br>'. ' ' . $tab[$id]['ville'] .'</p>';        
}
foreach($tab as $mannequin){
    if($mannequin['sexe'] === 'femme'){
        echo '<div>';
        affichage($mannequin['id']) ;
        echo '</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        for ($i = 0; $i < 100; $i++) {
            foreach ($tab as $mannequin) {
                if ($mannequin['sexe'] === 'femme') {
                    echo '<div id="' . $mannequin['id'] . '">';
                    affichage($mannequin['id']);
                    echo '</div>';
                }
            }
        }
        ?>
</body>
</html>