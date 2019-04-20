<?php
    require('../server.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <link href="../css/style.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <style>
        /* #header {
          height: 80px;
          transition: all 0.5s;
          z-index: 997;
          transition: all 0.5s;
          padding: 20px 0;
          background: #fff;
          box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.3);
        }

        #header.header-scrolled,
        #header.header-pages {
          height: 60px;
          padding: 10px 0;
        }

        #header .logo h1 {
          font-size: 36px;
          margin: 0;
          padding: 0;
          line-height: 1;
          font-weight: 400;
          letter-spacing: 3px;
          text-transform: uppercase;
        }

        #header .logo h1 a,
        #header .logo h1 a:hover {
          color: #00366f;
          text-decoration: none;
        }

        #header .logo img {
          padding: 0;
          margin: 7px 0;
          max-height: 26px;
        }

        .main-pages {
          margin-top: 60px;
        }


        .main-nav,
        .main-nav * {
          margin: 0;
          padding: 0;
          list-style: none;
        }

        .main-nav > ul > li {
          position: relative;
          white-space: nowrap;
          float: left;
        }

        .main-nav a {
          display: block;
          position: relative;
          color: #004289;
          padding: 10px 15px;
          transition: 0.3s;
          font-size: 14px;
          font-family: "Montserrat", sans-serif;
          font-weight: 500;
        }

        .main-nav a:hover,
        .main-nav .active > a,
        .main-nav li:hover > a {
          color: #007bff;
          text-decoration: none;
        }

        .main-nav .drop-down ul {
          display: block;
          position: absolute;
          left: 0;
          top: calc(100% + 30px);
          z-index: 99;
          opacity: 0;
          visibility: hidden;
          padding: 10px 0;
          background: #fff;
          box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
          transition: ease all 0.3s;
        }

        .main-nav .drop-down:hover > ul {
          opacity: 1;
          top: 100%;
          visibility: visible;
        }

        .main-nav .drop-down li {
          min-width: 180px;
          position: relative;
        }

        .main-nav .drop-down ul a {
          padding: 10px 20px;
          font-size: 13px;
          color: #004289;
        }

        .main-nav .drop-down ul a:hover,
        .main-nav .drop-down ul .active > a,
        .main-nav .drop-down ul li:hover > a {
          color: #007bff;
        }

        .main-nav .drop-down > a:after {
          content: "\f107";
          font-family: FontAwesome;
          padding-left: 10px;
        }

        .main-nav .drop-down .drop-down ul {
          top: 0;
          left: calc(100% - 30px);
        }

        .main-nav .drop-down .drop-down:hover > ul {
          opacity: 1;
          top: 0;
          left: 100%;
        }

        .main-nav .drop-down .drop-down > a {
          padding-right: 35px;
        }

        .main-nav .drop-down .drop-down > a:after {
          content: "\f105";
          position: absolute;
          right: 15px;
        } */
        .container1 {
            padding-top: 10%;
            padding-bottom: auto;
            background-image: linear-gradient(to bottom right,#e6f5ff, #ccebff, #66c2ff);
        }
        .panel-login {
            border-color: #ccc;
            -webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
            -moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
            box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
        }
        .panel-login>.panel-heading {
            color: #00415d;
            background-color: #fff;
            border-color: #fff;
            text-align:center;
        }
        .panel-login>.panel-heading a{
            text-decoration: none;
            color: #666;
            font-weight: bold;
            font-size: 15px;
            -webkit-transition: all 0.1s linear;
            -moz-transition: all 0.1s linear;
            transition: all 0.1s linear;
        }
        .panel-login>.panel-heading a.active{
            color: #0066ff;
            font-size: 18px;
        }
        .panel-login>.panel-heading hr{
            margin-top: 10px;
            margin-bottom: 0px;
            clear: both;
            border: 0;
            height: 1px;
            background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
            background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
            background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
            background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
        }
        .panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
            height: 45px;
            border: 1px solid #ddd;
            font-size: 16px;
            -webkit-transition: all 0.1s linear;
            -moz-transition: all 0.1s linear;
            transition: all 0.1s linear;
        }
        .panel-login input:hover,
        .panel-login input:focus {
            outline:none;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            border-color: #ccc;
        }
        .btn-login {
            background-color: #59B2E0;
            outline: none;
            color: #fff;
            font-size: 14px;
            height: auto;
            font-weight: normal;
            padding: 14px 0;
            text-transform: uppercase;
            border-color: #59B2E6;
        }
        .btn-login:hover,
        .btn-login:focus {
            color: #fff;
            background-color: #53A3CD;
            border-color: #53A3CD;
        }
        .forgot-password {
            text-decoration: underline;
            color: #888;
        }
        .forgot-password:hover,
        .forgot-password:focus {
            text-decoration: underline;
            color: #666;
        }

        .btn-register {
            background-color: #1CB94E;
            outline: none;
            color: #fff;
            font-size: 14px;
            height: auto;
            font-weight: normal;
            padding: 14px 0;
            text-transform: uppercase;
            border-color: #1CB94A;
        }
        .btn-register:hover,
        .btn-register:focus {
            color: #fff;
            background-color: #1CA347;
            border-color: #1CA347;
        }
    </style>
</head>
<body>

    <header id="header" class="fixed-top">
      <div class="container">
        <div class="logo float-left">
          <img src="../img/logo.png" alt="" class="img-fluid">
        </div>

        <nav class="main-nav float-right d-none d-lg-block">
          <ul>
            <li><a href="../#intro">Home</a></li>
            <li><a href="../#about">About Us</a></li>
            <li><a href="../#startups">Startups</a></li>
            <li><a href="../#investors">Investors</a></li>

<<<<<<< HEAD
<<<<<<< HEAD
            <li><a href="../#contact">Contact Us</a></li>
            <div class="btn-group">
              <!-- <li><button type="button" class="btn btn-primary" onclick="location.href = './Signing/login.php'"><a style="height:40px;">Sign In</a></button></li> -->
=======
=======
>>>>>>> 580983eeeae78599cb3608e1a2a27e7af1763752
            <li><a href="#contact">Contact Us</a></li>
            <!-- <div class="btn-group">
              <li><button type="button" class="btn btn-primary" onclick="location.href = './Signing/login.php'"><a style="height:40px;">Sign In</a></button></li>
>>>>>>> 580983eeeae78599cb3608e1a2a27e7af1763752
              <li>&nbsp;</li>
              <li><button type="button" class="btn btn-primary" onclick="location.href = './Signing/register.php'"><a style="height:40px;">Sign Up</a></button></li>
            </div> -->
          </ul>
        </nav><!-- .main-nav -->

      </div>
    </header><!-- #header -->
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
    <div class="container1">
    	<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-5 col-xs-offset-1">
								<a href="#" class="active" id="login-startup-link">Start-up</a>
							</div>
							<div class="col-xs-5">
								<a href="#" id="login-investor-link">Investor</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
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
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login_st" id="login_st" tabindex="4" class="form-control btn btn-login" value="Log In">
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
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login_inv" id="login_inv" tabindex="4" class="form-control btn btn-login" value="Log In">
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
    <footer id="footer">
      <div class="footer-top">
        <div class="container2">
          <div class="row">
            <div class="col-lg-1 footer-info">
            </div>
            <div class="col-lg-3 footer-info">
              <h3>Naman Angels</h3>
              <p class="text-justify">Naman Angels India Foundation (NAMAN) is Navi Mumbai’s first Seed Investment & Innovation Platform. We are committed to disrupt the seed investment in Navi Mumbai and Maharashtra. Our innovation platform provides values to startups through its angel networks, mentors, venture funds & co-working facility and strategic tie-ups.</p>
            </div>
            <div class="col-lg-1 footer-info">
            </div>

            <div class="col-lg-1 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#about">About us</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="#startups">Startups</a></li>
                <li><a href="#investors">Investors</a></li>
              </ul>
            </div>


            <div class=" col-lg-1  footer-links">
              <br>
              <br>

              <ul>
                <li><a href="#">Events</a></li>
                <li><a href="faq.php">FAQs</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#">Terms of service</a></li>
                <li><a href="#">Privacy policy</a></li>
              </ul>
            </div>
            <div class="col-lg-1 footer-info">
            </div>

            <div class="col-lg-3 footer-contact">
              <h4>Contact Us</h4>
              <p>
                  Plot No 37, Sector 26, <br>
                  Parsik Hill, CBD Belapur,<br>
                  Navi Mumbai, Maharashtra 400614 <br>
                <strong>Phone:</strong>+91 915 2095 991<br>
                <strong>Email:</strong>naman@namanangels.com<br>
              </p>

              <div class="social-links">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
              </div>

            </div>
            <div class="col-lg-1 footer-info">
            </div>

           <!-- <div class="col-lg-3 col-md-6 footer-newsletter">
              <h4>Our Newsletter</h4>
              <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
              <form action="" method="post">
                <input type="email" name="email"><input type="submit"  value="Subscribe">
              </form>
            </div> -->

          </div>
        </div>
      </div>

      <!-- <div class="container">
        <div class="copyright">
         &copy; Copyright <strong>NewBiz</strong>. All Rights Reserved
        </div>
        <div class="credits">

            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=NewBiz

         Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div> -->
    </footer>
</body>

<!-- <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../lib/easing/easing.min.js"></script>
<script src="../lib/mobile-nav/mobile-nav.js"></script>
<script src="../lib/wow/wow.min.js"></script>
<script src="../lib/waypoints/waypoints.min.js"></script>
<script src="../lib/counterup/counterup.min.js"></script>
<script src="../lib/owlcarousel/owl.carousel.min.js"></script>
<script src="../lib/isotope/isotope.pkgd.min.js"></script>
<script src="../lib/lightbox/js/lightbox.min.js"></script> -->
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->

</html>
