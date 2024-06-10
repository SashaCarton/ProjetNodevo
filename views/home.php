
<?php
session_start();


use Google\Cloud\Translate\V2\TranslateClient;
include '../translate/langues.php';

$langue = $_COOKIE['langue'] ?? $langue;

$json = file_get_contents('mannequins.json');
$tab = json_decode($json, true);
$taille = count($tab);
$tabNum = array_values($tab);
$elementsParPage = 3;
$page = isset($_GET['page']) ? $_GET['page'] : 1;



function affichage($id){
    global $tab;
    echo '<img src="'. $tab[$id]['chemin'] .'" alt="">';
    echo '<p>'. $tab[$id]['nom'] . ' ' . $tab[$id]['prenom'] .'<br>'. ' ' . $tab[$id]['age'] . ' '.'ans' .'<br>'. $tab[$id]['taille'] .'m'. '<br> ' . $tab[$id]['poids'] .'kg' .'<br>'.' ' . $tab[$id]['sexe'] .' <br>'. ' ' . $tab[$id]['ville'] .'</p>';        
}
function randomMannequin($tab){
    $randomMannequin = array_rand($tab);
    return $randomMannequin;
}
function pagination($tab, $elementsParPage){
    global $taille;
    $nombreDePages = ceil($taille / $elementsParPage);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $page = intval($page);
    $premierMannequin = ($page - 1) * $elementsParPage;
    $mannequins = array_slice($tab, $premierMannequin, $elementsParPage);
    return $mannequins;
}
$mannequins = pagination($tab, $elementsParPage);
var_dump($mannequins[0]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
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
    if(isset($_SESSION['login']) && $_SESSION['login'] === 'admin' && isset($_SESSION['password']) && $_SESSION['password'] === 'admin'){
        echo '<a href="admin">' . $lang[$langue]['admin'] . '</a>';
    }else{
        echo '<a href="login">'. $lang[$langue]['login'] .'</a>';
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
            </div>
            <div class="PicHome">
                <div>
                    <?php affichage(randomMannequin($tab)) ?>
                </div>
                <div class="right">
                    <?php affichage(randomMannequin($tab)) ?>
                </div>
            </div>
        </div>
        <div class="women">
            <img src="../images/angle-droit.png" class="arrowRight" alt="">
            <img src="../images/angle-gauche.png" class="arrowLeft"  alt="">
            <h2 id="women"><?php echo $lang[$langue]['women'] ?></h2>
            <div class="trait"></div>
            <div class="navPic">
                <?php 
                foreach($tab as $mannequin){
                    if($mannequin['sexe'] === 'femme'){
                        echo '<div>';
                        affichage($mannequin['id']) ;
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <div class="trait"></div>
        </div>
        <div id="men" class="men">
            <h2><?php echo $lang[$langue]['men'] ?></h2>
            <div class="trait"></div>
            <div class="navPic">
                <?php 
                foreach($tab as $mannequin){
                    if($mannequin['sexe'] === 'homme'){
                        echo '<div>';
                        affichage($mannequin['id']) ;
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <div class="trait"></div>
        </div>
        <div id="history" class="history">
            <h2><?php echo $lang[$langue]['history'] ?></h2>
                <p><?php echo $lang[$langue]['text-history1']  ?></p>
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
            
    <footer>
        <div class="trait"></div>
        <span>© 2021 Kalos Kagathos. All rights reserved.</span>
        <br>
        <span><?php echo $lang[$langue]['adresse'] ?>:</span>  11 rue de la Paix, 75002 Paris
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
document.querySelector('#fr').addEventListener('click', function(){
    document.cookie = 'langue=\'fr\'';
});
document.querySelector('#en').addEventListener('click', function(){
    document.cookie = 'langue=\'en\'';
});

function getPageNumberFromHash() {
    const hash = window.location.hash;
    const regex = /page=(\d+)/;
    const match = hash.match(regex);
    return match ? parseInt(match[1], 10) : 1; // Retourne 1 si aucun numéro de page n'est trouvé
}

document.querySelector('.arrowLeft').addEventListener('click', function(){
    let currentPage = getPageNumberFromHash();
    if (currentPage > 1) {
        let newPage = currentPage - 1;
        let newUrl = '#women?page=' + newPage;
        history.pushState({page: newPage}, '', newUrl);
    }
});

document.querySelector('.arrowRight').addEventListener('click', function(){
    let currentPage = getPageNumberFromHash();
    let nextPage = currentPage + 1;
    let newUrl = '#women?page=' + nextPage;
    history.pushState({page: nextPage}, '', newUrl);
});
</script>
</body>
</html>