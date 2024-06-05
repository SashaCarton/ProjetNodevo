<?php 
    session_start();
    if($_SESSION['login'] !== 'admin' || $_SESSION['password'] !== 'admin'){
        header('Location: login.php');
        exit();
    }
    
    $json = file_get_contents('mannequins.json');
    $tab = json_decode($json, true);
    $keywords = isset($_POST['keywords']) ? $_POST['keywords'] : '';

    $result = findIndex($keywords);

    function findIndex($keywords){
        global $tab;
        $result = [];
        foreach($tab as $key => $value){
            if($value['nom'] === $keywords || $value['prenom'] === $keywords || $value['age'] === $keywords){
                $result[] = $value;
            }
        }
        return $result;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="modif.css">
    <title>Administration</title>
</head>
<body>
    <div class="title">
    <h1>Kalos Kagathos</h1>
    <h2>MODELS AGENCY</h2>
    </div>
    <form class="form" method="POST" action="">
        <input type="search" name="keywords" >
        <input type="submit" value="Search">
        <div class="navPic">
            <?php 
            foreach($result as $mannequin){
                echo '<div>
                    <img src="images/image.png" alt="">
                    <p>'. $mannequin['nom'] . ' ' . $mannequin['prenom'] .'<br>'. ' ' . $mannequin['age'] . ' '.'ans' .'<br>'. $mannequin['taille'] .'m'. '<br> ' . $mannequin['poids'] .'kg' .'<br>'.' ' . $mannequin['sexe'] .' <br>'. ' ' . $mannequin['ville'] .'</p>
                </div>';
            }
            ?>
        </div>
    </form>
</body>
</html>
