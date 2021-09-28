<?php 
    include('conf.php');
    
    $db = new PDO ($dsn, $user, $password);

    if (mysqli_connect_error()){
        $_SESSION['error']='Erreur : KO ! ' . mysqli_connect_error();
        exit();
    }
    else {
        $_SESSION['message']='Connextion à la base de données : OK !';
    }
    
    
    ?>