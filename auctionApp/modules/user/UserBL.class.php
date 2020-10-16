<?php
include_once ("modules/classes/Validation.class.php");
include_once ("modules/classes/ValidationRegister.class.php");
include_once ("modules/classes/ValidationUpdateUser.class.php");
include_once ("db/classes/user/RegistrationCredentialsRequest.class.php");
include_once ("db/classes/user/UpdateUserInformationRequest.class.php");
include_once ("db/classes/user/LoginRequest.class.php");
include_once ("db/modules/user/UserDal.class.php");
include_once("modules/classes/user/User.class.php");
class UserBL
{
    private $email;
    private $password;
    private $regName;
    private $regLastName;
    private $regEmail;
    private $regPassword;
    private $regRePassword;
    private $updateName;
    private $updateLastName;
    private $updateEmail;
    private $updatePassword;
    private $updateRePassword;
    public function loginUser ()
    {
        
        if (isset($_POST["login-submit"],$_POST["email"],$_POST["password"]))
        {
            
            $this->email = trim($_POST["email"]);
            $this->password = trim($_POST["password"]);
            $validation = new Validation($this->email,$this->password);
            
            
            if ($validation->validateCredientials())
            {
                $this->email = $validation->getEmail();
                $this->password = $validation->getpassword();
                
                $loginRequestCredentials = new LoginRequest($this->email,$this->password);
                
                $userDal = new UserDal();
                $result = $userDal->checkCredentials($loginRequestCredentials);
               
                
                 if  (isset($result)) {
                
                $user = new User($result->getUserID(),$result->getUserName(),$result->getUserLastName(),$result->getUserEmail(),$result->getUserStatus());
                
                $_SESSION["login"] = $user;
                 }
                else {
                    
                      echo "<div class='alert alert-danger'>
                          <strong>Podaci za logovanje nisu ispravni!</strong> 
                     </div>";
                    
                }
            }
            
            
        }
        
    }
    
    
    public function RegisterUser()
    {
        
        if (isset($_POST["submit"],$_POST["name"],$_POST["lastName"],$_POST["email"],$_POST["password"],$_POST["rePassword"]))
        {
            
            $this->regName =trim($_POST["name"]);
             $this->regLastName = trim($_POST["lastName"]);
            $this->regEmail = trim($_POST["email"]);
            $this->regPassword = trim($_POST["password"]);
            $this->regRePassword = trim($_POST["rePassword"]);
            
            $validationRegister = new ValidationRegister($this->regName,$this->regLastName,$this->regEmail,$this->regPassword,$this->regRePassword);
            
            if($validationRegister->validateRegisterCredientials())
            {
             
             $this->regName =$validationRegister->getRegistrationName();
             $this->regLastName = $validationRegister->getRegistrationLastName();
             $this->regEmail = $validationRegister->getRegistrationEmail();
             $this->regPassword = $validationRegister->getRegistrationPassword();
                
                
             $RegistrationCredentialsRequest = new RegistrationCredentialsRequest($this->regName,$this->regLastName,$this->regEmail,$this->regPassword);
             
             $userDal = new UserDal();
             $result=$userDal->registerUser($RegistrationCredentialsRequest);
               
             if ($result["affectedRows"] === 1)
             {
                 
                 echo "<div class='alert alert-success'>
                          <strong>Uspecno ste se registrovali!</strong> 
                     </div>";
                 
             }
                
                else 
                {
                    
                   echo "<div class='alert alert-danger'>
                          <strong>Doslo je do greske prilikom registracije!</strong> 
                     </div>";
                }
             
            
         
                
            }
            
            
            
        }
        
        
        
    }
    
    public function updateUserInformation ($userID)
    {
        
        if (isset($_POST["submit"],$_POST["updateName"],$_POST["updateLastName"],$_POST["updateEmail"],$_POST["updatePassword"],$_POST["updateRePassword"]))
        {
            
            
            $this->updateName =trim($_POST["updateName"]);
             $this->updateLastName = trim($_POST["updateLastName"]);
            $this->updateEmail = trim($_POST["updateEmail"]);
            $this->updatePassword = trim($_POST["updatePassword"]);
            $this->updateRePassword = trim($_POST["updateRePassword"]);
            
            $validationUpdateUser = new ValidationUpdateUser($this->updateName,$this->updateLastName,$this->updateEmail,$this->updatePassword,$this->updateRePassword);
            
            if($validationUpdateUser->updateRegisterCredientials())
            {
             
             $this->updateName =$validationUpdateUser->getUpdateName();
             $this->updateLastName = $validationUpdateUser->getUpdateLastName();
             $this->updateEmail = $validationUpdateUser->getUpdateEmail();
             $this->updatePassword = $validationUpdateUser->getUpdatePassword();
                
                $updateUserInformationRequest = new UpdateUserInformationRequest($this->updateName,$this->updateLastName,$this->updateEmail,$this->updatePassword);
                
                $userDal = new UserDal();
                $result=$userDal->updateUser($updateUserInformationRequest,$userID);
                
                if ($result["affectedRows"] === 1)
             {
                 
                 echo "<div class='alert alert-success'>
                          <strong>Uspecno ste izmenili podatke!</strong> 
                     </div>";
                    
                    
                         
                         
                     
                 
             }
                
                else 
                {
                    
                   echo "<div class='alert alert-danger'>
                          <strong>Doslo je do greske prilikom Izmene!</strong> 
                     </div>";
                }
        
        
    }
    
   
    
}
    }
    
     public function LogoutUser ()
      {
        if (isset($_SESSION["login"]))
        {
            unset($_SESSION["login"]);
            session_destroy();
        }
    }
    
    
}
?>






