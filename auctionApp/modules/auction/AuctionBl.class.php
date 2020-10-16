<?php
include_once ("db/classes/auction/AuctionOfferRequest.class.php");
include_once ("db/modules/auction/AuctionDal.class.php");


class AuctionBl 
{
   private $bidOffer;
   private $idProduct;
   private $idUser;
   private $userEmail;
   private $paymentMethod;
   private $shippingMethod;
   private $currentOffer;
    
    public function makeAuctionOffer ($idProduct,$idUser,$userEmail,$currentOffer)
    {
        
        if (isset($_POST["submit"],$_POST["auctionOffer"],$_POST["paymentMethods"],$_POST["shippingMethods"]))
            
        {     //Check is auction time ends
            if (!$this->isProductAuctionTimeEnds($idProduct))
            {
            //Check if user gave offer
                $checkResult =$this->checkIfUserGaveOffer($idUser,$idProduct); 
               
              if ( $checkResult < 1) 
              {
             
            if ($currentOffer <  $_POST["auctionOffer"]) 
            {
            
            if($_POST["paymentMethods"] !=-1 &&  $_POST["shippingMethods"] !=-1)
             {
                     
                     $this->bidOffer = trim($_POST["auctionOffer"]);
                     $this->currentOffer = $currentOffer;
                     $this->idProduct = $idProduct;
                     $this->idUser = $idUser;
                     $this->userEmail = $userEmail;
                     $this->paymentMethod =$_POST["paymentMethods"];
                     $this->shippingMethod = $_POST["shippingMethods"];
                 
                        $auctionOfferRequest = new AuctionOfferRequest($this->bidOffer,$this->idProduct,$this->idUser, $this->userEmail,$this->paymentMethod,$this->shippingMethod);
                 
                        $auctionDal = new AuctionDal();
                        $result = $auctionDal->SaveAuctionOffer($auctionOfferRequest);
                        $auctionValid = false;
                        if ($result['affectedRows'] > 0) 
                        {
                            
                            echo "<div class='alert alert-success'>
                          <strong>Uspesno se podneli ponudu!</strong> 
                                 </div>";
                            $auctionValid = true;
                            return $auctionValid;
                            
                        }
                 
                 
                 else 
                 {
                     
                     "<div class='alert alert-danger'>
                          <strong>Doslo je do greske!</strong> 
                                 </div>";
                 }
                 
                 
             }
            
            else 
            {
                echo "<div class='alert alert-danger'>
                          <strong>Nacin dostave i placanja su obavezna polja!</strong> 
                     </div>";
                
            }
        
    }
            else 
            {
                echo "<div class='alert alert-danger'>
                          <strong>Ponuda mora biti veca od trenutne!</strong> 
                     </div>";
            }
    
              }
            
            else 
            {
                
                echo "<div class='alert alert-danger'>
                          <strong>Vec ste dali ponudu za ovaj proizvod!</strong> 
                     </div>";
          
            }
            }
            
            else
            {
                
                $maxOffer=$this->auctionMaxOffer($idProduct);
                
                echo "<div class='alert alert-danger'>
                          <strong>Vreme za ponude je isteklo!
                          Proizvod je prodat za {$maxOffer["data"][0]["PONUDA"]},00 RSD, korisniku {$maxOffer["data"][0]["IME"]} {$maxOffer["data"][0]["PREZIME"]} </strong> 
                     </div>";
                
            }
        }
    
}
    
    public function GetAuctionOfferByID ($userID)
        
    {
        $auctionDal = new AuctionDal();
        $auctionOffer=$auctionDal->getAuctionOffer($userID);
        
        if ($auctionOffer != array())
            
        {
            
            return $auctionOffer;
        }
    }
    
    public function checkIfUserGaveOffer ($UserID,$ProductID)
        
    {
        $auctionDal = new AuctionDal();
        $checkResult =$auctionDal->checkUserOfferInDataBase($UserID,$ProductID);
        
        if ($checkResult != array())
        {
        return  $checkResult["affectedRows"];
        }
        
    }
    
    public function auctionMaxOffer ($ProductID)
    {
        
        $auctionDal = new AuctionDal();
        $maxOffer = $auctionDal->checkMaxOfferInDataBase($ProductID);
        
        if ($maxOffer != array())
        {
        return  $maxOffer;
        }
    }
    
    public function isProductAuctionTimeEnds($ProductID)
    {   $timeEnds = false;
        $auctionDal = new AuctionDal();
        $dateDiffrence = $auctionDal->checkIsProductAuctionTimeEnds($ProductID);
        
        if ($dateDiffrence != array())
        {
             if ($dateDiffrence['data'][0]['DATEDIFF(VREMEISTEKAPONUDE, NOW())'] < 0)
             {
                 
                 $timeEnds = true;
                 return $timeEnds;
             }
        }
        
    }
    
    public function cancelOffer ($offerID)
    {
        
        $auctionDal = new AuctionDal();
        $cancelOffer = $auctionDal->cancelOfferFromDataBase($offerID);
        
        if ($cancelOffer != array())
        {
        return  $cancelOffer;
        }
    }
}


?>