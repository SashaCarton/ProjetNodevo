<?php 
    $loginSasha = 'admin';
    $passwordSasha = 'admin';
    $erreur = false;
    session_start();


    if(isset($_POST['submit'])){
        $login = $_POST['login'];
        $password = $_POST['password'];
        if($login == $loginSasha && $password == $passwordSasha){
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
            header('Location: admin');
            exit();
        }else{
            $erreur = true;
            
        }
        var_dump($_['login']);
        var_dump($_POST['password']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">    
    <title>Login</title>
</head>
<body>
    <form class="form" method="POST">
        <label for="login">Login</label>
        <input type="text" name="login" id="login" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required> 
        <button type="submit" name="submit" >Se connecter</button>
        <?php if(($erreur)===true){
            echo 'Login ou mot de passe incorrect'; } ?>
    </form>
</body>
</html>