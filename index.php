<?php
session_start();

$json = file_get_contents('mannequins.json');
$tab = json_decode($json, true);

function affichage($id){
    global $tab;
    echo '<img src="'. $tab[$id]['chemin'] .'" alt="">';
    echo '<p>'. $tab[$id]['nom'] . ' ' . $tab[$id]['prenom'] .'<br>'. ' ' . $tab[$id]['age'] . ' '.'ans' .'<br>'. $tab[$id]['taille'] .'m'. '<br> ' . $tab[$id]['poids'] .'kg' .'<br>'.' ' . $tab[$id]['sexe'] .' <br>'. ' ' . $tab[$id]['ville'] .'</p>';        
}
function randomMannequin($tab){
    $randomMannequin = array_rand($tab);
    return $randomMannequin;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
    <title>Kalos Kagathos</title>
</head>
<body>
    <div class="slidebar">
        <a href="#home">home</a>
        <a href="#women">women</a>
        <a href="#men">men</a>
        <a href="#history">history</a>
        <a href="#contact">contact</a>
    </div>
    <div class="option">
        <div class="langue">
            <a href="">FR</a>
            <a href="">EN</a>
        </div>
        <div class="admin">
            <?php 
            if($_SESSION['login'] === 'admin' && $_SESSION['password'] === 'admin'){
                echo '<a href="admin.php">Admin</a>';
            }else{
                echo '<a href="login.php">Login</a>';
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
            <h2 id="women">Women</h2>
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
            <h2>Men</h2>
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
            <h2>History</h2>
                <p>Fondée à Paris en 1985, Marilyn Agency a l'une des réputations les plus prestigieuses au monde, élargissant sa portée en 1992 en ouvrant sa division masculine, et de nouveau en 1997 en fondant Marilyn Model Management à New York. </p>
                <br>
                <div class="trait"></div>
                <p>Aujourd'hui, l'agence Marilyn représente certains des modèles de mode les plus établis, notamment: Claudia Schiffer, Bar Refaeli, Tasha Tilberg, Julia Stegner, Maggie Rizer, Shannan Click, et Mini Anden, ainsi qu'Alex Lundqvist, Marlon Teixeira, Nils Butler, Francisco Lachowski, Fernando Cabral, Erik van Gils.

                    Depuis la création de l’agence Marilyn, l’héritage se poursuit au fil des ans en restant fidèle à ses valeurs fondamentales : être à la pointe des tendances de la mode, respecter les normes éthiques les plus élevées et s’occuper des besoins des talents et des clients. Notre gestion est individuellement adaptée aux modèles que nous représentons; le temps, les soins, l'attention personnelle sont nos marques telles que nous dirigeons et construisons chaque carrière pour la longévité.</p>
            <div class="form">  
                <div class="contact">
                    <h2 id="contact">Contact</h2>
                    <form>
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" required>
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" id="prenom" required>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required>
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="30" rows="10" required></textarea>
                        <button type="submit">Envoyer</button>
                    </form>
                </div>   
                <div class="devenirmannequin">
                    <h2>Postuler</h2>
                    <form action="postuler.php" method="POST" enctype="multipart/form-data">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" required>
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" id="prenom" required>
                        <label for="age">Age</label>
                        <input type="number" name="age" id="age" required>
                        <label for="taille">Taille</label>
                        <input type="number" step="0.01" min="0" max="4" name="taille" id="taille" required>
                        <label for="poids">Poids</label>
                        <input type="number" step="0.01" name="poids" id="poids" required>
                        <label for="ville">Ville</label>
                        <input type="text" name="ville" id="ville" required>
                        <label for="sexe">Sexe</label>
                        <select name="sexe" id="sexe" required>
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                            <option value="autre">Autre</option>
                        </select>
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" required>
                        <button type="submit">Envoyer</button>
                    </form>
            </div>
            </div>
            
    <footer>
        <div class="trait"></div>
        <span>© 2021 Kalos Kagathos. All rights reserved.</span>
        <br>
        <span>Adresse:</span>  11 rue de la Paix, 75002 Paris
        <br>
        <span>Téléphone:</span> 01 42 61 52 52
        <br>
        <div class="reseaux">
            <a href=""><img src="facebook.png" alt=""></a>
            <a href=""><img src="instagram.png" alt=""></a>
            <a href=""><img src="twitter.png" alt=""></a>
        </div>
    </footer>
</body>
</html>
