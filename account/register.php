<?php
    require('../server.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register | Billennium Divas</title>
    <link href="../img/divas.png" rel="icon">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
    <style>
        .container1 {
            padding: 10%;
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
        h6{
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <?php require "../include/header/registerheader.php"?>
    <div class="container1">
    	<div class="row h-100 text-center justify-content-center align-items-center">
			<div class="col-md-6">
				<div class="">
					<div class="panel-body">
						<h3 class="mb-3">Join Billennium Divas's Platform for Startup Investing</h3>
						<h5 class="media-heading mt-3">Please select the role that best describes you.</h5>
						<div class="row justify-content-center align-items-center">
							<button class="col-md-8 btn btn-lg btn-block btn-primary mt-5" onclick = "location.href='register_st.php'">I am a Startup</button>
						</div>
						<div class="row justify-content-center align-items-center">
							<button class="col-md-8 btn btn-lg btn-block btn-primary mt-3" onclick = "location.href='register_inv.php'">I am an Investor</button>
						</div>
						<h6 class="mt-5">Already registered? <a href="login.php">Sign in</a><h6>
					</div>
				</div>
			</div>
		</div>
    </div>

    <?php require "../include/footer/regfooter.php"?>
</body>

</html>
