<?php
session_start();

$id = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
$id = substr($id, 3);

if ($_SESSION['login'] !== 'admin' && $_SESSION['password'] !== 'admin') {
    header('Location: login');
    exit();
}

$queryString = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
parse_str($queryString, $params);
$variable = $params;
$where = $params['where'];
$id = $params['id'];
var_dump($where);
echo '<br>';
var_dump($id);

if ($where === 'demandes') {
    $json = file_get_contents(__DIR__ . '/nouveauMannequin.json');
    $tab = json_decode($json, true);
    $mannequin = $tab[$id];
    unset($tab[$id]);
    $tab = json_encode($tab, JSON_PRETTY_PRINT);
    file_put_contents(__DIR__ . '/nouveauMannequin.json', $tab);
    header('Location: demandes');
} else {
    $json = file_get_contents(__DIR__ . '/mannequins.json');
    $tab = json_decode($json, true);
    $mannequin = $tab[$id];
    $id = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    $id = substr($id, 3);
    unset($tab[$id]);
    $tab = json_encode($tab, JSON_PRETTY_PRINT);
    file_put_contents(__DIR__ . '/mannequins.json', $tab);
    header('Location: listeMannequin');
}

