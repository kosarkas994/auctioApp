<?php
class LoginResponse 
{
    private $userID;
    private $email;
    private $name;
    private $lastName;
    private $userStatus;
    
    public function __construct($userID,$email,$name,$lastName,$userStatus) 
    {
        $this->userID = $userID;
        $this->email = $email; 
        $this->name = $name;
        $this->lastName =$lastName;
        $this->userStatus =$userStatus;
        
    }
    
    
    public function getUserEmail ()
    {
        
        return  $this->email;
    }
    
    public function getUserName ()
    {
        
        return  $this->name;
    }
    
    public function getUserLastName ()
    {
        
        return  $this->lastName;
    }
    
    public function getUserStatus ()
    {
        
        return  $this->userStatus;
    }
    
    public function getUserID ()
    {
        
        return  $this->userID;
    }
}



?>