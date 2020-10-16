<?php
include_once "modules/product/ProductBl.class.php";
include_once "modules/classes/user/User.class.php";

 if (session_id() === "")
{
    session_start();
}

if (isset($_SESSION["login"]))
{
    
  $userID = $_SESSION["login"]->getUserID();
  $userEmail=$_SESSION["login"]->getUserEmail();
  $productBl = new ProductBl();
  $category = $productBl->getProductCategory();
  $productBl->addProduct($userID,$userEmail);
    
 
    
}

else 
{
    
    header("location:login.php");
}
 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf8">
    <title>Dodajte proizvod</title>
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
    <form class="form-horizontal" action='' method="POST" enctype="multipart/form-data">
  <fieldset>
    <div id="legend">
      <legend class="">Dodajte novi proizvod na aukciju</legend>
    </div>
    <div class="control-group">
      <!-- product name -->
      <label class="control-label"  for="productName">Naziv</label>
      <div class="controls">
        <input type="text" id="productName" name="productName" placeholder="Naziv proizvoda" class="input-xlarge">
        <p class="help-block">Unesite naziv proizvoda</p>
      </div>
    </div>
      
      <div class="control-group">
      <!-- Product description-->
      <label class="control-label"  for="productDescription">Opis</label>
      <div class="controls">
       <textarea id="productDescription" name="productDescription" placeholder=" Opis proizvoda" class="input-xlarge"></textarea>
        <p class="help-block">Unesite opis proizvoda</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Start price -->
      <label class="control-label" for="startPrice">Pocetna cena</label>
      <div class="controls">
        <input type="number" id="startPrice" name="startPrice" placeholder="Pocetna cena" class="input-xlarge">
        <p class="help-block">Unesite pocetnu cenu proizvoda</p>
      </div>
    </div>
      
       <div class="control-group">
      <!-- Category-->
      <label class="control-label" for="category">Kategorija</label>
      <div class="controls">
         <select id="category" name="category" class="input-xlarge">
             <?php
             echo "<option value=-1>Izaberite kategoriju</option>";
             if (isset($category)) 
             {
             for ($i=0; $i<count($category["data"]);$i++)
                 
             {
                 
                 echo "
                 <option value='{$category["data"][$i]["IDPROIZVOD_KATEGORIJA"]}'>{$category["data"][$i]["NAZIV"]} </option>";
                 
             }
             }
             ?>
             
         </select>
        <p class="help-block">Izaberite kategoriju proizvoda</p>
      </div>
    </div>
      
      <div class="control-group">
      <!-- Picture-->
      <label class="control-label" for="uploadPicture">Slika</label>
      <div class="controls">
        <input type="file" id="uploadPicture" name="uploadPicture" class="input-xlarge">
        <p class="help-block">Upload slike proizvoda</p>
      </div>
    </div>
 
   
 
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button type="submit" name="submit" class="btn btn-success">Dodaj</button>
      </div>
    </div>
  </fieldset>
   </form>
</div>
							

<?php include ("include/footer.php");  ?>
</body>
</html>