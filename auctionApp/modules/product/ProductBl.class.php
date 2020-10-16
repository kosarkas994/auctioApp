<?php
include_once ("db/modules/product/ProductDal.class.php");
include_once ("modules/classes/ValidationAddProduct.class.php");
include_once("db/classes/product/AddProductRequest.class.php");
include_once ("modules/classes/UploadPicture.class.php");
class ProductBl
    
{
    private $name;
    private $description;
    private $startPrice;
    private $paymentMethod;
    private $deliveryMethod;
    private $category;
    
    
    public function getProductCategory ()
    {
        
        $productDal = new ProductDal();
        $category=$productDal->getCategoryFromDataBase();
        return $category;
        
    }
    
    public function getProductShippingMethods()
    {
        
        $productDal = new ProductDal();
        $shippingMethods = $productDal->getProductShippingMethodsFromDataBase();
        
        if (isset( $shippingMethods))
        {
           return $shippingMethods->getAllShippingMethods();
            
        }
        
         
         
             
            
         
    }
    
    
    public function getProductPaymentMethods()
    {
        
        $productDal = new ProductDal();
         $paymentMethods = $productDal->getProductPaymentMethodsFromDataBase();
        if (isset($paymentMethods))
        {
            return  $paymentMethods->getAllPaymentMethods();
        }
         
        
    }
    
    public function addProduct($userID,$userEmail)
    {
       if(isset($_POST["submit"],$_POST["productName"],$_POST["productDescription"],$_POST["startPrice"],$_POST["category"]))
        {
            $this->category = $_POST["category"]; 
            $this->name = $_POST["productName"];
            $this->description=$_POST["productDescription"];
            $this->startPrice= $_POST["startPrice"];
            $this->category = $_POST["category"];
            
            if ($this->category!=-1)
            {
            $validationAddProduct = new ValidationAddProduct($this->name,$this->description,$this->startPrice);
            if($validationAddProduct->validateProductInformation())
            {
                
                $this->name = $validationAddProduct->getProductName();
                $this->description = $validationAddProduct->getProductDescription();
                $this->startPrice =$validationAddProduct->getProductStartPrice();
                //Vreme trenutno na serveru kada se postavi proizvod
                $currentTime = date_create()->format('Y-m-d H:i:s');
                
                $ExpirationTime = $this->addDaysToDate($currentTime,10);
                
                $uploadPicture = new UploadPicture();
                $picturePath=$uploadPicture->PictureUpload();
                
                if ($uploadPicture->isPictureUpload())
                {
                
                $addProductRequest = new AddProductRequest($this->name,$this->description,$this->startPrice,$currentTime,$ExpirationTime,$this->category,$picturePath,$userID,$userEmail);
                $productDal = new ProductDal();
                $result = $productDal->AddProductDataBase($addProductRequest);
                    
                    if($result["affectedRows"] > 0) 
                    {
                       echo "<div class='alert alert-success'>
                          <strong>Uspecno ste dodali proizvod!</strong> 
                     </div>";
                    }
           
           
              else 
              {
                  
                  echo "<div class='alert alert-danger'>
                          <strong>Doslo je do greske prilikom dodavanja proizvoda!</strong> 
                     </div>";
                }
              }
           
                    
                    
                }
            }
           else {
            
            echo "<div class='alert alert-danger'>
                          <strong>Kategorija je obavezno polje!</strong> 
                     </div>";
            
        }
       }
        
        
       }
    
     public function getAllProducts ()
     {
         
          $productDal = new ProductDal();
          $productsResult=$productDal->getAllProductsFromDataBase();
          return  $productsResult->GetProducts();
         
     }
    
    public function getProductByID($IDProduct)
    {
        $productDal = new ProductDal();
        $productsResult=$productDal->getProductByIDFromDataBase($IDProduct);
        
        if ($productsResult["affectedRows"] > 0) 
        {
            
            return $productsResult;
        }
        
    }
    
    public function getProductByUserID($userID)
    {
        $productDal = new ProductDal();
        $productsResult=$productDal->getProductByUserIDFromDataBase($userID);
        
        if ($productsResult != array()) 
        {
            
            return $productsResult;
        }
        
    }
    
    public function getProductByCategory ()
    {
        
        $productDal = new ProductDal();
        $category = $this->getProductCategory();
        for ($i=0; $i<count($category["data"]);$i++)
        {
        $productsResult['CATEGORY'][]=$productDal->getProductByCategoryFromDataBase($category["data"][$i]["NAZIV"]);
        }
        if (isset($productsResult))
        {
            
            return $productsResult;
        }
        
    }
    
    
    
    
    
    
    
    
    public function addDaysToDate($date,$days){

    $date = strtotime("+".$days." days", strtotime($date));
    return  date('Y-m-d H:i:s', $date);

}
        
    }
    







?>