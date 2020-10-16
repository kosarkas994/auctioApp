<?php
class AuctionOfferRequest 
{
    
    private $offer;
    private $idProduct;
    private $idUser;
    private $userEmail;
    private $shippingMethod;
    private $paymentMethod;
    
    public function __construct ($offer,$idProduct,$idUser,$userEmail,$shippingMethod,$paymentMethod)
    {
        
        $this->offer = $offer;
        $this->idProduct = $idProduct;
        $this->idUser = $idUser;
        $this->userEmail = $userEmail;
        $this->shippingMethod = $shippingMethod;
        $this->paymentMethod = $paymentMethod;
        
    }
    
    public function getOffer ()
    {
        
        return  $this->offer;
    }
    public function getIdProduct ()
    {
        
        return  $this->idProduct;
    }
    public function getIdUser ()
    {
        
        return  $this->idUser;
    }
    public function getUserEmail ()
    {
        
        return  $this->userEmail;
    }
    public function getShippingMethod ()
    {
        
        return  $this->shippingMethod;
    }
    public function getPaymentMethod ()
    {
        
        return  $this->paymentMethod;
    }
        
    
    
    
    
}



?>