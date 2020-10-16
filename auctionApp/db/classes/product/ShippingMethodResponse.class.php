<?php
class ShippingMethodResponse 
    
{
    private $shippingMethods;
    
    public function __construct($shippingMethods)
    {
        
      $this->shippingMethods = $shippingMethods;
        
    }
    
    public function getAllShippingMethods()
    {
        
        
        return $this->shippingMethods;
    }
    
    
    
}


?>