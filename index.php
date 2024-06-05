<?php
        session_start();

    

    $json = file_get_contents('mannequins.json');
    $tab = json_decode($json, true);
    
    function affichage($id){
        global $tab;

        echo $tab[$id]['nom'] . ' ' . $tab[$id]['prenom'] .'<br>'. ' ' . $tab[$id]['age'] . ' '.'ans' .'<br>'. $tab[$id]['taille'] .'m'. '<br> ' . $tab[$id]['poids'] .'kg' .'<br>'.' ' . $tab[$id]['sexe'] .' <br>'. ' ' . $tab[$id]['ville'];
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
                    <p><?php affichage('mannequin666073e9056eb') ?></p>
                </div>
                <div>
                <img src="images/image copy.png" alt="">
                <p class="right" ><?php affichage('mannequin66607737d92d1') ?></p>
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
                            echo '<div>
                            <img src="images/image.png" alt="">
                            <p>'. $mannequin['nom'] . ' ' . $mannequin['prenom'] .'<br>'. ' ' . $mannequin['age'] . ' '.'ans' .'<br>'. $mannequin['taille'] .'m'. '<br> ' . $mannequin['poids'] .'kg' .'<br>'.' ' . $mannequin['sexe'] .' <br>'. ' ' . $mannequin['ville'] .'</p>
                        </div>';
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
                            echo '<div>
                            <img src="images/image copy 2.png" alt="">
                            <p>'. $mannequin['nom'] . ' ' . $mannequin['prenom'] .'<br>'. ' ' . $mannequin['age'] . ' '.'ans' .'<br>'. $mannequin['taille'] .'m'. '<br> ' . $mannequin['poids'] .'kg' .'<br>'.' ' . $mannequin['sexe'] .' <br>'. ' ' . $mannequin['ville'] .'</p>
                        </div>';
                        }
                    }
                 ?>
            </div>
            <div class="trait"></div>
        </div>
    </div>
    <script>
        
    </script>
    <?php var_dump($tab[mannequin666073e9056eb] ); ?>
</body>
</html>