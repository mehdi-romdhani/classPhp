<?php if(!isset($_SESSION['login'])) :?>
<header>
    <nav>
        <ul>
            <li> <a href="index.php">Home</a></li>
            <li> <a href="inscription.php">Sign-In</a></li>
            <li> <a href="connexion.php">Connexion</a></li>
           
        </ul>
    </nav>
</header>
<?php else :?>
    <header>
    <nav>
        <ul>
            <li> <a href="index.php">Home</a></li>
            <li> <a href="profil.php">Profil</a></li>
                       
        </ul>
    </nav>
</header>
<?php endif ?>



