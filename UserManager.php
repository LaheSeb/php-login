<?php
class UserManager
{
    private $_db;
    
    public function setDb($db){
        $this->_db = $db;
    }
    public function __construct($db){
        $this->setDb($db);

    }
    public function add(User $user){
        $querry = $this->_db->prepare("INSERT INTO user(email, 'password', roles VALUES($email ,$password, $roles");
        
       
    }
    public function delete(User $user):bool{

    }
    public function getOne(int $id){
        $sth = $this->_db->prepare("SELECT id, nom, `force`, degats, niveau, experience FROM personnages Where id =? ");
        $sth->execute(array($id));
        $ligne = $sth->fetch();

        $user= new User($ligne);
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