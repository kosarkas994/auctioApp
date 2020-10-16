<?php
class LoginRequest
{
    
    private $email;
    private $password;
    
    public function __construct ($email,$password)
    {
        $this->email = $email;
        $this->password = $password;
    }
    
    public function getLoginEmail ()
    {
        
        return $this->email;
    }
    
    public function getLoginPassword ()
    {
        
        return $this->password;
    }
       
        
    
    
    
}



?>