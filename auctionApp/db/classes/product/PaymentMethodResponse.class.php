<?php
class PaymentMethodResponse 
    
{
    private $shippingMethods;
    
    public function __construct($paymentMethods)
    {
        
      $this->paymentMethods = $paymentMethods;
        
    }
    
    public function getAllPaymentMethods()
    {
        
        
        return $this->paymentMethods;
    }
    
    
    
}

?>