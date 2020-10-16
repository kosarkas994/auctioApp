<?php

include "modules/classes/user/User.class.php";
include_once "modules/auction/AuctionBl.class.php";
if (session_id() === "")
{
    session_start();
}

if (!isset($_SESSION["login"]))
{
    header("Location:login.php");
    
}


else 
{
    
      $offerID=$_GET['IDAUCTION'];
      $idProduct = $_GET['IDPROIZVOD'];
    
   
    // cancelOffer
     $auctionBl = new AuctionBl();
     if(!$auctionBl->isProductAuctionTimeEnds($idProduct))
     {
         
         $auctionInfromation=$auctionBl->cancelOffer($offerID);
         
         echo  " <script>window.history.back() </script>";
     }
    
    else 
    {
        echo  " <script>window.history.back() </script>";
          
    }
     
     
    
    
     
    
}
?>

