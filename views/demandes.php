<?php 
    session_start();
    if($_SESSION['login'] !== 'admin' || $_SESSION['password'] !== 'admin'){
        header('Location: login');
        exit();
    }
    
    $json = file_get_contents(__DIR__ . '/nouveauMannequin.json');
    $tab = json_decode($json, true);
    $keywords = isset($_POST['keywords']) ? $_POST['keywords'] : '';
    $keywords = strtolower($keywords);
    $keywords = trim($keywords);

    function findIndex($keywords){
        $tab = json_decode(file_get_contents( __DIR__ . '/nouveauMannequin.json'), true);
        $result = [];
        foreach($tab as $key => $value){
            if($value['nom'] === $keywords || $value['prenom'] === $keywords || $value['age'] === $keywords || $value['taille'] === $keywords || $value['poids'] === $keywords || $value['sexe'] === $keywords || $value['ville'] === $keywords){
                $result[] = $value;
            }
        }
        return $result;
    }

    $result = findIndex($keywords);

    function affichage($id){
        $tab = json_decode(file_get_contents( __DIR__ . '/nouveauMannequin.json'), true);
        echo '<img class="imgAll" src="'. $tab[$id]['chemin'] .'" alt="">';
        echo '<p>'. $tab[$id]['nom'] . ' ' . $tab[$id]['prenom'] .'<br>'. ' ' . $tab[$id]['age'] . ' '.'ans' .'<br>'. $tab[$id]['taille'] .'m'. '<br> ' . $tab[$id]['poids'] .'kg' .'<br>'.' ' . $tab[$id]['sexe'] .' <br>'. ' ' . $tab[$id]['ville'] .'</p>';        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../styles/listeMannequin.css">
    <title>Administration</title>
</head>
<body>
    <div class="title">
    <h1>Kalos Kagathos</h1>
    <h2>MODELS AGENCY</h2>
    </div>
    <form class="form" method="POST" action="">
        <input type="search" name="keywords" >
        <input type="submit" value="Rechercher">
        <a href="listeMannequin">Retour</a>
            <?php 
            foreach($result as $mannequin){
            echo '<div>';
            affichage($mannequin['id']);
            echo '<a href="add?id='. $mannequin['id'] .'&where=demandes">Ajouter</a>';
            echo '<br>';
             echo '<a id="del" href="delete?id='. $mannequin['id'].'&where=demandes' .'">Supprimer</a>';
               echo'</div>';
            }
            ?>
        <div class="line"></div>
        <h2>Demandes :</h2>
        <div class="navPicAll">
            <?php
            if (empty($keywords) or $result == []){
                foreach($tab as $mannequin){
                    echo '<div>';
                affichage($mannequin['id']);
                echo '<a href="add?id='. $mannequin['id'] .'&where=demandes">Ajouter</a>';
                echo '<br>';
                echo '<a id="del" href="delete?id='. $mannequin['id'].'&where=demandes' .'">Supprimer</a>';
                echo '</div>';
                }
            }
            else {
                foreach($result as $mannequin){
                    echo '<div>';
                affichage($mannequin['id']);
                echo '<a href="add?id='. $mannequin['id'] .'&where=demandes">Ajouter</a>';
                echo '<br>';
                echo '<a id="del" href="delete?id='. $mannequin['id'].'&where=demandes' .'">Supprimer</a>';
                echo '</div>';
                }
            }
            ?>
        </div>
    </form>
    <script>
        let deleteLinks = document.querySelectorAll('#del');
        deleteLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                let confirmDelete = window.confirm('Voulez-vous vraiment supprimer ce mannequin ?');
                if (!confirmDelete) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
