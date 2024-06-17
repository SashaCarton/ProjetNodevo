<?php
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// require_once __DIR__ . '/router/router.php';

// use router\Router; // Corrected the case of the class name

// $router = new Router();
// $router->register('/', function () { // Removed unnecessary spaces before and after the arrow operator
//     return 'home';
// });

// $router->register('/index', function () { // Removed unnecessary spaces before and after the arrow operator
//     return 'home';
// });

// $router->resolve($url);
// echo 'router:';
// var_dump($router);















$path = (dirname(__DIR__) .'/views');
switch ($url) {
    case '/index':
        require  $path .'/home.php';
        break;

    case '/':
        require  $path .'/home.php';
        break;

    case '/home':
        require  $path .'/home.php';
        break;

    case '/login':
        require  $path .'/login.php';
        break;

    case '/admin':
        require  $path .'/admin.php';
        break;

    case '/fr':
        require  $path .'/fr.php';
        $_COOKIE['langue'] = 'fr';
        break;

    case '/en':
        require  $path .'/en.php';
        $_COOKIE['langue'] = 'en';
        break;

    case '/de':
        require  $path .'/de.php';
        $_COOKIE['langue'] = 'de';
        break;

    case '/es':
        require  $path .'/es.php';
        $_COOKIE['langue'] = 'es';
        break;

    case '/it':
        require  $path .'/it.php';
        $_COOKIE['langue'] = 'it';
        break;

    case '/ru':
        $_COOKIE['langue'] = 'ru';
        require  $path .'/ru.php';
        break;

    case '/add':
        require  $path .'/add.php';
        break;

    case '/delete':
        require  $path .'/delete.php';
        break;

    case '/modif':
        require  $path .'/modif.php';
        break;

    case '/listeMannequin':
        require  $path .'/listeMannequin.php';
        break;

    case '/contact':
        require  $path .'/contact.php';
        break;

    case '/demandes':
        require  $path .'/demandes.php';
        break;

    case '/postuler':
        require  $path .'/postuler.php';
        break;

    case '/affichage':
        require  $path .'/affichage.php';
        break;

    case '/randomMannequin':
        require  $path .'/randomMannequin.php';
        break;

    default:
        require  $path .'/404.php';
        http_response_code(404);
        echo '404';
        break;
}