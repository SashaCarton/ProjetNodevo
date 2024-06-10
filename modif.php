<?php 
session_start();
if($_SESSION['login'] !== 'admin' && $_SESSION['password'] !== 'admin'){
    header('Location: login.php');
    exit();
}
$json = file_get_contents('mannequins.json');
$tab = json_decode($json, true);
$id = $_GET['id'];
$mannequin = $tab[$id];

if(isset($_POST['submit'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $taille = $_POST['taille'];
    $poids = $_POST['poids'];
    $ville = $_POST['ville'];
    $sexe = $_POST['sexe'];
    $image = $_POST['image'];

    if(empty($_FILES['image']['name'])){
        $chemin = $mannequin['chemin'];
    }else{
        $dossier = 'profilePic/';
        $fichier = basename($_FILES['image']['name']);
        $nouveauNomFichier = uniqid() . '.' . pathinfo($fichier, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['image']['tmp_name'], $dossier.$nouveauNomFichier);
        $chemin = $dossier . $nouveauNomFichier;
    }

    $mannequin = [
        'id' => $id,
        'nom' => $nom,
        'prenom' => $prenom,
        'age' => $age,
        'taille' => $taille,
        'poids' => $poids,
        'ville' => $ville,
        'sexe' => $sexe,
        'chemin' => $chemin
    ];

    $tab[$id] = $mannequin;
    $tab = json_encode($tab, JSON_PRETTY_PRINT);
    file_put_contents('mannequins.json', $tab);
    header('Location: listeMannequin.php');
    exit();
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
    <form class="form"  method="POST" enctype="multipart/form-data">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" placeholder="Ex. Carton" value="<?php echo $mannequin['nom']; ?>"  >
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" placeholder="Ex. Sasha" value="<?php echo $mannequin['prenom']; ?>" required>
        <label for="age">Age</label>
        <input type="number" name="age" id="age" placeholder="Ex. 19" value="<?php echo $mannequin['age']; ?>" required>
        <label for="taille">Taille</label>
        <input type="number" step="0.01" min="0" max="4" name="taille" id="taille" placeholder="Ex. 1.80" value="<?php echo $mannequin['taille']; ?>" required>
        <label for="poids">Poids</label>
        <input type="number" step="0.01" name="poids" id="poids" placeholder="Ex. 55.5" value="<?php echo $mannequin['poids']; ?>" required>
        <label for="ville">Ville</label>
        <input type="text" name="ville" id="ville" placeholder="Ex. Senlis" value="<?php echo $mannequin['ville']; ?>" required>
        <label for="sexe">Sexe</label>
        <select name="sexe" id="sexe" required>
            <option value="homme" <?php if($mannequin['sexe'] == 'homme') echo 'selected'; ?>>Homme</option>
            <option value="femme" <?php if($mannequin['sexe'] == 'femme') echo 'selected'; ?>>Femme</option>
            <option value="autre" <?php if($mannequin['sexe'] == 'autre') echo 'selected'; ?>>Autre</option>
        </select>
        <label for="image">Image</label>
        <input type="file" name="image" id="image">
        <button type="submit" name="submit">Modifier</button>
        <a href="listeMannequin.php">Retour</a>
    </form>
    </form>
</body>
</html>
