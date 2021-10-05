<?php

require_once('manager/UserManager.php');
require_once('manager/User.php');
 include ('header.php');
try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // Si toutes les colonnes sont converties en string

   
    $manager = new UserManager($db);

    if ($_POST) {
        if (isset($_POST['email']) && !empty($_POST['email'])) {

            
            $email = strip_tags($_POST['email']);
            $passw = strip_tags($_POST['passw']);
            $roles = strip_tags($_POST['roles']);

            
            $user = new User();
            $user->setEmail($email);
            $user->setPassword($passw);
            $user->setRoles($roles);
            if ($manager->add($user)) {
                
                $_SESSION['message'] = "VOus avez ajouté un user";
            } else {
                
                $_SESSION['error'] = "ERREUR dan l'ajout";
            };

            
            header('Location: afficher.php');
        } 
    }
} catch (PDOException $e) {
    print('<br/>Erreur de connexion : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
     <title>Ajouter un type de livre</title>
 </head>
 <body>
     <main class="container"> 
        <div class="row">
        
            <section class="col-12">
                <?php
                    if(!empty($_SESSION['erreur'])){
                        print('<div class="alert alert-danger" role="alert">'.$_SESSION['erreur'].'</div>');
                        
                        $_SESSION['erreur'] = "";
                        }

                    if(!empty($_SESSION['message'])){
                            print('<div class="alert alert-danger" role="alert">'.$_SESSION['erreur'].'</div>');
                            
                        $_SESSION['messgae'] = "";
                        }

                ?>
                <h1>Ajouter un utilisateur</h1>

                <form method="POST">
                    <div class="mb-3">
                        <label>Email : </label>
                        <input type ="text" id="email" name="email" class="form-control" placeholder="Rentrez votre adresse email....">
                        <br>
                        <label>Mot de pass : </label>
                        <input type ="password" id="passw" name="passw" class="form-control" placeholder="Tapez votre mot de passe....">
                        <br>
                        <label>Roles de l'utilisateur  : </label>
                        <input type ="text" id="roles" name="roles" class="form-control" placeholder="admin">
                    </div>
                        <button class="btn btn-primary">Enregistrer</button>
                        <a class ="btn btn-info"href="index.php"> Retour à la liste</a>
                </form>
            </session>
        </div>

    </main>
 </body>
 </html>