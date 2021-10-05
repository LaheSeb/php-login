<?php



require_once('manager/UserManager.php');
require_once('manager/User.php');
include ('header.php');


try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // Si toutes les colonnes sont converties en string

    
    $Usermanager = new UserManager($db);
    if (isset($_GET['id']) && !empty($_GET['id'])) {

        $id =strip_tags($_GET['id']);
     
       
        $user = $Usermanager->getOne($id);
    }
    else 
    header('Location: afficher.php');

        
       

    
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
        <title>Oui</title>
    </head>
    <body>
    <main class ="container">
        <div class="row">
            <section class="col-12">
            <h1>Details du type de livre</h1>
            <p>ID : <?= $user->getId() ?> </p>
            <p>Email : <?= $user->getEmail() ?> </p>
            <p>Roles : <?= $user->getRoles()?></p>
            <a class ="btn btn-info" href="afficher.php"> Retour à la liste </a>
            
            <a class="btn btn-primary" href='edit.php?id=<?php $user->Update($user) ?>'>Modifier </a><br>
            
            </p>
            </section>
        </div>
    </main>
        
    </body>
    </html>