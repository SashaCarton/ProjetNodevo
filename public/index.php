<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F1</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <div class="racing">
        <div class="menu">
            <img src="/images/logo.png" class="logo">
            <a href="#racing">racing</a>
            <a href="#sports">sports cars</a>
            <a href="#collections">collections</a>
            <a href="#experiences">experiences</a>
            <a href="#about">about us</a>
        </div>
        <h2>ONE TO FORGET</h2>
        <img src="/images/arrows.png" class="arrow">
    </div>
    <div class="sports">
        <div class="container">
            <div class="812">
                <h2>812 SUPERFAST</h2>
                <p>With its 830 cv, the 812 Superfast is the most powerful and fastest road-going Ferrari ever built.
                    The new 6.5-litre V12 engine delivers unprecedented performance for a naturally aspirated
                    12-cylinder engine.</p>
                <img src="/images/812.png" class="car">
            </div>
            <div class="sf90">
                <h2>SF90 STRADALE</h2>
                <p>The SF90 Stradale is the first ever plug-in hybrid with a V8 engine. The car has very high
                    performance levels: it unleashes 1,000 cv, the highest power output of any 8-cylinder in Ferrari
                    history.</p>
                <img src="/images/sf90.png" class="car">
            </div>
            <div class="f8">
                <h2>F8 TRIBUTO</h2>
                <p>The F8 Tributo is the new mid-rear-engined sports car that represents the highest expression of the
                    Prancing Horse’s classic two-seater berlinetta. It is a car with unique characteristics and, as its
                    name implies, is an homage to the most powerful V8 in Ferrari history.</p>
                <img src="/images/f8.png" class="car">
            </div>
            <div class="portofino">
                <h2>PORTOFINO</h2>
                <p>The Ferrari Portofino is the most versatile model in the range. A Grand Tourer created for those who
                    live life to the fullest, love to travel long distances and always do so with panache and style.</p>
                <img src="/images/portofino.png" class="car">
            </div>
             <div class="monza sp2">
            <h2>MONZA SP2</h2>
            <p>The Ferrari Monza SP1 and SP2 are the forerunners in a new concept, known as ‘Icona’ (Icon), that taps into
                a leitmotif of the most evocative cars in the company’s history to create a new segment of special limited
                series cars for clients and collectors.</p>
            <img src="/images/monza.png" class="car">
            </div>
            <div class="ferrari 296 gts">
            <h2>FERRARI 296 GTS</h2>
            <p>The Ferrari 296 GTS is the latest evolution of Maranello’s mid-rear-engined two-seater spider concept.
                The 296 GTS redefines the idea of a convertible sports car with its extreme performance and the unique
                emotion of open-top driving.</p>
            <img src="/images/296.png" class="car">
            </div>
        </div>
    </div>
</body>

</html>





































































<!-- 
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

    case '/f1':
        require $path .'/f1.php';
        break;

    default:
        require  $path .'/404.php';
        http_response_code(404);
        echo '404';
        break;
} -->