<?php
$langue = $_COOKIE['langue'];

if (isset($_SESSION['username'])) {
    header("Location:/ProjetNodevo/login");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/portfolio/ProjetNodevo/public/styles/admin.css">
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
    <form class="form" action="add" method="POST" enctype="multipart/form-data">
        <label for="nom"><?= $lang[$langue]['last name'] ?></label>
        <input type="text" name="nom" id="nom" placeholder="Ex. Carton" required>
        <label for="prenom"><?php echo $lang[$langue]['first name'] ?></label>
        <input type="text" name="prenom" id="prenom" placeholder="Ex. Sasha" required>
        <label for="age"><?php echo $lang[$langue]['age'] ?></label>
        <input type="number" name="age" id="age" placeholder="Ex. 19" required>
        <label for="taille"><?php echo $lang[$langue]['height'] ?></label>
        <input type="number" step="0.01" min="0" max="4" name="taille" id="taille" placeholder="Ex. 1.80" required>
        <label for="poids"><?php echo $lang[$langue]['weight'] ?></label>
        <input type="number" step="0.01" name="poids" id="poids" placeholder="Ex. 55.5" required>
        <label for="ville"><?php echo $lang[$langue]['city'] ?></label>
        <input type="text" name="ville" id="ville" placeholder="Ex. Senlis" required>
        <label for="sexe"><?php echo $lang[$langue]['gender'] ?></label>
        <select name="sexe" id="sexe" required>
            <option value="homme"><?php echo $lang[$langue]['men'] ?></option>
            <option value="femme"><?php echo $lang[$langue]['women'] ?></option>
            <option value="autre"><?php echo $lang[$langue]['other'] ?></option>
        </select>
        <label for="image"><?php echo $lang[$langue]['image'] ?></label>
        <input type="file" name="image" id="image" required>
        <button type="submit" name="submit">Ajouter</button>
        <div class="link">
            <a href="home"><?php echo $lang[$langue]['return'] ?></a>
            <a href="listeMannequin"><?php echo $lang[$langue]['view/edit'] ?></a>
            <a href="contact"><?php echo $lang[$langue]['contact'] ?></a>
        </div>
    </form>
</body>

</html>