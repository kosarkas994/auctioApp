<?php
include_once("db/Db.class.php");
include_once ("db/classes/user/LoginResponse.class.php");

class UserDal
{
    
    public function registerUser($registrationUserCredentials)
    {
        
        
        $query = "INSERT INTO KORISNIK  
                (`EMAIL`,`IME`,`PREZIME`,`PASSWORD`) 
                VALUES 
                (?,?,?,?) ";
        $params = array($registrationUserCredentials->getRegistrationEmail(),$registrationUserCredentials->getRegistrationName(),$registrationUserCredentials->getRegistrationLastName(),$registrationUserCredentials->getRegistrationPassword());
        $db = new Db();
        $result = $db->insert($query,$params);
        return $result;
    }
    
    public function checkCredentials ($loginCredentials)
    {
       
        $query = "SELECT 
                  `IDKORISNIK`,
                  `EMAIL`,
                  `IME`,
                  `PREZIME`,
                  `PASSWORD`,
                  `KORISNIK_STATUS`
                  FROM KORISNIK K
                  WHERE
                  K.`EMAIL`=?
                  ";
        $params = array ($loginCredentials->getLoginEmail());
       
        $db = new Db();
        $result = $db->select($query,$params);
         
         if ($result["affectedRows"] === 1)
         {      
            
             if(password_verify($loginCredentials->getLoginPassword(),$result["data"][0]["PASSWORD"]))
             {
                 
                 
                 $loginResponse = new LoginResponse(
                                                    $result["data"][0]["IDKORISNIK"],
                     
                                                    $result["data"][0]["EMAIL"],
                                                    $result["data"][0]["IME"],
                                                    $result["data"][0]["PREZIME"],
                                                    $result["data"][0]["KORISNIK_STATUS"]);
                 
                 return $loginResponse; 
                 
             }
             
         }
         
         
             
             
         
    }
    
    
    public function updateUser ($updateUserInformation,$userID) 
            
    {
        
        $query = "UPDATE KORISNIK K  
                SET 
                EMAIL=?,
                IME=?,
                PREZIME=?,
                PASSWORD=?
                WHERE 
                K.IDKORISNIK=?
                 ";
        $params = array($updateUserInformation->getUpdateEmail(),$updateUserInformation->getUpdateName(),$updateUserInformation->getUpdateLastName(),$updateUserInformation->getUpdatePassword(),$userID);
        $db = new Db();
        $result = $db->insert($query,$params);
        return $result;
    }
        
    }
    
    





?>