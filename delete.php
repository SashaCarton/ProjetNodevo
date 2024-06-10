<?php 
session_start();
if($_SESSION['login'] !== 'admin' && $_SESSION['password'] !== 'admin'){
    header('Location: login.php');
    exit();
}
$json = file_get_contents('mannequins.json');
$tab = json_decode($json, true);
$id = $_GET['id'];
$mannequin = $tab[$id];

unset($tab[$id]);
$tab = json_encode($tab, JSON_PRETTY_PRINT);
file_put_contents('mannequins.json', $tab);
header('Location: listeMannequin.php');
?>