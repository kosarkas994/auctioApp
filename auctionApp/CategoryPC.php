<?php
include_once ("modules/product/ProductBl.class.php");

$productBl = new ProductBl();
$products=$productBl->getProductByCategory();



?>


<!DOCTYPE html>
    
<html >
<head>
    
 <link href="css/style.css" rel="stylesheet" type="text/css">   
<script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/ahmetomer/pen/yzVmMO?depth=everything&order=popularity&page=47&q=shop&show_forks=false" />
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>



<style class="cp-pen-styles">
    
    
    body {
  padding: 1.5em;
  background: #fff;
  background: whitesmoke;
}

.container {
  width: 100%;
  height: 100%;
}
.container .product {
  width: 610px;
  height: 310px;
  display: flex;
  margin: 1em 0;
  border-radius: 5px;
  overflow: hidden;
  cursor: pointer;
  box-shadow: 0px 0px 21px 3px rgba(0, 0, 0, 0.15);
  transition: all .1s ease-in-out;
  margin-left: auto;
  margin-right: auto;
}
.container .product:hover {
  box-shadow: 0px 0px 21px 3px rgba(0, 0, 0, 0.11);
}
.container .product .img-container {
  flex: 2;
}
.container .product .img-container img {
  object-fit: cover;
  width: 100%;
  height: 100%;
}
.container .product .product-info {
  background: #fff;
  flex: 3;
}
.container .product .product-info .product-content {
  padding: .2em 0 .2em 1em;
}
.container .product .product-info .product-content h1 {
  font-size: 1.5em;
}
.container .product .product-info .product-content p {
  color: #636363;
  font-size: .9em;
  font-weight: bold;
  width: 90%;
}
.container .product .product-info .product-content ul li {
  color: #636363;
  font-size: .9em;
  margin-left: 0;
}
.container .product .product-info .product-content .buttons {
  padding-top: .4em;
}
.container .product .product-info .product-content .buttons .button {
  text-decoration: none;
  color: #5e5e5e;
  font-weight: bold;
  padding: .3em .65em;
  border-radius: 2.3px;
  transition: all .1s ease-in-out;
}
.container .product .product-info .product-content .buttons .add {
  border: 1px #5e5e5e solid;
}
.container .product .product-info .product-content .buttons .add:hover {
  border-color: #6997b6;
  color: #6997b6;
}
.container .product .product-info .product-content .buttons .buy {
  border: 1px #5e5e5e solid;
}
.container .product .product-info .product-content .buttons .buy:hover {
  border-color: #6997b6;
  color: #6997b6;
}
.container .product .product-info .product-content .buttons #price {
  margin-left: 4em;
  color: #5e5e5e;
  font-weight: bold;
  border: 1px solid rgba(137, 137, 137, 0.2);
  background: rgba(137, 137, 137, 0.04);
}
</style>
    
</head>
    
<body>
    <?php include ("include/navBar.php");  ?>
    
  <?php
    
    if (isset($products["CATEGORY"] [0]))
    {
         
         for ($i=0; $i<count($products["CATEGORY"][0]);$i++)
         {
             
             echo "
             
                   <div class='product'>
    <div class='img-container'>
      <img src='{$products["CATEGORY"] [0]["data"][$i]["SLIKA"]}'>
    </div>
    <div class='product-info'>
      <div class='product-content'>
        <h1>{$products["CATEGORY"] [0]["data"][$i]["NAZIV"]}</h1>
        <p>{$products["CATEGORY"] [0]["data"][$i]["OPIS"]}</p>
        <div class='buttons'>
          <a class='button buy' href='singleProductPage.php?IDProduct={$products["CATEGORY"] [0]["data"][$i]["IDPROIZVOD"]}'>DODAJ PONUDU ZA OVAJ PROIZVOD</a>
          <br>
          <br>
          <span class='button' id='price'>{$products["CATEGORY"] [0]["data"][$i]["POCETNACENA"]},00 RSD</span>
        </div>
      </div>
    </div>
  </div>
             
             ";
         
                 
         }
        
    }
    ?>
  
  

  
<?php include ("include/footer.php");  ?>

</body>
    
</html>