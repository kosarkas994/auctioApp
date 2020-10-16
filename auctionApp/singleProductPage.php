<?php
include_once "modules/product/ProductBl.class.php";
include_once "modules/auction/AuctionBl.class.php";
include_once "modules/classes/user/User.class.php";
$IDProduct = $_GET['IDProduct'];
$productBl = new ProductBl();
$product=$productBl->getProductByID($IDProduct);


//shipping methods
$shippingMethods = $productBl->getProductShippingMethods();
 


//payment methods

 $paymentMethods = $productBl->getProductPaymentMethods();



$currentOffer = $product['data'][0]['POCETNACENA'];

  if (session_id() === "")
{
    session_start();
}
if (isset($_SESSION["login"]))
{    $userID = $_SESSION["login"]->getUserID();
     $userEmail=$_SESSION["login"]->getUserEmail();
 
      //auctionInformation
     $auctionBl = new AuctionBl();
     $auctionInfromation=$auctionBl->GetAuctionOfferByID($userID);
     
     
    
    
 // AuctionOffer
     
     $auction = $auctionBl->makeAuctionOffer($IDProduct,$userID,$userEmail,$currentOffer);
 
      // MaxOfferOnProduct
            if ($auction != array())
            {
          $maxOffer = $auctionBl->auctionMaxOffer($IDProduct);
            
            
           $currentOffer = $maxOffer["data"][0]["PONUDA"];
 
            }
          
    
      
      
    
}

else 
{
    
    echo "<div class='alert alert-danger'>
                          <strong>Morate biti ulogovani kako bi mogli da date ponudu za ovaj proizvod!</strong> 
                     </div>";
}
    



?>

<!DOCTYPE html>

<html>
    <head>
     <link href="css/style.css" rel="stylesheet" type="text/css">   
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <?php include ("include/navBar.php");  ?>
        <div class="container">
        	<div class="row">
               <div class="col-xs-4 item-photo">
                    <img style="max-width:100%;" src="<?php echo $product['data'][0]['SLIKA'];?>" />
                </div>
                <div class="col-xs-5" style="border:0px solid gray">
                    
                    <h3><?php echo $product['data'][0]['NAZIV'];?></h3>    
                   
        
                    
                    <h6 class="title-price">TRENUTNA CENA</h6>
                    <h3 id ='currentOffer'style="margin-top:0px;"><?php echo $currentOffer.",00"." "."RSD";?></h3>
                    <p><strong>PROIZVOD JE AKTIVAN ZA PONUDE DO <?php echo $product["data"][0]["VREMEISTEKAPONUDE"];?> </strong></p>
                    <form action="" method="post">
                     <label for="auction>">UNESITE VASU PONUDU</label>          
                     <input type="number" name="auctionOffer" id="auction">
                     
                      <?php for ($i=0; $i < count($shippingMethods['data']);$i++)
                        
                        {
                             echo "<p>{$shippingMethods['data'][$i]["OPIS"]} <p/>"; 
                        }
    
    
                       
                         ?>
                         <label for="shippingMethods">IZABERITE NACIN DOSTAVE PROIZVODA AKO VASA PONUDA BUDE NAJVECA</label>
                         <select id="shippingMethods" name=shippingMethods>
                         <option value=-1>IZABERITE</option>
                         <?php for ($i=0; $i < count($shippingMethods['data']);$i++)
                        
                        {
                             echo "<option value = {$shippingMethods['data'][$i]["IDDOSTAVA"]}> 
                              {$shippingMethods['data'][$i]["NAZIV"]} </option>"; 
                              
                        }
                     ?> 
                    </select>
                    <br>
                    <br>
                    
                    <label for="paymentMethods">IZABERITE NACIN  PLACANJA</label>
                    <br>
                         <select id="paymentMethods" name=paymentMethods>
                         <option value=-1>IZABERITE</option>
                         <?php for ($i=0; $i < count($paymentMethods['data']);$i++)
                        
                        {
                             echo "<option value = {$paymentMethods['data'][$i]["IDNACIN_PLACANJA"]}> 
                              {$paymentMethods['data'][$i]["NAZIV"]} </option>"; 
                              
                        }
                     ?> 
                    </select>
                       <div class="control-group">
                         
                       <div class="controls">
                      <button type="submit" name="submit" class="btn btn-success">PONUDI</button>
                      </div>
                    </div>
                    </form>
                    
             </div>   
                                            
                </div>                              
        
                <div class="col-xs-9">
                    
                    <div style="width:100%;border-top:1px solid silver">
                        <p style="padding:15px;">
                           
                            <?php echo $product['data'][0]['OPIS'];?>
                            
                        </p>
                        
                    </div>
                </div>		
            </div>
        <?php include ("include/footer.php");  ?>     
    </body>
</html>