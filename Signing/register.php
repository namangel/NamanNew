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
        .container1 {
            padding-top: 10%;
            padding-bottom: auto;
            background-image: linear-gradient(to bottom right,#e6f5ff, #ccebff, #66c2ff);
        }
		h3,h4{
			font-family:'Saira Extra Condensed',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol','Noto Color Emoji';
			font-weight: 500;
			color:#343a40;
		}
		h3{
			font-size: 2.3rem;
		}
		h4{
			font-size: 1.8rem 
		}
		.btn-choice {
			font-size: 2.3rem;
			letter-spacing: 0.08rem;
			padding: 0.75rem 1rem;
			background-color: #0a2b40;
			color: #fff;
			}
		.btn-choice-focus,
		.btn-choice:hover {
			color: #fff;
			opacity: 0.7;
		}
		.panel-body{
			padding: 4rem;
		}
    </style>
</head>
<body>

    <header id="header" class="fixed-top">
      <div class="container">
        <div class="logo float-left">
          <a href="#intro" class="scrollto"><img src="../img/logo.png" alt="" class="img-fluid"></a>
        </div>

        <nav class="main-nav float-right d-none d-lg-block">
          <ul>
            <li class="active"><a href="#intro">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#startups">Startups</a></li>
            <li><a href="#investors">Investors</a></li>

            <li><a href="#contact">Contact Us</a></li>
          </ul>
        </nav><!-- .main-nav -->

      </div>
    </header><!-- #header -->
    <div class="container1">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-body">
						<h3 class="mb-3">Join Naman's Platform for Startup Investing</h3> 
						<h4 class="media-heading mt-3">Please select the role that best describes you.</h4>
						<div class="row">
							<button class="col-md-8 col-md-offset-2 btn btn-lg btn-block btn-choice mt-5" onclick = "location.href='register_st.php'">I am a Startup</button>
						</div>
						<div class="row">
							<button class="col-md-8 col-md-offset-2 btn btn-lg btn-block btn-choice mt-3" onclick = "location.href='register_inv.php'">I am an Investor</button>
						</div>
						<h4 class="mt-5 padding-">Already registered?<a href="login.php"> Sign in</a><h4>
					</div>
				</div>
			</div>
		</div>
    </div>
</body>

</html>
