<?php require('../server.php') ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>Institutional Investor Membership | Naman Angels India Foundation</title>
  <link href="../img/naman.png" rel="icon">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <!-- <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

  <link href="../css/style.css" rel="stylesheet">
  <link href="css/regform.css" rel="stylesheet">
</head>
<script>
function validateForm() {
var fname = document.forms["direct_member"]["fname"].value;
var lname = document.forms["direct_member"]["lname"].value;
var phone = document.forms["direct_member"]["phone"].value;
var iname = document.forms["direct_member"]["iname"].value;


if (iname.length < 3) {
  alert("Please fill correct company name");
  return false;
}

if (fname.length < 3) {
  alert("Please fill correct first name");
  return false;
}

if (lname.length < 3) {
  alert("Please fill correct last name");
  return false;
}



if (phone.length != 10) {
  alert("Please fill correct phone number");
  return false;
}
}

</script>
<body>
  <?php require "../include/header/registerheader.php"?>

    <div class="panel panel-primary m-5 text-center">
        <div class="panel-heading">
                <h3 class="panel-title"> Membership Registration Form (Institutional Investor)</h3>
        </div>
    </div>
        <div class="panel-body">
        <form method="post" action="direct_member_institution.php" name="direct_member_institution" onsubmit="validateForm()">
                <div class="col-md-2">
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="form-group col-md-12 col-sm-12">
                        <label for="fname">Company Name</label>
                        <input type="text" class="form-control input-sm" name="iname" placeholder="" autofocus>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label for="fname">Founder's First Name</label>
                        <input type="text" class="form-control input-sm" name="fname" placeholder="">
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label for="lname">Founder's Last Name	</label>
                        <input type="text" class="form-control input-sm" name="lname" placeholder="">
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control input-sm" name="email" placeholder="">
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label for="phone">Phone Number</label>
                        <input type="number" class="form-control input-sm" name="phone" placeholder="">
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                      <textarea rows="8" cols="130"name="query" placeholder="Enter queries about membership here.."></textarea>
                    </div>
                </div>
                <div class="col-md-2">
                </div>

                <div class="col-md-12 col-sm-12">
                    <div class="form-group col-md-12 col-sm-12 pull-right" align="right">
                        <input type="submit" onclick="validateForm()" class="btn btn-primary" name="dir_mem" value="Request Membership" name="reg_st">
                    </div>
                </div>
            </form>
        </div>

                </div>
            </form>
        </div>
    </div>
    <br>
    <br>

    <?php require "../include/footer/regfooter.php"?>
</body>
</html>
