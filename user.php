<?php

class User{
    private $_email;
    private $_password;

    /**
     * Get the value of _password
     */
    public function get_password()
    {
        return $this->_password;
    }

    /**
     * Set the value of _password
     */
    public function set_password($_password): self
    {
        $this->_password = $_password;

        return $this;
    }

    /**
     * Get the value of _email
     */
    public function get_email()
    {
        return $this->_email;
    }

    /**
     * Set the value of _email
     */
    public function set_email($_email): self
    {
        $this->_email = $_email;

        return $this;
    }
}
