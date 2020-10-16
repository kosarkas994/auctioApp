<?php
class AddProductRequest
{
   private $productName;
   private $productDescription;
   private $productStartPrice;
   private $currentTime;
   private $expirationTime;
   private $productCategory;
   private $productImagePath;
   private $userID;
   private $userEmail;
    
    public function __construct ($name,$description,$startPrice,$currentTime,$expirationTime,$category,$imagePath,$userID,$userEmail)
    {
        
        $this->productName = $name;
        $this->productDescription = $description;
        $this->productStartPrice = $startPrice;
        $this->currentTime = $currentTime;
        $this->expirationTime = $expirationTime;
        $this->productCategory  = $category;
        $this->productImagePath = $imagePath;
        $this->userID=$userID;
        $this->userEmail=$userEmail;
    }
    
    public function getProductName()
    {
        
        return $this->productName;
    }
    
    public function getProductDescription()
    {
        
        return $this->productDescription;
    }
    
    public function getProductStartPrice()
    {
        
        return $this->productStartPrice;
    }
    
    public function getProductCategory()
    {
        
        return $this->productCategory;
    }
    public function getProductImagePath()
    {
        
        return $this->productImagePath;
    }
    
    public function getProductUserID()
    {
        
        return $this->userID;
    }
    
    public function getProductUserEmail()
    {
        
        return $this->userEmail;
    }
    
     public function getCurrentTime()
    {
        
        return $this->currentTime;
    }
    
     public function getExpirationTime()
    {
        
        return $this->expirationTime;
    }
    
    
    
    
    
    
    
    
}




?>