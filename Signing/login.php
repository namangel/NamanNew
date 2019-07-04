<?php
    require('../server.php');
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Login | Naman Angels India Foundation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="../css/style.css" rel="stylesheet">
        <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
        <!-- <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

        <!-- <link href="../css/style.css" rel="stylesheet"> -->
        <link href="css/login-form.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    </head>

    <body>

        <?php require "../include/header/loginheader.php"?>
        <script>
            $(function() {

            $('#login-startup-link').click(function(e) {
                $("#login-startup").delay(100).fadeIn(100);
                $("#login-investor").fadeOut(100);
                $('#login-investor-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#login-investor-link').click(function(e) {
                $("#login-investor").delay(100).fadeIn(100);
                $("#login-startup").fadeOut(100);
                $('#login-startup-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });

            });
        </script>
        <div class="container1 h-100">
        	<div class="row  justify-content-center align-items-center">
    			<div class="col-md-5 ">
    				<div class="card panel-login">
    					<div class="panel-heading p-2">
    						<div class="row">
    							<div class="col-md-6 text-center p-2">
    								<a href="#" class="active" id="login-startup-link">Start-up</a>
    							</div>
    							<div class="col-md-6 text-center p-2">
    								<a href="#" id="login-investor-link">Investor</a>
    							</div>
    						</div>
    						<hr>
    					</div>
    					<div class="card-body">
    						<div class="row">
    							<div class="col-lg-12">
    								<form id="login-startup" action="login.php" method="post" role="form" style="display: block;">
    									<div class="form-group">
    										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
    									</div>
    									<div class="form-group">
    										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
    									</div>
    									<!-- <div class="form-group text-center">
    										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
    										<label for="remember"> Remember Me</label>
    									</div> -->
    									<div class="form-group">
    										<div class="row">
    											<div class="col-md-12">
    												<input type="submit" name="login_st" id="login_st" tabindex="4" class="form-control btn btn-primary" value="Log In">
    											</div>
    										</div>
    									</div>
    									<div class="form-group">
    										<div class="row">
    											<div class="col-lg-12">
    												<div class="text-center">
    													<a href="recovermypass.php" tabindex="5" class="forgot-password">Forgot Password?</a>
    												</div>
    											</div>
    										</div>
    									</div>
    								</form>
    								<form id="login-investor" action="login.php" method="post" role="form" style="display: none;">
    									<div class="form-group">
    										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
    									</div>
    									<div class="form-group">
    										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
    									</div>
    									<!-- <div class="form-group text-center">
    										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
    										<label for="remember"> Remember Me</label>
    									</div> -->
    									<div class="form-group">
    										<div class="row">
    											<div class="col-md-12">
    												<input type="submit" name="login_inv" id="login_inv" tabindex="4" class="form-control btn btn-primary" value="Log In">
    											</div>
    										</div>
    									</div>
    									<div class="form-group">
    										<div class="row">
    											<div class="col-lg-12">
    												<div class="text-center">
    													<a href="recovermypass.php" tabindex="5" class="forgot-password">Forgot Password?</a>
    												</div>
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



        <?php require "../include/footer/regfooter.php"?>

    </body>

</html>
