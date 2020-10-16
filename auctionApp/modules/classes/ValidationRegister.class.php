<?php
class ValidationRegister
{  
    private static $validate = false;
    private static $name;
    private static $lastName;
    private static $password;
    private static $rePassword;
    private static $email;
    public  function __construct($name,$lastName,$email,$password,$repassword)
    {
        self::$name = $name;
        self::$lastName = $lastName;
        self::$email = $email;
        self::$password = $password;
        self::$rePassword = $repassword;
        
        
        
    }
    public function validateRegisterCredientials() 
   {
        
       
       if ( self::$name!= "" && self::$lastName !="" && self::$email != "" && self::$password != "" && self::$rePassword != "" )
       {   
       
           if (filter_var(self::$email,FILTER_VALIDATE_EMAIL))
               
           {   
               if (strlen(self::$password) >= 6)
               {
                   if (self::$password === self::$rePassword)
                   {
                   self::$name = htmlspecialchars(self::$name);
                   self::$lastName = htmlspecialchars(self::$lastName);    
                   self::$email = htmlspecialchars(self::$email); 
                   self::$password =htmlspecialchars(self::$password);
                   self::$password = self::passwordHash(self::$password);
                   self::$validate = true;
                   return self::$validate; 
                   }
                   
                   else 
                   {
                       
                       echo  "<div class='alert alert-warning'>
                          <strong>Lozinka se mora poklapati sa potvrdom lozinke!</strong> 
                     </div>";
                       
                   }
                   
                   
                   
               }
               
               else
               {
                   
                   echo   "<div class='alert alert-warning'>
                          <strong>Lozinka mora imati bar 6 karaktera!</strong> 
                     </div>";
               }
           
               
           }
           
           else
           {
               
               echo  "<div class='alert alert-warning'>
                          <strong>Email mora biti u odgovarajucem formatu!</strong> 
                     </div>";
										
											
												
										
										
									
           }
           
       }
       
       else
       {
          echo  "<div class='alert alert-warning'>
                          <strong>Sva polja su obavezna!</strong> 
                     </div>";
       }
           
           
    
       
   }
    
    public static function passwordHash($password)
    {
      $password = password_hash($password,PASSWORD_DEFAULT);
        return $password;
        
    }
    
    
    public function getRegistrationName()
    {
        
        return self::$name;
    }
    
    public function getRegistrationLastName()
    {
        
        return self::$lastName;
    }
    
    public function getRegistrationEmail()
    {
        
        return self::$email;
    }
    
    public function getRegistrationPassword()
    {
        
        return self::$password;
    }
    
    
    
}
?>