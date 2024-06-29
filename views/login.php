<?php

$error = null;

$server = "mysql-lyceestvincent.alwaysdata.net";
$user = "116313_scarton";
$pass = "94g4tM96TeFCva.";
$dbName = "lyceestvincent_scarton";


// $server = "localhost";
// $user = "root";
// $pass = "";
// $dbName = "lyceestvincent_scarton";


try {
    $co = new PDO("mysql:host=$server;dbname=$dbName", $user, $pass);
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $error = $e->getMessage();
}


if (isset($_POST['submit'])) {
    $username = $_POST['login'];
    $password = $_POST['password'];

    $query = $co->prepare('SELECT * FROM users_kalos WHERE username=:login');
    $query->bindParam(':login', $username);
    $query->execute();
    $result = $query->fetch();

    if (empty($result)) {
        $error = "Le nom d'utilisateur ou le mot de passe est incorrect.";
    } else {
        $password_hash = $result["password"];
        if (password_verify($password, $password_hash)) {
            $_SESSION['login'] = 'admin';
            $_SESSION['password'] = 'admin';
            header("Location: /ProjetNodevo/admin");
            exit();
        } else {
            $error = "Le nom d'utilisateur ou le mot de passe est incorrect.";
        }
    }
}

if (isset($_POST['remember'])) {
    $username = $_POST['login'];
    $password = $_POST['password'];
    setcookie('username', $username, time() + (86400 * 30), '/');
    setcookie('password', $password, time() + (86400 * 30), '/');
} else {
    setcookie('username', '', time() - 3600, '/');
    setcookie('password', '', time() - 3600, '/');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/portfolio/ProjetNodevo/public/styles/login.css">    
    <title>Login</title>
</head>
<body>
    <form class="form" method="POST">
        <label for="login">Login</label>
        <input type="text" name="login" id="login" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required> 
        <button type="submit" name="submit">Se connecter</button>
        <?php if (isset($error)) : ?>
            <p><?= $error ?></p>
        <?php endif; ?>
    </form>
</body>
</html>
