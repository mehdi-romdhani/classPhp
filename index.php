<?php
session_start();
include('./Models/user.php');

@$disconnect=$_POST['deconnexion'];

if(isset($disconnect)){
    $user=new User();
    $user->disconnect();
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class_Php_Conect</title>
</head>
<body>
    <?php require_once("./include/header.php") ?>

    <h1>Module de connexion</h1>
    <p>Class POO</p>

<?php if(isset($_SESSION['login'])):?>
    <?php    echo $_SESSION['login']." " . "vous etes connecté"; ?>
    <form action="" method="POST">
        
    <br>
    <input type="submit" name="deconnexion" value="disconnect">
        
    </form>

<?php endif; ?>


</body>
</html>