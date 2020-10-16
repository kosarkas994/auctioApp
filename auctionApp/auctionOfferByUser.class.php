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
    
      $userID =$_SESSION["login"]->getUserID();
    //auctionInformation
     $auctionBl = new AuctionBl();
     $auctionInfromation=$auctionBl->GetAuctionOfferByID($userID);
     
    
    
     
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta charset="utf-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>PROFIL</title>
</head>
<body>
    <?php include ("include/navBar.php");  ?>
    <div class="container">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           <a href="userInformationUpdate.php" >IZMENITE PROFIL</a>
          <br>

            <a href="" >KUPLJENI PROIZVODI</a>
           <br>
            <a href="userAuctionProducts.php" >PROIZVODI NA AUKCIJI</a>
           <br>
            <a href="logOut.php" >IZLOGUJTE SE</a>
     
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">MOJE PONUDE</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3"> <img style='width:300px;'alt="User Pic" src="images/user1.png" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      
                        <?php
                        if(isset($auctionInfromation["data"]))
                        {
                        for 
                          ($i=0; $i < count($auctionInfromation["data"]);$i++)
                          {
                              echo "
                               <tr>
                              <td style='background: #ccc;'>PONUDA</td>
                              
                              </tr>
                             
                              <tr>
                              
                               <td>IME</td>
                              <td>{$auctionInfromation['data'][$i]["IMEKORISNIKA"]}</td>
                              </tr>
                              <tr>
                              <td>PREZIME</td>
                              <td>{$auctionInfromation['data'][$i]["PREZIMEKORISNIKA"]}</td>
                              </tr>
                              <tr>
                              <td>EMAIL ADRESA</td>
                              <td>{$auctionInfromation['data'][$i]["EMAILKORISNIKA"]}</td>
                               </tr>
                               <tr>
                               <td>IME PROIZVODA</td>
                              <td>{$auctionInfromation['data'][$i]["NAZIVPROIZVODA"]}</td>
                              </tr>
                              <tr>
                              <td>MOJA PONUDA ZA PROIZVOD</td>
                              <td>{$auctionInfromation['data'][$i]["PONUDA"]},00 RSD</td>
                              </tr>
                              <tr>
                              <td>VREME ISTEKA AUKCIJE </td>
                              <td>{$auctionInfromation['data'][$i]["VREMEISTEKAPONUDE"]}</td>
                              
                              </tr>
                              <tr>
                               <td><a href='cancelOffer.php?IDAUCTION={$auctionInfromation['data'][$i]["IDAUKCIJA"]}&IDPROIZVOD={$auctionInfromation['data'][$i]["IDPROIZVOD"]}'>OTKAZI PONUDU<a/></td>
                              </tr>
                              
                              
                             

                              
                              
                              ";
                              
                              
                              
                          }
                        }
                        
                        else 
                        {
                            echo "Trenutno nemate novih ponuda!";
                        }
                          
                          
                          
                          
                          ?>
                      
                     
                       
                        
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>  
          </div>
        </div>
      </div>
    </div>
<?php include ("include/footer.php");  ?>
</body>
</html>