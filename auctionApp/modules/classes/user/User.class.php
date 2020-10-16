<?php

class User 
{   private $userID;
    private $userName;
    private $userLastName;
    private $userEmail;
    private $userStatus;
    
    public function __construct ($userID,$userName,$userLastName,$userEmail,$userStatus)
    {
        $this->userID = $userID;
        $this->userName = $userName;
        $this->userLastName = $userLastName;
        $this->userEmail = $userEmail;
        $this->userStatus = $userStatus;
    }
    
    
    public function GetUserName ()
    {
        
        return $this->userName;
    }
    
    public function GetUserLastName ()
    {
        
        return $this->userLastName;
    }
    
    public function GetUserEmail ()
    {
        
        return $this->userEmail;
    }
    
    public function GetUserStatus ()
    {
        
        return $this->userStatus;
    }
 
 public function getUserID ()
    {
        
        return $this->userID;
    }
    
}



?>