<?php
include_once ("modules/user/UserBL.class.php");
if (session_id() === "")
{
    session_start();
}

if (!isset($_SESSION["login"]))
{
    header("Location:productPage.php");
}
else 
{
    $userBl = new UserBL();
    $userBl->logOutUser();
   header("Location:productPage.php");
}


?>