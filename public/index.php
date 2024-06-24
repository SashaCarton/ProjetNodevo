<?php
require '../autoload.php';
use Display\Display;
use Router\Router;
use Router\Request;
use controllers\MainController;

$rootPath = dirname(__DIR__);
session_start();
$mainController = new MainController($rootPath . '/views', $_SESSION);
$router = new Router();
$request = Request::fromGlobals();
// var_dump($router->getUrl($request));
$router->add('GET', '/home', $mainController->home(...));
$router->add('GET', '/', $mainController->home(...));
$router->add('GET', '', $mainController->home(...));
$router->add('GET', '/index', $mainController->home(...));
$router->add('GET', '/admin', $mainController->admin(...));
$router->add('GET', '/affichage', $mainController->affichage(...));
$router->add('GET', '/randomMannequin', $mainController->randomMannequin(...));
$router->add('GET', '/listeMannequin', $mainController->std(...));
$router->add('GET', '/404', $mainController->error404(...));
$router->add('GET', '/add', $mainController->add(...));
$router->add('GET', '/admin', $mainController->admin(...));
$router->add('GET', '/affichage', $mainController->affichage(...));
$router->add('GET', '/contact', $mainController->getContact(...));
$router->add('GET', '/delete', $mainController->getDelete(...));
$router->add('GET', '/demandes', $mainController->demandes(...));
$router->add('GET', '/home', $mainController->home(...));
$router->add('GET', '/listeMannequin', $mainController->std(...));
$router->add('GET', '/postuler', $mainController->std(...));
$router->add('GET', '/randomMannequin', $mainController->randomMannequin(...));
$router->add('GET', '/de', $mainController->lang(...));
$router->add('GET', '/en', $mainController->lang(...));
$router->add('GET', '/es', $mainController->lang(...));
$router->add('GET', '/fr', $mainController->lang(...));
$router->add('GET', '/it', $mainController->lang(...));
$router->add('GET', '/ru', $mainController->lang(...));
$router->add('GET', '/login', $mainController->getLogin(...));
$router->add('POST', '/home', $mainController->home(...));
$router->add('POST', '/', $mainController->home(...));
$router->add('POST', '', $mainController->home(...));
$router->add('POST', '/index', $mainController->home(...));
$router->add('POST', '/admin', $mainController->admin(...));
$router->add('POST', '/affichage', $mainController->affichage(...));
$router->add('POST', '/randomMannequin', $mainController->randomMannequin(...));
$router->add('POST', '/listeMannequin', $mainController->std(...));
$router->add('POST', '/404', $mainController->error404(...));
$router->add('POST', '/add', $mainController->add(...));
$router->add('POST', '/admin', $mainController->admin(...));
$router->add('POST', '/affichage', $mainController->affichage(...));
$router->add('POST', '/contact', $mainController->postContact(...));
$router->add('POST', '/delete', $mainController->getDelete(...));
$router->add('POST', '/demandes', $mainController->demandes(...));
$router->add('POST', '/home', $mainController->home(...));
$router->add('POST', '/listeMannequin', $mainController->std(...));
$router->add('POST', '/postuler', $mainController->std(...));
$router->add('POST', '/login', $mainController->postLogin(...));
$router->add('POST', '/randomMannequin', $mainController->randomMannequin(...));
$router->add('POST', '/de', $mainController->lang(...));
$router->add('POST', '/en', $mainController->lang(...));
$router->add('POST', '/es', $mainController->lang(...));
$router->add('POST', '/fr', $mainController->lang(...));
$router->add('POST', '/it', $mainController->lang(...));
$router->add('POST', '/ru', $mainController->lang(...));


$controller = $router->resolve($request);

call_user_func($controller, $request);


//include dirname(__DIR__).$controller;
