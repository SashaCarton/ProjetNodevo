<?php
include (dirname(__DIR__) . "/function/function.php");

$json = file_get_contents(dirname(__DIR__) . '/views/mannequins.json');
$tab = json_decode($json, true) ?? [];

randomAffichage($tab, 2);

