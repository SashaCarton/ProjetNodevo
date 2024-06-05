<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Administration</title>
</head>
<body>
    <div class="title">
    <h1>Kalos Kagathos</h1>
    <div class="underline"></div>
    <h2>MODELS AGENCY</h2>
    </div>
    <form method="POST" action="">
        <input type="search" name="keywords" >
        <input type="submit" value="Search">
    </form>
</body>
</html>
<?php 
    session_start();
    if($_SESSION['login'] !== 'admin' || $_SESSION['password'] !== 'admin'){
        header('Location: login.php');
        exit();
    }
    else{
        
    }

    $json = file_get_contents('mannequins.json');
    $tab = json_decode($json, true);
    $keywords = $_POST['keywords'];

    if (isset($_POST['keywords'])){
        findIndex($keywords);
    }
    function findIndex($keywords){
        global $tab;
        foreach($tab as $key => $value){
            if($value['nom'] === $keywords){
                return $key;
            }
            elseif($value['prenom'] === $keywords){
                return $key;
            }
            elseif($value['age'] === $keywords){
                return $key;
            }
        }
        return false;
    }
    if (isset($_POST['keywords'])){
        if (findIndex($keywords) === false){
            echo 'Aucun résultat';
        }
        else{
            echo $tab[findIndex($keywords)]['nom'] . ' ' . $tab[findIndex($keywords)]['prenom'] .'<br>'. ' ' . $tab[findIndex($keywords)]['age'] . ' '.'ans' .'<br>'. $tab[findIndex($keywords)]['taille'] .'m'. '<br> ' . $tab[findIndex($keywords)]['poids'] .'kg' .'<br>'.' ' . $tab[findIndex($keywords)]['sexe'] .' <br>'. ' ' . $tab[findIndex($keywords)]['ville'];
        }
    }
?>


