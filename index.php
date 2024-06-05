<?php
        session_start();

    function affichage($mannequin){
        echo $mannequin["nom"] . " ";
        echo $mannequin["prenom"];
        echo "<br>";
        echo $mannequin["age"] . " ans". " " ;
        echo "<br>";
        echo $mannequin["taille"] . " m". "   "." " ;
        echo "<br>";
        echo $mannequin["poids"] . " kg". " ";
        echo "<br>";
        echo $mannequin["sexe"]. " ";
        echo "<br>";
        echo $mannequin["ville"] . " ";
    }

    $lea = [
        "nom" => "Léa",
        "prenom" => "Dupont",
        "age" => 25,
        "taille" => 1.75,
        "poids" => 55,
        "sexe" => "femme",
        "ville" => "Paris",
    ];

    $john = [
        "nom" => "John",
        "prenom" => "Smith",
        "age" => 30,
        "taille" => 1.85,
        "poids" => 75,
        "sexe" => "homme",
        "ville" => "New York",
    ];

    $marie = [
        "nom" => "Marie",
        "prenom" => "Martin",
        "age" => 28,
        "taille" => 1.68,
        "poids" => 60,
        "sexe" => "femme",
        "ville" => "Paris",
    ];
    $lise = [
        "nom" => "",
        "prenom" => "Lise",
        "age" => 25,
        "taille" => 1.75,
        "poids" => 55,
        "sexe" => "femme",
        "ville" => "Paris",
    ];
    $milan = [
        "nom" => "Milan",
        "prenom" => "Milan",
        "age" => 30,
        "taille" => 1.85,
        "poids" => 75,
        "sexe" => "homme",
        "ville" => "New York",
    ];

    
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
       <?php if($_SESSION['login'] === 'admin' && $_SESSION['password'] === 'admin'){
                echo '<a href="admin.php">Admin</a>';
            }else{
                echo '<a href="login.php">Login</a>';
                 } ?>
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
                    <img src="images/image.png" alt="">
                    <p><?php affichage($lea) ?></p>
                </div>
                <div>
                <img src="images/image copy.png" alt="">
                <p class="right" ><?php affichage($marie) ?></p>
                </div>
            </div>
        </div>
        <div class="women">
            <h2 id="women">Women</h2>
            <div class="trait"></div>
            <div class="navPic">
                <div>
                    <img src="images/image.png" alt="">
                    <p><?php affichage($lea) ?></p>
                </div>
                <div>
                    <img src="images/image copy.png" alt="">
                    <p><?php affichage($marie) ?></p>
                </div>
                <div>
                    <img src="images/image copy 3.png" alt="">
                    <p><?php affichage($lise) ?></p>
                </div>
                <div>
                    <img src="images/image.png" alt="">
                    <p><?php affichage($lea) ?></p>
                </div>
                <div>
                    <img src="images/image.png" alt="">
                    <p><?php affichage($lea) ?></p>
                </div>
            </div>
            <div class="trait"></div>
        </div>
        <div id="men" class="men">
            <h2>Men</h2>
            <div class="trait"></div>
            <div class="navPic">
                <img src="images/image copy 2.png" alt="">
                <img src="images/image copy 2.png" alt="">
                <img src="images/image copy 2.png" alt="">
                <img src="images/image copy 2.png" alt="">
                <img src="images/image copy 2.png" alt="">
                <img src="images/image copy 2.png" alt="">
                <img src="images/image copy 2.png" alt="">
                <img src="images/image copy 2.png" alt="">
            </div>
            <div class="trait"></div>
        </div>
    </div>
</body>
</html>