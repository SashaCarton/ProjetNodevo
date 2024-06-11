<?php
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    switch ($url) {
        case '/index':
            require __DIR__ . '/views/home.php';
            break;

        case '/':
            require __DIR__ . '/views/home.php';
            break;
           
        case '/home':
            echo 'home';
            require_once __DIR__ . '/views/home.php';
            break;
            
        case '/login':
            require_once __DIR__ . '/views/login.php';
            break;
            
        case '/admin':
            require __DIR__ . '/views/admin.php';
            break;
            
        case '/fr':
            require __DIR__ . '/views/fr.php';
            $_COOKIE['langue'] = 'fr';
            break;
            
        case '/en':
            require __DIR__ . '/views/en.php';
            $_COOKIE['langue'] = 'en';
            break;

        case '/de':
            require __DIR__ . '/views/de.php';
            $_COOKIE['langue'] = 'de';
            break;

        case '/es':
            require __DIR__ . '/views/es.php';
            $_COOKIE['langue'] = 'es';
            break;

        case '/it':
            require __DIR__ . '/views/it.php';
            $_COOKIE['langue'] = 'it';
            break;

        case '/ru':
            $_COOKIE['langue'] = 'ru';
            require __DIR__ . '/views/ru.php';
            break;

            case '/add':
            require __DIR__ . '/views/add.php';
            break;

            case '/delete':
            require __DIR__ . '/views/delete.php';
            break;

            case '/listeMannequin':
            require __DIR__ . '/views/listeMannequin.php';
            break;

            case '/contact':
            require __DIR__ . '/views/contact.php';
            break;

            case '/demandes':
            require __DIR__ . '/views/demandes.php';
            break;

            
        default:
            require __DIR__ . '/views/404.php';
            http_response_code(404);
            echo '404';
            break;
    }
?>