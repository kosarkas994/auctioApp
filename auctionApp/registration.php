<?php
if (session_id() === "")
{
    session_start();
}

if (isset($_SESSION["login"]))
{
    header("Location:productPage.php");
    
}
else 
{
    include_once("modules/user/UserBL.class.php");
    $userBl = new UserBL();
    $userBl->RegisterUser();
    
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf8">
    <title>Registracija</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
    <?php include ("include/navBar.php");  ?>
<div class="container my-auto">
    <form class="form-horizontal" action='' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Registracija</legend>
    </div>
    <div class="control-group">
      <!-- name -->
      <label class="control-label"  for="name">Ime</label>
      <div class="controls">
        <input type="text" id="name" name="name" placeholder="Ime" class="input-xlarge">
        <p class="help-block">Unesite Vase ime</p>
      </div>
    </div>
      
      <div class="control-group">
      <!-- lastname-->
      <label class="control-label"  for="lastName">Prezime</label>
      <div class="controls">
        <input type="text" id="lastName" name="lastName" placeholder="Prezime" class="input-xlarge">
        <p class="help-block">Unesite Vase prezime</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="Email" class="input-xlarge">
        <p class="help-block">Unesite Vasu email adresu</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="Lozinka" class="input-xlarge">
        <p class="help-block">Unesite Vasu lozinku, minimalno 6 karaktera</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="rePassword">Lozinka</label>
      <div class="controls">
        <input type="password" id="rePassword" name="rePassword" placeholder="Potvrda lozinke" class="input-xlarge">
        <p class="help-block">Potvrdite Vasu lozinku</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button type="submit" name="submit" class="btn btn-success">Registracija</button>
      </div>
    </div>
  </fieldset>
   </form>
</div>
							

<?php include ("include/footer.php");  ?>
</body>
</html>
