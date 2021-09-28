<?php

class User{
    private $_id;
    private $_email;
    private $_password;
    private $_role;


    public function __construct (array $ligne)// Constructeur demande 3 parametres 
    {
        $this->hydrate($ligne);
        

    } 

    public function hydrate(array $ligne)
    {
        foreach( $ligne as $key => $value)
        {
          $method =  'set'.ucfirst($key)  ;
          if (method_exists($this, $method))
          {
              $this->$method($value);
          }
        }
    }
    /**
     * Get the value of _password
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * Set the value of _password
     */
    public function setPassword($_password): self
    {
        $this->_password = password_hash($_password ,PASSWORD_BCRYPT);

        return $this;
    }

    /**
     * Get the value of _email
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * Set the value of _email
     */
    public function setEmail($_email): self
    {
        $this->_email = $_email;

        return $this;
    }

    /**
     * Get the value of _role
     */
    public function getRole()
    {
        return $this->_role;
    }

    /**
     * Set the value of _role
     */
    public function setRole($_role): self
    {
        $this->_role = $_role;

        return $this;
    }

    /**
     * Get the value of _id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set the value of _id
     */
    public function setId($_id): self
    {
        $this->_id = $_id;

        return $this;
    }
}
