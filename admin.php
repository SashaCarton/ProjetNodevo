<?php 
    session_start();
    if($_SESSION['login'] !== 'admin' && $_SESSION['password'] !== 'admin'){
        header('Location: login.php');
        exit();
    }
    else{
        echo 'Bienvenue' ." ". $_SESSION['login'];
    }

    


    
?>


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
    <form class="form" action="add.php" method="POST">
        <label for="nom">Nom</label >
        <input type="text" name="nom" id="nom" placeholder="Ex. Carton" required>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" placeholder="Ex. Sasha" required>
        <label for="age">Age</label>
        <input type="number"  name="age" id="age" placeholder="Ex. 19" required>
        <label for="taille">Taille</label>
        <input type="number" step="0.01" min="0" max="4" name="taille" id="taille" placeholder="Ex. 1.80" required>
        <label for="poids">Poids</label>
        <input type="number" step="0.01"  name="poids" id="poids" placeholder="Ex. 55.5" required>
        <label for="ville">Ville</label>
        <input type="text" name="ville" id="ville" placeholder="Ex. Senlis" required>
        <label for="sexe">Sexe</label>
        <select name="sexe" id="sexe" required>
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
            <option value="autre">Autre</option>
        </select>
        <button type="submit" name="submit">Ajouter</button>
        <a href="index.php">Retour</a>
        <a href="modif.php">Modifier</a>
    </form>
        
</body>
</html>