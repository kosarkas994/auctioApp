<?php
include "modules/classes/user/User.class.php";
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
    
    $userName =$_SESSION["login"]->getUsername(); 
    $userLastName=$_SESSION["login"]->getUserLastName();
    $userEmail=$_SESSION["login"]->getUserEmail();
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
           <a href="auctionOfferByUser.class.php" >PREGLED MOJIH PONUDA</a>
          <br>
            <a href="logOut.php" >IZLOGUJTE SE</a>
         
           
     
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $userName." ".$userLastName; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3"> <img style='width:300px;'alt="User Pic" src="images/user1.png" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Ime</td>
                        <td><?php echo $userName; ?></td>
                      </tr>
                      <tr>
                        <td>Prezime</td>
                        <td><?php echo $userLastName; ?></td>
                      </tr>
                      <tr>
                        <td>Email adresa</td>
                        <td><?php echo $userEmail; ?></td>
                        </tr>
                     
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
