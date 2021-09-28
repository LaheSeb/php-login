<?php
session_start();
 include ('connect.php');




$sql ='SELECT id_t, libelle FROM Type_de_livre;';
    $result = mysqli_query($db, $sql);



    $sth = $db->prepare("SELECT id, email, 'password'  ");
    $sth->execute(array($id));
    $ligne = $sth->fetch();
