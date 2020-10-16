<?php

include_once ("db/Db.class.php");

class AuctionDal  
{
    
    
    public function SaveAuctionOffer ($auctionOfferRequest)
    {
        $query = "INSERT INTO AUKCIJA
                  (`PONUDA`
                  ,`IDPROIZVOD`
                  ,`IDKORISNIK`
                  ,`KORISNIK_EMAIL`
                  ,`IDNACIN_PLACANJA`
                  ,`IDDOSTAVA`)
                  VALUES
                  (?,?,?,?,?,?)";
        $params = array($auctionOfferRequest->getOffer(), $auctionOfferRequest->getIdProduct(),$auctionOfferRequest->getIdUser(),$auctionOfferRequest->getUserEmail(),$auctionOfferRequest->getShippingMethod (),$auctionOfferRequest->getPaymentMethod ());
        $db = new Db();
        $result = $db->insert($query,$params);
         
         if ($result["affectedRows"] >= 1)
        {
            
            return $result;
            
        }
        
    }
    
    
    public function getAuctionOffer ($userID)
    {
       $query = 
       "SELECT 
       A.`IDAUKCIJA`,
       A.`PONUDA`,
       A.`IDPROIZVOD`,
	   P.`NAZIV` AS NAZIVPROIZVODA,
       P.`VREMEISTEKAPONUDE`,
       P.`PROIZVOD_STATUS`,
       K.`IME` AS IMEKORISNIKA,
       K.`PREZIME` AS PREZIMEKORISNIKA,
       K.`EMAIL` AS EMAILKORISNIKA,
       D.`NAZIV` AS NACINDOSTAVE,
       N.`NAZIV` AS NACINPLACANJA
       FROM
       `AUKCIJA` A JOIN PROIZVOD P ON A.`IDPROIZVOD` = P.`IDPROIZVOD` 
        JOIN `KORISNIK` K ON  A.`IDKORISNIK` = K.`IDKORISNIK`
        JOIN `DOSTAVA`  D ON  A.`IDDOSTAVA` =  D.`IDDOSTAVA`
        JOIN `NACIN_PLACANJA`N ON A.`IDNACIN_PLACANJA`  =  N.`IDNACIN_PLACANJA`
        WHERE K.IDKORISNIK=?";
             
           $params = array($userID);  
             
           
        $db = new Db();
        $result = $db->select($query,$params);
         
         if ($result["affectedRows"] >= 1)
        {
             
            return $result;
            
        }
    }
    
    public function checkUserOfferInDataBase($userID,$productID)
    {
        
          $query = "SELECT K.`EMAIL` FROM
                  `KORISNIK` K 
                   JOIN AUKCIJA A ON K.`IDKORISNIK` = A.`IDKORISNIK`
                   WHERE 
                   A.`IDPROIZVOD` =? AND A.`IDKORISNIK` =?";
        
        $params = array($productID,$userID);
        
        $db = new Db();
        $result = $db->select($query,$params);
        
        if ($result["affectedRows"] >= 1)
        {
             
            return $result;
            
        }
    }
    
    public function checkMaxOfferInDataBase ($productID) 
    {
        
        $query = "SELECT K.`EMAIL`,K.`IME`,K.`PREZIME`,A.`PONUDA` 
                   FROM
                  `KORISNIK` K 
                   JOIN `AUKCIJA` A ON K.`IDKORISNIK` = A.`IDKORISNIK`
                   WHERE 
                   A.`IDPROIZVOD` =?
                   ORDER BY
                   A.`PONUDA`
                  DESC
                  LIMIT 1";
        
        $params = array($productID);
        $db = new Db();
        $result = $db->select($query,$params);
        
        if ($result["affectedRows"] >= 1)
        {
             
            return $result;
            
        }
        
    }
    
    public function checkIsProductAuctionTimeEnds ($productID)
    {
        
        $query = "SELECT DATEDIFF(VREMEISTEKAPONUDE, NOW())
                  FROM PROIZVOD
                  WHERE IDPROIZVOD=?";
        $params = array($productID);
        
        $db = new Db();
        $result = $db->select($query,$params);
        
        if ($result["affectedRows"] >= 1)
        {
             
            return $result;
            
        }
    }
    
    public function  cancelOfferFromDataBase ($cancelOffer)
     {
         $query = "DELETE FROM  AUKCIJA
                   WHERE 
                   IDAUKCIJA = ?";
        
        $params = array ($cancelOffer);
       
        $db = new Db();
        $result = $db->delete($query,$params);
         
        if ($result["affectedRows"] >= 1)
            
        {    
            return $result;
            
        }
         
     }
    
}



?>