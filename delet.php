<?php



require_once('manager/UserManager.php');
require_once('manager/User.php');
include ('header.php');




try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // Si toutes les colonnes sont converties en string


    $Usermanager = new UserManager($db);


    if (isset($_GET['id']) && !empty($_GET['id'])) {

        $id = strip_tags($_GET['id']);
        $user = $Usermanager->getOne($id);
        $Usermanager->delet($user);
        header('Location: afficher.php');


            

    
    }
} catch (PDOException $e) {
    print('<br/>Erreur de connexion : ' . $e->getMessage());
}