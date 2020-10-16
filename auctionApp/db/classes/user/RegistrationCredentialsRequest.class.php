<?php
class RegistrationCredentialsRequest 
{
    
    private $name;
    private $lastName;
    private $email;
    private $password;
    
    public function __construct($name,$lastName,$email,$password)
        
    {
      $this->name = $name;
      $this->lastName = $lastName;
      $this->email =$email;
      $this->password = $password; 
        
        
    }
    
    public function getRegistrationName() 
    {
        
        
        return $this->name;
    }
    
     public function getRegistrationLastName() 
    {
        
        
        return $this->lastName;
    }
    
     public function getRegistrationEmail() 
    {
        
        
        return $this->email;
    }
    
     public function getRegistrationPassword() 
    {
        
        
        return $this->password;
    }
    
    
    
    
}



?>