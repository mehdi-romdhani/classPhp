<?php 
session_start();

require_once('./Models/user.php');

@$submit=$_POST['submit'];

if(isset($submit)){
    $login=$_POST['login'];
    $password=$_POST['password'];
    
    $user=new User();
    $user->connect($login,$password);
}

@$disconnect=$_POST['deconnexion'];

if(isset($disconnect)){
    $user=new User();
    $user->disconnect();
}




?>

<!DOCTYPE html>
<html lang="Fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class_poo_module</title>
</head>
<body>
    <?php require_once('./include/header.php') ?>

<?php if(isset($_SESSION['login'])){ ?>
    
    <?php    echo $_SESSION['login']." " . "vous etes connecté"; ?>
    <form action="" method="POST">
        
    <br>
    <input type="submit" name="deconnexion" value="disconnect">
        
    </form>

<?php } else { ?>
    <div class="container-form">
        <form action="" method="POST">
            <label for="login">login</label>
            <br>
            <input type="text" name="login">
            <br>
            <label for="password">Password</label>
            <br>
            <input type="text" name="password">
            <br>
            <br>
            <input type="submit"  name="submit" value="sign-in">
        </form>
<?php } ?>
    </div>
</body>
</html>