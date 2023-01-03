<?php 
session_start();
include('./Models/user.php');

if(isset($_POST['update'])){
    $user=new User();
    $user->update($_POST['login'],$_POST['password'],$_POST['email'],$_POST['firstname'],$_POST['lastname']);
}
if(isset($_POST['delete'])){
    $user=new User();
    $user->delete();
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
    
</body>
</html>
<?php require_once('./include/header.php'); ?>

<div class="container-form">
    <form action="" method="POST">
        <label for="login">Login</label>
        <br>
        <input type="text" name="old_login" value="<?= $_SESSION['login']?>">
        <br>
        <label for="new_login">New login</label>
        <br>
        <input type="text" name="login">
        <br>
        <label for="email">email</label>
        <br>
        <input type="text" name="email">
        <br>
        <label for="firstname">firstname</label>
        <br>
        <input type="text" name="firstname">
        <br>
        <label for="lastname">Lastname</label>
        <br>
        <input type="text" name="lastname">
        <br>
        <label for="passwd">Password</label>
        <br>
        <input type="password" name="password">
        <br>
        <input type="submit" name="update" value="update profil"><input type="submit" name="delete" value="delete profil">
    

    </form>
</div>