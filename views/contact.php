<?php



include '../translate/langues.php';
$langue = $_COOKIE['langue'] ?? $langue;

session_start();
if ($_SESSION['login'] !== 'admin' || $_SESSION['password'] !== 'admin') {
    header('Location: login');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $id = uniqid();
    $contact = [
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'message' => $message,
        'id' => $id
    ];

    $oldjson = file_get_contents('contact.json');
    $tab = json_decode($oldjson, true);
    $tab[] = $contact;
    $tab = json_encode($tab, JSON_PRETTY_PRINT);
    file_put_contents('contact.json', $tab);
    var_dump($tab);
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
    <?php 
    echo "<a href='admin'>" . $lang[$langue]['return'] . "</a>"; 
    ?>
    <div class="contact">
        <table>
            <tr>
                <th><?php echo $lang[$langue]['last name'] ?></th>
                <th><?php echo $lang[$langue]['first name'] ?></th>
                <th><?php echo $lang[$langue]['email'] ?></th>
                <th><?php echo $lang[$langue]['message'] ?></th>
            </tr>
            <?php
            $json = file_get_contents('/var/www/html/ProjetNodevo/contact.json');
            $tab = json_decode($json, true);
            foreach ($tab as $index => $contact) {
                echo '<tr>';
                echo '<td>' . $contact['nom'] . '</td>';
                echo '<td>' . $contact['prenom'] . '</td>';
                echo '<td>' . $contact['email'] . '</td>';
                echo '<td>' . $contact['message'] . '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
    <script>
        let deleteLinks = document.querySelectorAll('a[href^="delete?id="]');
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
