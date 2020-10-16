<?php

class GetAllProducts
{
    
    private $products;
    
    public function __construct($product) 
    {
        
        $this->products = $product;
    }
    
    public function GetProducts ()
    {
        
        return $this->products;
    }
    
}





?>