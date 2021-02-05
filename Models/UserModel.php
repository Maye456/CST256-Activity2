<?php
namespace App\Models;

class UserModel
{
    private $username;
    private $password;
    
    // Class Constructor
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    
    /**
     * 
     * Getter Method -> username
     */
    public function getUsername()
    {
        return $this->username;
    }
    
    /**
     * 
     * Getter Method -> password
     */
    public function getPassword()
    {
        return $this->password;
    }
}