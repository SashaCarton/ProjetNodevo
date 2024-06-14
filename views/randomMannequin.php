<?php
$json = file_get_contents(__DIR__ . '/mannequins.json');
$tab = json_decode($json, true) ?? [];
$taille = count($tab);
$elementsParPage = 3;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$pageNumber = 5;




function affichage($id)
{
    global $tab;
    echo '<img src="' . $tab[$id]['chemin'] . '" alt="">';
    echo '<div class="info">';
    echo '<p>' . $tab[$id]['nom'] . ' ' . $tab[$id]['prenom'] . '<br>' . ' ' . $tab[$id]['age'] . ' ' . 'ans' . '<br>' . $tab[$id]['taille'] . 'm' . '<br> ' . $tab[$id]['poids'] . 'kg' . '<br>' . ' ' . $tab[$id]['sexe'] . ' <br>' . ' ' . $tab[$id]['ville'] . '</p>';
    echo '</div>';
}

function randomMannequin($tab)
{
    $randomMannequin = array_rand($tab);
    return $randomMannequin;
}
function randomAffichage($tab, $nombre)
{
    $randomMannequin = array_rand($tab, $nombre);
    for ($i = 0; $i < $nombre; $i++) {
        affichage($randomMannequin[$i]);
    }
}

function pagination($tab, $elementsParPage)
{
    global $taille;
    $nombreDePages = ceil($taille / $elementsParPage);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $page = intval($page);
    $premierMannequin = ($page - 1) * $elementsParPage;
    $mannequins = array_slice($tab, $premierMannequin, $elementsParPage);
    return $mannequins;
}

$mannequins = pagination($tab, $elementsParPage);

// partie pagination

$nombreDePages = ceil($taille / $elementsParPage);
$pageNumber = isset($_GET['page']) ? $_GET['page'] : 1;
$premierMannequin = ($pageNumber - 1) * $elementsParPage;
$mannequins = array_slice($tab, $premierMannequin, $elementsParPage);
array_values($mannequins);

randomAffichage($tab, 2); 

