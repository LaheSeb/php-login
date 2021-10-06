<?php  

require_once '../vendor/autoload.php';

use Pacma\PhpLogin\Manager\UserManager;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
$logger = new Logger('main');

$logger->pushHandler(new StreamHandler(__DIR__. '/../log/app.log', Logger::INFO));

$logger->info('First message');
$logger->debug('2eme message');

//Definir le dossier ou se trouvent kes templates
$loader = new FilesystemLoader('..\templates');

// Initialiser l'enviorrement de twig et definir le dossier du cache

$twig = new Environment($loader , ['cache'=> '../cache']);


if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role'])) {
    try {
        include "conf.php";
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $UserManager = new UserManager($db);
        $user = new User();
        if ($Usermanager->add($user)) {
                
            $_SESSION['message'] = "VOus avez ajouté un user";
        } else {
            
            $_SESSION['error'] = "ERREUR dan l'ajout";
        };

        
        header('Location: afficher.php');
    } catch (PDOException $e) {
        print('<br/>Erreur de connexion : ' . $e->getMessage());
    }
}
echo $twig->render('add.html.twig', [
    'title' => 'Ajouter utilisateur', 
    'user' => $user,
    
]);
?>