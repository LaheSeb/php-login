<?php



 include ('header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2696450378.js" crossorigin="anonymous"></script>
    <title>Liste des Types des Livres</title>
</head>
<body>
<main class="container">
    <div class="row">
    <?php
    if (!empty($_SESSION['error'])){

    
    ?>
        <div class="alert alert-success" role="alert">
            <?php print ($_SESSION['error']);
            $_SESSION['error']="";?>
        </div> 
        <?php } ?>
    <?php
    if (!empty($_SESSION['message'])){

    
    ?>
        <div class="alert alert-success" role="alert">
            <?php print ($_SESSION['message']);
            $_SESSION['message']="";?>
        </div> 
        <?php } ?>
                <h1>Liste des utilisateur </h1>
                    <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Email</th>
                        <th>mdp</th>
                        <th>Roles</th>
                    </thead>
    
    
    <?php
    
        try {
            $db = new PDO ($dsn, $user, $password);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);// si toutes les colonnes sont 
        
        
            $UserManager = new UserManager($db);
           $users = $UserManager->getList();
            print('<br>Liste des personnages : ');
           foreach ($users as $user)
           {
            print('<td>'.$user->getId().'</td>');
            print('<td>'.$user->getEmail().'</td>');
            print('<td>'.$user->getPassword().'</td>');
            print('<td>'.$user->getRole().'</td>');
          
        
           }
        
        } catch (PDOException $e) {
            print('<br>Erruer de connexion : ' . $e->getMessage());
        }
    
        ?>
</thead>
    </table>
    <a class="btn btn-primary" href="add.php"> Ajouter un type </a>
    </div>
</main>
    
    
</body>
</html>
