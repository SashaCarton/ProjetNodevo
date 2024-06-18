<?php
session_start();
include_once __DIR__ . '/translate/langues.php';


$langue = $_COOKIE['langue'] ?? $langue;

$json = file_get_contents(dirname(__DIR__) . '/views/mannequins.json');
$tab = json_decode($json, true) ?? [];
$taille = count($tab);
$elementsParPage = 3;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$pageNumber = 5;
$path = (dirname(__DIR__));



function affichage($id)
{
    global $tab;
    echo '<img src="' . $tab[$id]['chemin'] . '" alt="">';
    echo '<div class="info">';
    echo '<p>' . $tab[$id]['nom'] . ' ' . $tab[$id]['prenom'] . '<br>' . ' ' . $tab[$id]['age'] . ' ' . 'ans' . '<br>' . $tab[$id]['taille'] . 'm' . '<br> ' . $tab[$id]['poids'] . 'kg' . '<br>' . ' ' . $tab[$id]['sexe'] . ' <br>' . ' ' . $tab[$id]['ville'] . '</p>';
    echo '</div>';
}

function randomMannequin($tab)
{
    $randomMannequin = array_rand($tab);
    return $randomMannequin;
}
function randomAffichage($tab, $nombre)
{
    $randomMannequin = array_rand($tab, $nombre);
    for ($i = 0; $i < $nombre; $i++) {
        affichage($randomMannequin[$i]);
    }
}

function pagination($tab, $elementsParPage)
{
    global $taille;
    $nombreDePages = ceil($taille / $elementsParPage);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $page = intval($page);
    $premierMannequin = ($page - 1) * $elementsParPage;
    $mannequins = array_slice($tab, $premierMannequin, $elementsParPage);
    return $mannequins;
}

$mannequins = pagination($tab, $elementsParPage);

// partie pagination

$nombreDePages = ceil($taille / $elementsParPage);
$pageNumber = isset($_GET['page']) ? $_GET['page'] : 1;
$premierMannequin = ($pageNumber - 1) * $elementsParPage;
$mannequins = array_slice($tab, $premierMannequin, $elementsParPage);
array_values($mannequins);
$num = 2;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/home.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
    <title>Kalos Kagathos</title>
</head>

<body>
    <div class="slidebar">
        <a href="#home"><?php echo $lang[$langue]['home'] ?></a>
        <a href="#women"><?php echo $lang[$langue]['women'] ?></a>
        <a href="#men"><?php echo $lang[$langue]['men'] ?></a>
        <a href="#history"><?php echo $lang[$langue]['history'] ?></a>
        <a href="#contact"><?php echo $lang[$langue]['contact'] ?></a>
    </div>
    <div class="option">
        <div class="langue">
            <a href="fr">FR</a>
            <a href="en">EN</a>
            <a href="de">DE</a>
            <a href="es">ES</a>
            <a href="it">IT</a>
            <a href="ru">RU</a>
        </div>
        <div class="admin">
            <?php
            if (isset($_SESSION['login']) && $_SESSION['login'] === 'admin' && isset($_SESSION['password']) && $_SESSION['password'] === 'admin') {
                echo '<a href="admin">' . $lang[$langue]['admin'] . '</a>';
            } else {
                echo '<a href="login">' . $lang[$langue]['login'] . '</a>';
            }
            ?>
        </div>
    </div>
    <div class="container">
        <div id="home" class="home">
            <div class="title">
                <h1>Kalos Kagathos</h1>
                <div class="underline"></div>
                <h2>MODELS AGENCY</h2>
                <div class="video">
            <video src="/images/mannequin.mp4" autoplay loop muted  type="video/mp4"></video>
        </div>
            </div>
            <div class="PicHome">
              
            </div>
        </div>
       
        <div class="women">
            <button type="Submit" class="arrowRight"></button>
            <button class="arrowLeft"></button>
            <h2 id="women"><?php echo $lang[$langue]['women'] ?></h2>
            <div class="trait"></div>
            <div class="hidden">
                <div class="navPic">
                    <?php
                    foreach ($tab as $mannequin) {
                        if ($mannequin['sexe'] === 'femme') {
                            echo '<div id="' . $mannequin['id'] . '">';
                            affichage($mannequin['id']);
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="trait"></div>
        </div>
        <div id="men" class="men">
            <button type="Submit" class="arrowRight"></button>
            <button class="arrowLeft"></button>
            <h2><?php echo $lang[$langue]['men'] ?></h2>
            <div class="trait"></div>
            <div class="hidden">
                <div class="navPic">
                    <?php
                    foreach ($tab as $mannequin) {
                        if ($mannequin['sexe'] === 'homme') {
                            echo '<div id="' . $mannequin['id'] . '">';
                            affichage($mannequin['id']);
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="trait"></div>
        </div>
        <div id="history" class="history">
            <h2><?php echo $lang[$langue]['history'] ?></h2>
            <p><?php echo $lang[$langue]['text-history1'] ?></p>
            <br>
            <div class="trait"></div>
            <p><?php echo $lang[$langue]['text-history2'] ?></p>
            <div class="form">
                <div class="contact">
                    <h2 id="contact"><?php echo $lang[$langue]['contact'] ?></h2>
                    <form action="contact" method="POST">
                        <label for="nom"><?php echo $lang[$langue]['last name'] ?></label>
                        <input type="text" name="nom" id="nom" required>
                        <label for="prenom"><?php echo $lang[$langue]['first name'] ?></label>
                        <input type="text" name="prenom" id="prenom" required>
                        <label for="email"><?php echo $lang[$langue]['mail'] ?></label>
                        <input type="email" name="email" id="email" required>
                        <label for="message"><?php echo $lang[$langue]['message'] ?></label>
                        <textarea name="message" id="message" cols="30" rows="10" required></textarea>
                        <button type="submit"><?php echo $lang[$langue]['submit'] ?></button>
                    </form>
                </div>
                <div class="devenirmannequin">
                    <h2><?php echo $lang[$langue]['apply'] ?></h2>
                    <form action="postuler" method="POST" enctype="multipart/form-data">
                        <label for="nom"><?php echo $lang[$langue]['last name'] ?></label>
                        <input type="text" name="nom" id="nom" required>
                        <label for="prenom"><?php echo $lang[$langue]['first name'] ?></label>
                        <input type="text" name="prenom" id="prenom" required>
                        <label for="age"><?php echo $lang[$langue]['age'] ?></label>
                        <input type="number" name="age" id="age" required>
                        <label for="taille"><?php echo $lang[$langue]['height'] ?></label>
                        <input type="number" step="0.01" min="0" max="4" name="taille" id="taille" required>
                        <label for="poids"><?php echo $lang[$langue]['weight'] ?></label>
                        <input type="number" step="0.01" name="poids" id="poids" required>
                        <label for="ville"><?php echo $lang[$langue]['city'] ?></label>
                        <input type="text" name="ville" id="ville" required>
                        <label for="sexe"><?php echo $lang[$langue]['gender'] ?></label>
                        <select name="sexe" id="sexe" required>
                            <option value="homme"><?php echo $lang[$langue]['men'] ?></option>
                            <option value="femme"><?php echo $lang[$langue]['women'] ?></option>
                            <option value="autre"><?php echo $lang[$langue]['other'] ?></option>
                        </select>
                        <label for="image"><?php echo $lang[$langue]['picture'] ?></label>
                        <input type="file" name="image" id="image" required>
                        <button type="submit"><?php echo $lang[$langue]['submit'] ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="trait"></div>
        <span>© 2021 Kalos Kagathos. All rights reserved.</span>
        <br>
        <span><?php echo $lang[$langue]['adresse'] ?>:</span> 11 rue de la Paix, 75002 Paris
        <br>
        <span><?php echo $lang[$langue]['phone'] ?>:</span> 01 42 61 52 52
        <br>
        <div class="<?php echo $lang[$langue]['social'] ?>">
            <a href=""><img src="facebook.png" alt=""></a>
            <a href=""><img src="instagram.png" alt=""></a>
            <a href=""><img src="twitter.png" alt=""></a>
        </div>
    </footer>
    <script>

        once(ChangerImagesHome());
        once(demarrerSlideshow());


        // Function to execute a function only once
        function once(fn, context) {
            var result;
            return function () {
                if (fn) {
                    result = fn.apply(context || this, arguments);
                    fn = null;
                }
                return result;
            };
        }

        // Add event listeners for mouseover and mouseout on each div with class 'navPic'
        document.querySelectorAll('.navPic div').forEach(div => {
            // Show the 'info' element on mouseover
            div.addEventListener('mouseover', function () {
            var infoElement = this.querySelector('.info');
            if (infoElement) {
                infoElement.style.transition = 'opacity 0.5s ease-in-out, transform 0.5s ease-in-out';
                infoElement.classList.add('visible');
            }
            });

            // Hide the 'info' element on mouseout
            div.addEventListener('mouseout', function () {
            var infoElement = this.querySelector('.info');
            if (infoElement) {
                infoElement.style.transition = 'opacity 0.5s ease-in-out, transform 0.5s ease-in-out';
                infoElement.classList.remove('visible');
                document.querySelector('.info').style.transition = 'opacity 0.5s ease-in-out, transform 0.5s ease-in-out';
            }
            });
        });

        // Variables for slide
        let page = 0;
        let $temp = 5000;
        var pageMax = 4;
        var test = 0;

        // Event listener for clicking the right arrow button in the 'women' section
        document.querySelector('.arrowRight').addEventListener('click', function () {
            page++;
            if (page > pageMax) {
                page = 0;
            }
            document.querySelector('.navPic').style.transition = 'transform 0.5s ease-in-out';
            document.querySelector('.navPic').style.transform = 'translateX(' + (-page * 19.5) + 'vw)';
    
        });

        // Event listener for clicking the left arrow button in the 'women' section
        document.querySelector('.arrowLeft').addEventListener('click', function () {
            page--;
            if (page < 0) {
                page = pageMax;
            }
            document.querySelector('.navPic').style.transition = 'transform 0.5s ease-in-out';
            document.querySelector('.navPic').style.transform = 'translateX(' + (-page * 19.5) + 'vw)';
        });

        // Event listener for clicking the right arrow button in the 'men' section
        document.querySelector('.men .arrowRight').addEventListener('click', function () {
            page++;
            if (page > pageMax) {
                page = 0;
            }
            document.querySelector('.men .navPic').style.transition = 'transform 0.5s ease-in-out';
            document.querySelector('.men .navPic').style.transform = 'translateX(' + (-page * 19.5) + 'vw)';
        });

        // Event listener for clicking the left arrow button in the 'men' section
        document.querySelector('.men .arrowLeft').addEventListener('click', function () {
            page--;
            if (page < 0) {
                page = pageMax;
            }
            document.querySelector('.men .navPic').style.transition = 'transform 0.5s ease-in-out';
            document.querySelector('.men .navPic').style.transform = 'translateX(' + (-page * 30) + 'vw)';
        });

        // Add mouseover and mouseout event listeners for each div with class 'navPic'
        document.querySelectorAll('.navPic div').forEach(div => {
            div.addEventListener('mouseover', function () {
                var id = this.id;
                document.querySelector('#' + id).style.transition = 'transform 0.5s ease-in-out';
                document.querySelector('#' + id).addEventListener('mouseout', function () {
                    document.querySelector('#' + id).style.transform = 'scale(1)';
                    // document.querySelector('#' + id).style.width = '33%';
                    document.querySelector('#' + id).style.filter = 'blur(0px)';
                    document.querySelector('.navPic').style.filter = 'grayscale(0%)';
                    arreterSlideshow();
                    demarrerSlideshow();
                    document.querySelectorAll('.navPic div').forEach(element => {
                        if (element.id !== id) {
                            element.style.filter = 'grayscale(0%)';
                            element.style.transition = 'filter 0.5s ease-in-out';
                        }
                    });
                    onOff = 1;
                });
                temp = 10000;
                document.querySelector('#' + id).style.transform = 'scale(1.1)';
                document.querySelector('.info.visible').style.transition = 'opacity 0.5s ease-in-out, transform 0.5s ease-in-out';
                // document.querySelector('#' + id).style.width = '33%';
                document.querySelector('#' + id).style.backdropFilter = 'blur(10px)';
                document.querySelector('#' + id).style.transition = 'transform 0.5s ease-in-out';
                onOff = 0;
                document.querySelectorAll('.navPic div').forEach(element => {
                    if (element.id !== id) {
                        element.style.filter = 'opacity(0)';
                        element.style.filter = 'grayscale(100%)';
                        element.style.transition = 'filter 0.5s ease-in-out';
                        // element.style.width = '8vw';
                    }
                    
                    arreterSlideshow();
                });
            });
        });

        var time;

        // Function to start the slideshow
        function demarrerSlideshow() {
            time = setInterval(function () {
                page++;
                if (page > pageMax) {
                    page = 0;
                }
                document.querySelector('.navPic').style.transition = 'transform 0.5s ease-in-out';
                document.querySelector('.navPic').style.transform = 'translateX(' + (-page * 19.5) + 'vw)';
                document.querySelector('.men .navPic').style.transition = 'transform 0.5s ease-in-out';
                document.querySelector('.men .navPic').style.transform = 'translateX(' + (-page * 19.5) + 'vw)';
            }, 5000);
            test = + 1;
            return test;
        }
        function ChangerImagesHome() {
            let picHome = document.querySelectorAll('.PicHome');
            picHome.forEach(element => {
            fetch('randomMannequin')
                .then(response => response.text())
                .then(html => {
                element.innerHTML = html;
                element.querySelectorAll('img').forEach(img => {
                    img.classList.add('fade-in');
                });
                })
                .catch(error => console.error('Erreur lors de la récupération du HTML:', error)); // Gère les erreurs éventuelles
            });
        }


        setInterval(ChangerImagesHome, 10000);





        // Function to stop the slideshow
        function arreterSlideshow() {
            clearInterval(time);
        }

        // Start the slideshow only once
        


        //random display home

        // document.querySelector('.right img');
        // document.querySelector('.home img');
    </script>
    </html>