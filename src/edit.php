
<?php



require_once('manager/UserManager.php');
require_once('manager/User.php');
include ('header.php');


try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // Si toutes les colonnes sont converties en string

    // Créer une instance de la classe UserManager (un objet $manager)
    $manager = new UserManager($db);

    if ($_POST) {
        if (
            isset($_POST['id']) && !empty($_POST['id'])
            && isset($_POST['email']) && !empty($_POST['email'])
            && isset($_POST['roles']) && !empty($_POST['roles'])
        ) {

            
            $id = strip_tags($_POST['id']);
            $email = strip_tags($_POST['email']);
            $roles = strip_tags($_POST['roles']);

            $user->Update($user);
            $user = $manager->getOne($id);


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
        <title>Oui</title>
    </head>
    <body>
    <main class ="container">
        <div class="row">
            <section class="col-12">
            <h1>Mofier le type de  livre </h1>

            <form method="POST">
            <div class="mb-3">

            <p>ID : <?= $user->getId() ?> </p>
            
                
            <label for="label">Mail</label>
            <input type="hidden" id='id' name="id" value="<?= $user->getId() ?>">
            <input type="text" id="email" name="email" class="form-control" value="<?= $user->getEmail() ?>">
            <label for="label">Roles</label>
            <input type="text" id="roles" name="roles" class="form-control" value="<?= $user->getRoles() ?>">
            </div>
            <p>
            
                <a class ="btn btn-info" href="index.php"> Retour à la liste </a>
                <button class="btn btn-primary"> Modifier</button>
                
            </p>
            </form>
            </section>
        </div>
    </main>
        
    </body>
    </html>