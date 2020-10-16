<?php
require_once ("db/util.php");
class Db
{
    private static $dbHost;
    private static $dbUser;
    private static $dbPass;
    private static $dbName;
    private static $conn;
    private static $type;
    private static $params;
    
     private static function openConnection($dbHost,$dbUser,$dbPass,$dbName)
     {
         self::$dbHost = $dbHost;
         self::$dbUser = $dbUser;
         self::$dbPass = $dbPass;
         self::$dbName = $dbName;
         
         self::$conn = new mysqli(self::$dbHost,self::$dbUser,self::$dbPass,self::$dbName);
         
          if (!self::$conn ->connect_error)
          {
              return self::$conn;
          }
         
         else 
         {
             $error["errorCode"] = self::$conn ->connect_errno;
             $error["errorDescription"] = self::$conn ->connect_error; 
         }
     }
    
    private static function closeConnection()
    {
        self::$conn->close();
    }
    
    public function select($query,$params)
    {
        self::$params = $params; 
        
        self::openConnection(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        $resultDb = self::$conn ->prepare($query);
        if (count(self::$params) > 0)
        {
            self::$type = str_repeat("s",count(self::$params));
            $resultDb->bind_param(self::$type, ... self::$params);
        }
        
        $resultDb->execute();
        $results = $resultDb->get_result();
        $result["affectedRows"] = -1;
        if (self::$conn->error)
        {
            $result["DbErrorCode"] = self::$conn->errno;
            $result["DbErrorDescription"] = self::$conn->error;
        }
        
        else 
        {   
             $result["affectedRows"] = self::$conn->affected_rows;
            while ($row = $results->fetch_assoc())
            {
                
                $result["data"][] = $row;
            }
        }
        
        self::CloseConnection();
        
        if (!isset($result))
        {
            $result["error"]["number"] = -1;
            $result["error"]["description"] = "Result is not set!";
        }
      
        return $result;
            
            
        }
    
    public function update ($query,$params)
    {
        self::$params = $params; 
        
        self::openConnection(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        $resultDb = self::$conn ->prepare($query);
        if (count(self::$params) > 0)
        {
            self::$type = str_repeat("s",count(self::$params));
            $resultDb->bind_param(self::$type, ... self::$params);
        }
        
        $resultDb->execute();
        $results = $resultDb->get_results();
        $result["affectedRows"] = -1;
        if (self::$conn->error)
        {
            $result["DbErrorCode"] = self::$conn->errno;
            $result["DbErrorDescription"] = self::$conn->error;
        }
        
        else 
        {   
             $result["affectedRows"] = self::$conn->affected_rows;
            
        }
        
        self::CloseConnection();
        
        if (!isset($result))
        {
            $result["error"]["number"] = -1;
            $result["error"]["description"] = "Result is not set!";
        }
        
        return $result;
            
            
        }
    
    public function insert($query,$params)
    {
        self::$params = $params; 
        
        self::openConnection(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        $resultDb = self::$conn ->prepare($query);
        if (count(self::$params) > 0)
        {
            self::$type = str_repeat("s",count(self::$params));
            $resultDb->bind_param(self::$type, ... self::$params);
        }
        
        $resultDb->execute();
        
        $result["affectedRows"] = -1;
        if (self::$conn->error)
        {
            $result["DbErrorCode"] = self::$conn->errno;
            $result["DbErrorDescription"] = self::$conn->error;
        }
        
        else 
        {   
             $result["affectedRows"] = self::$conn->affected_rows;
            
        }
        
        self::CloseConnection();
        
        if (!isset($result))
        {
            $result["error"]["number"] = -1;
            $result["error"]["description"] = "Result is not set!";
        }
        
        return $result;
            
            
        }
    
    public function delete($query,$params)
    {
        self::$params = $params; 
        
        self::openConnection(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        $resultDb = self::$conn ->prepare($query);
        if (count(self::$params) > 0)
        {
            self::$type = str_repeat("s",count(self::$params));
            $resultDb->bind_param(self::$type, ... self::$params);
        }
        
        $resultDb->execute();
        $result["affectedRows"] = -1;
        if (self::$conn->error)
        {
            $result["DbErrorCode"] = self::$conn->errno;
            $result["DbErrorDescription"] = self::$conn->error;
        }
        
        else 
        {   
             $result["affectedRows"] = self::$conn->affected_rows;
            
        }
        
        self::CloseConnection();
        
        if (!isset($result))
        {
            $result["error"]["number"] = -1;
            $result["error"]["description"] = "Result is not set!";
        }
        
        return $result;
            
            
        }
    
    
}

?>