<?php
class ValidationAddProduct
{  
    private static $validate = false;
    private static $name;
    private static $description;
    private static $startPrice;
    public  function __construct($name,$description,$startPrice)
    {
        self::$name = $name;
        self::$description = $description;
        self::$startPrice = $startPrice;
        
        
        
        
    }
    public function validateProductInformation() 
   {
        
       
       if ( self::$name!= "" &&  self::$description !="" && self::$startPrice != "")
       {   
       
           if (filter_var(self::$startPrice,FILTER_VALIDATE_INT))
               
           {   
               
               
                   
                   
                   self::$name = htmlspecialchars(self::$name);
                   self::$description = htmlspecialchars(self::$description);    
                   self::$startPrice = htmlspecialchars(self::$startPrice); 
                   self::$validate = true;
                   return self::$validate; 
               
                 }
               
               
           
               
           
           
           else
           {
               
               echo  "<div class='alert alert-warning'>
                          <strong>Cena mora biti numericka vrednost!</strong> 
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
   

    
    
    
    
    public function getProductName()
    {
        
        return self::$name;
    }
    
    public function getProductDescription()
    {
        
        return self::$description;
    }
    
    public function getProductStartPrice()
    {
        
        return self::$startPrice;
    }
    
    
    
    
    
}
?>