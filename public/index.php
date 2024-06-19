<?php
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// $path = (dirname(__DIR__) .'/views');
$path = (dirname(__DIR__)) . "/";

include $path .'/controllers/Controller.php';
$controller = new controllers\Controller($path);



switch ($url) {
    case '/index':
    case '/':
    case '/home':
        echo $controller->render('home');
        break;

    case '/login':
        echo $controller->render('login');
        break;

    case '/admin':
        echo $controller->render('admin');
        break;

    case '/fr':
        echo $controller->render('fr');
        $_COOKIE['langue'] = 'fr';
        break;

    case '/en':
        echo $controller->render('en');
        $_COOKIE['langue'] = 'en';
        break;

    case '/de':
        echo $controller->render('de');
        $_COOKIE['langue'] = 'de';
        break;

    case '/es':
        echo $controller->render('es');
        $_COOKIE['langue'] = 'es';
        break;

    case '/it':
        echo $controller->render('it');
        $_COOKIE['langue'] = 'it';
        break;

    case '/ru':
        echo $controller->render('ru');
        $_COOKIE['langue'] = 'ru';
        break;

    case '/add':
        echo $controller->render('add');
        break;

    case '/delete':
        echo $controller->render('delete');
        break;

    case '/modif':
        echo $controller->render('modif');
        break;

    case '/listeMannequin':
        echo $controller->render('listeMannequin');
        break;

    case '/contact':
        echo $controller->render('contact');
        break;

    case '/demandes':
        echo $controller->render('demandes');
        break;

    case '/postuler':
        echo $controller->render('postuler');
        break;

    case '/affichage':
        echo $controller->render('affichage');
        break;

    case '/randomMannequin':
        echo $controller->render('randomMannequin');
        break;

    case '/f1':
        echo $controller->render('f1');
        break;

    default:
        require  $path .'/404.php';
        http_response_code(404);
        echo '404';
        break;
}













