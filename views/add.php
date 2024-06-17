<?php

session_start();

if ($_SESSION['login'] !== 'admin' || $_SESSION['password'] !== 'admin') {
    header('Location: login');
    exit();
}

$where = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

if ($where === 'demandes') {
    $oldJson = file_get_contents('nouveauMannequin.json');
    $tab = json_decode($oldJson, true);
    $id = $_GET['id'];
    $mannequin = $tab[$id];
    unset($tab[$id]);
    $newJson = json_encode($tab, JSON_PRETTY_PRINT);
    file_put_contents('nouveauMannequin.json', $newJson . PHP_EOL);
    $oldJson = file_get_contents('mannequins.json');
    $tab = json_decode($oldJson, true);
    $tab[$id] = $mannequin;
    $newJson = json_encode($tab, JSON_PRETTY_PRINT);
    file_put_contents('mannequins.json', $newJson . PHP_EOL);
    //header('Location: listeMannequin');
    exit();
} else {
    $basePath = dirname(__DIR__);
    $profilPic = '/profilePic';
    $dossier = $basePath . $profilPic;
    $fichier = basename($_FILES['image']['name']);
    $nouveauNomFichier = '/' . uniqid() . '.' . pathinfo($fichier, PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $nouveauNomFichier);
    $chemin = $profilPic . $nouveauNomFichier;
    $nom = strtolower($_POST['nom']);
    $prenom = strtolower($_POST['prenom']);
    $age = $_POST['age'];
    $taille = $_POST['taille'];
    $poids = $_POST['poids'];
    $sexe = $_POST['sexe'];
    $ville = strtolower($_POST['ville']);
    $oldJson = file_get_contents(__DIR__.'/nouveauMannequin.json');
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
    file_put_contents(__DIR__.'nouveauMannequin.json', $newJson . PHP_EOL);

    $PathJson = $basePath . '/mannequins.json';
    $mannequinsJson = file_get_contents($PathJson);
    $mannequins = json_decode($mannequinsJson, true);
    $mannequins[$id] = $mannequin;
    $newMannequinsJson = json_encode($mannequins, JSON_PRETTY_PRINT);
    file_put_contents($PathJson, $newMannequinsJson . PHP_EOL);

   // header('Location: listeMannequin');
    exit();
}



//header('Location: listeMannequin');
//exit();
