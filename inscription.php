<?php
require_once("./Models/user.php");
@$submit=$_POST['submit'];

if(isset($submit)){

    $login=$_POST['login'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $password=$_POST['password'];

        $new_user= new User();
        $new_user->register($login,$password,$email,$firstname,$lastname);
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

    <div class="container-form">
        <form action="" method="POST">
            <label for="log">Login</label>
            <br>
            <input type="text" name="login">
            <br>
            <label for="firstname">First_name</label>
            <br>
            <input type="text" name="firstname">
            <br>
            <label for="lastname">Last_name</label>
            <br>
            <input type="text" name="lastname">
            <br>
            <label for="email">Email</label>
            <br>
            <input type="text" name="email">
            <br>
            <label for="password">Password</label>
            <br>
            <input type="password" name="password">
            <br>
            <br>
            <input type="submit" name="submit" value="Register">
            

        </form>
    </div>
</body>
</html>