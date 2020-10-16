<?php
include_once("modules/user/UserBL.class.php");
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
    $userBl = new UserBL();
    $userBl->loginUser();
    
    if (isset($_SESSION["login"]))
{
    header("Location:productPage.php");
    
}
    
    
}



?>



<!DOCTYPE html>
<html>
<head>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>STRANA ZA LOGOVANJE</title>
</head>
<body class="top">
    <div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">LOGOVANJE</a>
							</div>
							<div class="col-xs-6">
								<a href="registration.php" id="register-form-link">REGISTRACIJA</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="email" name="email" id="email"  class="form-control" placeholder="Email" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password"  class="form-control" placeholder="Lozinka">
									</div>
									<div class="form-group text-center">
										<input type="checkbox"  name="remember" id="remember">
										<label for="remember"> Zapamti </label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit"  class="form-control btn btn-login" value="Uloguj se">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>

