<?php
class UpdateUserInformationRequest 
{
    
    private $updateName;
    private $updateLastName;
    private $updateEmail;
    private $updatePassword;
    
    public function __construct($updateName,$updateLastName,$updateEmail,$updatePassword)
        
    {
      $this->updateName = $updateName;
      $this->updateLastName = $updateLastName;
      $this->updateEmail =$updateEmail;
      $this->updatePassword = $updatePassword; 
        
        
    }
    
    public function getUpdateName() 
    {
        
        
        return $this->updateName;
    }
    
     public function getUpdateLastName() 
    {
        
        
        return $this->updateLastName;
    }
    
     public function getUpdateEmail() 
    {
        
        
        return $this->updateEmail;
    }
    
     public function getUpdatePassword() 
    {
        
        
        return $this->updatePassword;
    }
    
    
    
    
}