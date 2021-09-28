<?php
class UsersManager
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
        $querry->blindValue();
        $querry->blindValue();
    }
    public function delete(User $user):bool{

    }
    public function getOne(int $id){
        $sth = $this->_db->prepare("SELECT id, nom, `force`, degats, niveau, experience FROM personnages Where id =? ");
        $sth->execute(array($id));
        $ligne = $sth->fetch();

        $perso = new Personnage($ligne);
        return $perso;

    }
    public function getList():array{

        $listeDePersonnage = array();
        // retourne la liste de tous les perosnnages 
        $request = $this->_db->query('SELECT id, nom, `force`, degats, niveau, experience FROM personnages; ');

        while ($ligne = $request->fetch(PDO::FETCH_ASSOC))// Chauqe entrée seta recuoerer
        {
            // On passe les donnés (stock"s dans un tableau) concernant le personnae

            $perso= new Personnage($ligne);
            $listeDePersonnage[] = $perso; // Ajouter personnage au tableau 
          
        }
        return $listeDePersonnage;

    }
    
}




?>