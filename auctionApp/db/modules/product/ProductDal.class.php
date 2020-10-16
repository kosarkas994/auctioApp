<?php
include_once("db/Db.class.php");
include_once("db/classes/product/GetAllProductsResponse.class.php");
include_once("db/classes/product/PaymentmethodResponse.class.php");
include_once("db/classes/product/ShippingMethodResponse.class.php");
class ProductDal 
{
    private static $productStatus = 1;
    
    public function getCategoryFromDataBase ()
    {
        $query = "SELECT 
                 `IDPROIZVOD_KATEGORIJA`,
                 `NAZIV`
                  FROM 
                  PROIZVOD_KATEGORIJA";
        
        $params = array ();
        
        $db = new Db();
        $result = $db->select($query,$params);
        
        if ($result["affectedRows"] >= 1)
        {
            
            return $result;
            
        }
    }
    
    public function getProductShippingMethodsFromDataBase()
    {
        
        $query = "SELECT 
                 `IDDOSTAVA`,
                  `NAZIV`,
                  `OPIS`
                  FROM 
                  DOSTAVA";
        
        $params = array ();
        
        $db = new Db();
        $result = $db->select($query,$params);
        
        if ($result["affectedRows"] >= 1)
        {
            
            $shippingMethod = new ShippingMethodResponse($result);
            
            return $shippingMethod;
            
        }
        
    }
    
    public function getProductPaymentMethodsFromDataBase()
    {
        
        $query = "SELECT 
                 `IDNACIN_PLACANJA`,
                  `NAZIV`,
                  `OPIS`
                  FROM 
                  NACIN_PLACANJA";
        
        $params = array ();
        
        $db = new Db();
        $result = $db->select($query,$params);
        
        if ($result["affectedRows"] >= 1)
        {
            
            $paymentMethod = new PaymentMethodResponse($result);
            
            return $paymentMethod;
            
        }
        
    }
     public function addProductDataBase ($addProductRequest) 
     {
         
         $query = "INSERT INTO PROIZVOD
                   (`OPIS`,
                   `NAZIV`
                   ,`POCETNACENA`,
                   `VREMEPONUDE`,
                   `VREMEISTEKAPONUDE`,
                   `SLIKA`,
                   `ID_PROIZVODKATEGORIJA`,
                   `PROIZVOD_STATUS`,
                   `IDKORISNIK`,
                   `KORISNIK_EMAIL`)
                   VALUES
                   (?,?,?,?,?,?,?,?,?,?)";
        $userID=$addProductRequest->getProductUserID();
        $userEmail=$addProductRequest->getProductUserEmail();
         
         $params = array ($addProductRequest->getProductDescription(),$addProductRequest->getProductName(),$addProductRequest->getProductStartPrice(),$addProductRequest->getCurrentTime(),$addProductRequest->getExpirationTime(),$addProductRequest->getProductImagePath(),$addProductRequest->getProductCategory(),self::$productStatus,$userID,$userEmail);
       
        $db = new Db();
        $result = $db->insert($query,$params);
         
         if ($result["affectedRows"] >= 1)
        {
            
            return $result;
            
        }
         
     }
    
    public function getAllProductsFromDataBase()
    {
        
        $query = "SELECT 
                  `IDPROIZVOD`,
                   `OPIS`,
                   `NAZIV`,
                    `POCETNACENA`,
                     `VREMEPONUDE`,
                     `VREMEISTEKAPONUDE`,
                    `SLIKA`,
                     PROIZVOD_STATUS,
                     ID_PROIZVODKATEGORIJA,
                     IDKORISNIK,
                     KORISNIK_EMAIL
                     FROM
                     PROIZVOD";
        
        $params = array ();
        
        $db = new Db();
        $result = $db->select($query,$params);
        
        if ($result["affectedRows"] >= 1)
        {
            
            $getAllProducts = new GetAllProducts($result);
            
            return $getAllProducts;
            
        }
        
    }
    
    public function getProductByIDFromDataBase($IDProduct)
    {
        
        $query = "SELECT 
                  `IDPROIZVOD`,
                   `OPIS`,
                   `NAZIV`,
                    `POCETNACENA`,
                    `VREMEISTEKAPONUDE`,
                    `SLIKA`,
                     PROIZVOD_STATUS,
                     ID_PROIZVODKATEGORIJA,
                     IDKORISNIK,
                     KORISNIK_EMAIL
                     FROM
                     PROIZVOD P
                     WHERE 
                     P.`IDPROIZVOD` = ?";
        
        $params = array ($IDProduct);
        
        $db = new Db();
        $result = $db->select($query,$params);
        
        if ($result["affectedRows"] >= 1)
            
        {    //Vracam niz proizvoda direktno do biznis logike a mogu sam da napravim i klasu koja povezuje biznis logiku sa DAL klasom.
            return $result;
            
        }
    }
    
    
    public function getProductByUserIDFromDataBase($userID)
    {
        
        $query = "SELECT 
                  `IDPROIZVOD`,
                   `OPIS`,
                   `NAZIV`,
                    `POCETNACENA`,
                    `VREMEISTEKAPONUDE`,
                    `SLIKA`,
                     PROIZVOD_STATUS,
                     ID_PROIZVODKATEGORIJA,
                     IDKORISNIK,
                     KORISNIK_EMAIL
                     FROM
                     PROIZVOD P
                     WHERE 
                     P.`IDKORISNIK` = ?";
        
        $params = array ($userID);
        
        $db = new Db();
        $result = $db->select($query,$params);
        
        if ($result["affectedRows"] >= 1)
            
        {    //Vracam niz proizvoda direktno do biznis logike a mogu sam da napravim i klasu koja povezuje biznis logiku sa DAL klasom.
            return $result;
            
        }
    }
    
    public function getProductByCategoryFromDataBase ($category)
    {
        $query = " SELECT 
                  P.`IDPROIZVOD`,
                   P.`OPIS`,
                   P.`NAZIV`,
                    P.`POCETNACENA`,
                    P.`VREMEISTEKAPONUDE`,
                    P.`SLIKA`,
                     P.`PROIZVOD_STATUS`,
                     P.`ID_PROIZVODKATEGORIJA`,
                     P.`IDKORISNIK`,
                     P.`KORISNIK_EMAIL`
                     FROM
                     `PROIZVOD` P
                     JOIN PROIZVOD_KATEGORIJA PR
                     ON P.`ID_PROIZVODKATEGORIJA` = PR .`IDPROIZVOD_KATEGORIJA`
                     WHERE PR.`NAZIV` =?";
        
        $params = array ($category);
        
        $db = new Db();
        $result = $db->select($query,$params);
        
        if ($result["affectedRows"] >= 1)
            
        {    //Vracam niz proizvoda direktno do biznis logike a mogu sam da napravim i klasu koja povezuje biznis logiku sa DAL klasom.
            return $result;
            
        }
        
    }
    
    
     
    
    
    
    
    
}



?>