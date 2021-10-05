<?php
require_once('user.php');
class UserManager
{
    private $_db;
    
    public function setDb($db){
        $this->_db = $db;
        return $this;
    }
    public function __construct( PDO $db){
        $this->setDb($db);

    }
    public function add(User $user):bool{
        $query = $this->_db->prepare('INSERT INTO USERS (email, `password`, roles) VALUES (:email, :passw, :roles);');
         
         $query->bindValue(':email', $user->getEmail());
         $query->bindValue(':passw', $user->getPassword());
         $query->bindValue(':roles', $user->getRoles());
         
         return $query->execute();
       
    }
    public function delet(User $user):bool{
  
  $query = $this->_db->prepare("DELETE FROM USERS WHERE id = :id;");  
  $query->bindValue(':id', $user->getId());
  return $query->execute();


    }

    public function Update(User $user):bool{
        $query = $this->_db->prepare('UPDATE USERS SET email = :email , roles = :roles WHERE id = :id ;');  
        $query->bindValue(':id', $user->getEmail());
        $query->bindValue(':email', $user->getEmail());
        $query->bindValue(':roles', $user->getRoles());
         return $query->execute();
         
    }
    public function getOne(int $id ){
        $query = $this->_db->prepare('SELECT * FROM USERS WHERE id =?  ;' );
        $query->execute(array($id));
        $ligne = $query->fetch();
        $user = new User($ligne);   
        return $user;

    }
    public function getList():array{

        $listeDeUser = array();
        // retourne la liste de tous les perosnnages 
        $request = $this->_db->query('SELECT * FROM users; ');

        while ($ligne = $request->fetch(PDO::FETCH_ASSOC))// Chauqe entrée seta recuoerer
        {
            // On passe les donnés (stock"s dans un tableau) concernant le personnae

            $user= new User($ligne);
            $listeDeUser[] = $user; // Ajouter personnage au tableau 
          
        }
        return $listeDeUser;

    }
    
}




?>