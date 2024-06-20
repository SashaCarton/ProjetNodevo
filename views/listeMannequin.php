<?php 
    if($_SESSION['login'] !== 'admin' || $_SESSION['password'] !== 'admin'){
        header('Location: login');
        exit();
    }

    include __DIR__ .  '/translate/langues.php';
    $langue = $_COOKIE['langue'] ?? $langue;
    
    $json = file_get_contents( __DIR__ . '/mannequins.json');
    $tab = json_decode($json, true);
    $keywords = isset($_POST['keywords']) ? $_POST['keywords'] : '';
    $keywords = strtolower($keywords);
    $keywords = trim($keywords);

    function findIndex($keywords){
        $tab = json_decode(file_get_contents( __DIR__ . '/mannequins.json'), true);
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
        $tab = json_decode(file_get_contents( __DIR__ . '/mannequins.json'), true);
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
    <h1><?php echo $lang[$langue]['Kalos Kagathos'] ?></h1>
    <h2><?php echo $lang[$langue]['MODELS AGENCY'] ?></h2>
    </div>
    <form class="form" method="POST" action="">
        <input type="search" name="keywords" >
        <input type="submit" value="<?php echo $lang[$langue]['search'] ?>">
        <a href="admin"><?php echo $lang[$langue]['return'] ?></a>
        <a href="demandes"><?php echo $lang[$langue]['manage requests'] ?></a>
        <?php 
        foreach($result as $mannequin){
            echo '<div>';
            affichage($mannequin['id']);
            echo '<a href="modif?id='. $mannequin['id'] .'">' . $lang[$langue]['modify'] . '</a>';
            echo '<br>';
            echo '<a id="del" href="delete?id='. $mannequin['id'] .'">' . $lang[$langue]['delete'] . '</a>';
            echo '</div>';
        }
        ?>
        <div class="line"></div>
        <h2><?php echo $lang[$langue]['all the models'] ?></h2>
        <div class="navPicAll">
            <?php
            if (empty($keywords) || empty($result)){
            foreach($tab as $mannequin){
                echo '<div>';
                affichage($mannequin['id']);
                echo '<a href="modif?id='. $mannequin['id'] .'">' . $lang[$langue]['modify'] . '</a><br>';
                echo '<a id="del" href="delete?id='. $mannequin['id'] .'">' . $lang[$langue]['delete'] . '</a>';
                echo '</div>';
            }
            }
            else {
            foreach($result as $mannequin){
                echo '<div>';
                affichage($mannequin['id']);
                echo '<a href="modif?id='. $mannequin['id'] .'">' . $lang[$langue]['modify'] . '</a>';
                echo '<a id="del" href="delete?id='. $mannequin['id'] .'">' . $lang[$langue]['delete'] . '</a>';
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
                let confirmDelete = window.confirm('<?php echo $lang[$langue]['do_you_really_want_to_delete_this_model'] ?>');
                if (!confirmDelete) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
