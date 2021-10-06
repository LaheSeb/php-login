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

print("OK");

$loader = new FilesystemLoader('../templates');
$twig = new Environment($loader, ['cache' => '../cache']);

try {
    include "conf.php";
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $userManager = new UserManager($db);
    $users = $userManager->getList();



} catch (PDOException $e) {
    print('<br/>Erreur de connexion : ' . $e->getMessage());
}
echo $twig->render('index.html.twig', [
    'title' => 'Liste des utilisateurs', 
    'users' => $users,
]);

?>