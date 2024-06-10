<?php 
session_start();

if ($_SESSION['login'] !== 'admin' && $_SESSION['password'] !== 'admin') {
    header('Location: login');
    exit();
}
$id = $_GET['id'];
$where = $_GET['where'];


if ($where ==='demandes'){
    $json = file_get_contents('nouveauMannequin.json');
    $tab = json_decode($json, true);
    $id = $_GET['id'];
    $mannequin = $tab[$id];
    unset($tab[$id]);
    $tab = json_encode($tab, JSON_PRETTY_PRINT);
    file_put_contents('nouveauMannequin.json', $tab);
    header('Location: demandes');
} else {
    $json = file_get_contents('mannequins.json');
    $tab = json_decode($json, true);
    $id = $_GET['id'];
    $mannequin = $tab[$id];
    unset($tab[$id]);
    $tab = json_encode($tab, JSON_PRETTY_PRINT);
    file_put_contents('mannequins.json', $tab);
    header('Location: listeMannequin');
}
?>
