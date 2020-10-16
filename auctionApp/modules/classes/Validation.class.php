<?php
class Validation
{  
    private static $validate = false;
    private static $password;
    private static $email;
    public  function __construct($email,$password)
    {
        
        self::$email = $email;
        self::$password = $password;
        
    }
    public function validateCredientials() 
   {
        
       
       if ( self::$email != "" && self::$password !="")
       {   
       
           if (filter_var(self::$email,FILTER_VALIDATE_EMAIL))
               
           {   
               if (strlen(self::$password) >= 6)
               {
                   self::$email = htmlspecialchars(self::$email); 
                   self::$password =htmlspecialchars(self::$password);
                   //self::$password = self::passwordHash(self::$password);
                   self::$validate = true;
                   return self::$validate;
                   
                   
               }
               
               else
               {
                   
                   echo "<div style='color:red; font-weight:bold;' class='form-group'>
										<div class='row'>
											<div class='col-sm-6 col-sm-offset-3'>
												<p>Lozinka mora imati bar 6 karaktera! </p>
											</div>
										</div>
									</div>";
               }
           
               
           }
           
           else
           {
               
               echo "<div style='color:red; font-weight:bold;' class='form-group'>
										<div class='row'>
											<div class='col-sm-6 col-sm-offset-3'>
												<p>Unesite email u odgovarajucem formatu! </p>
											</div>
										</div>
									</div>";
           }
           
       }
       
       else
       {
          echo "<div style='color:red; font-weight:bold;' class='form-group'>
										<div class='row'>
											<div class='col-sm-6 col-sm-offset-3'>
												<p>Email i lozinka su obavezna polja! </p>
											</div>
										</div>
									</div>";
       }
           
           
    
       
   }
    
    public static function passwordHash($password)
    {
      $password = password_hash($password, PASSWORD_DEFAULT);
        return $password;
        
    }
    
    public function getEmail()
    {
        
        return self::$email;
    }
    
    public function getPassword()
    {
        
        return self::$password;
    }
    
    
    
}
?>