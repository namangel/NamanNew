<?php
    require('../../server.php');
    $id = $_SESSION['InvID'];

    $qu = "SELECT * FROM inv_details WHERE InvID = '$id'";
	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
    $FName = $row['FName'];
    $LName = $row['LName'];
    $Email = $row['Email'];
	$Phone = $row['Phone'];
    $Website = $row['Website'];
    
    $qu = "SELECT * FROM inv_addetails WHERE InvID='$id'";
    $results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
	$facebook=$row['Facebook']==""? '--':$row['Facebook'];
	$twitter=$row['Twitter']==""? '--':$row['Twitter'];
	$linkedin=$row['LinkedIn']==""? '--':$row['LinkedIn'];
	$instagram=$row['Instagram']==""? '--':$row['Instagram'];
	$others = $row['Others']==""? '--':$row['Others'];



    $q = "SELECT * FROM inv_uploads WHERE InvID = '$id';";
	$results = mysqli_query($db, $q);
	$row = mysqli_fetch_assoc($results);
	$ProfilePic = $row['ProfilePic'];
    if(isset($_POST["image_submit"])){
        $check = getimagesize($_FILES["company_image"]["tmp_name"]);
		if($check != false)
		{
			$file_name = $FName.$LName."_".$_FILES['company_image']['name'];
			$file_size = $_FILES['company_image']['size'];
			$file_tmp = $_FILES['company_image']['tmp_name'];
			$file_type = $_FILES['company_image']['type'];
			$file_ext=strtolower(end(explode('.',$_FILES['company_image']['name'])));

			$extensions= array("jpeg","jpg","png");

			if(in_array($file_ext,$extensions)=== false)
			{
				echo "<script>alert('Extension not allowed, please choose a JPEG or PNG file.')</script>";
			}
			else
			{
				if($file_size > 5242880)
				{
					echo "<script>alert('File size must be less than 5 MB')</script>";
				}
				else
				{
					$uploadas = "uploads/investor/".$file_name;
					$upload = "../../uploads/investor/".$file_name;
					if(move_uploaded_file($file_tmp, $upload)){
						$q = "UPDATE inv_uploads set ProfilePic='$uploadas' where InvID='$id';";
						mysqli_query($db, $q);
					}
				}
			}
        }
        header('location: account.php');
    }

    if(isset($_POST['company_save'])){
        $fname = mysqli_real_escape_string($db, $_POST['first_name']);
        $lname = mysqli_real_escape_string($db, $_POST['last_name']);
		$cphone = mysqli_real_escape_string($db, $_POST['phone']);
		$cemail = mysqli_real_escape_string($db, $_POST['email']);

        if($fname != "")
		{
			$q = "UPDATE inv_details set FName='$fname' where InvID='$id';";
			mysqli_query($db, $q);
		}
        if($lname != "")
		{
			$q = "UPDATE inv_details set LName='$lname' where InvID='$id';";
			mysqli_query($db, $q);
		}
        if($cphone != "")
		{
			$q = "UPDATE inv_details set Phone='$cphone' where InvID='$id';";
			mysqli_query($db, $q);
		}
        if($cemail != "")
		{
			$q = "UPDATE inv_details set Email='$cemail' where InvID='$id';";
			mysqli_query($db, $q);
		}

        header('location: account.php');
    }

    $q = "SELECT * FROM userinv where InvID='$id'";
    $result = mysqli_query($db, $q);
    $resultpass = mysqli_fetch_assoc($result);
    if(isset($_POST['cpsave'])){
        $cpuname = mysqli_real_escape_string($db, $_POST['user_name']);
		$cppass = mysqli_real_escape_string($db, $_POST['current_password']);
		$cpnpass = mysqli_real_escape_string($db, $_POST['new_password']);
		$cpcpass = mysqli_real_escape_string($db, $_POST['confirm_password']);

        if(sha1($cppass) == $resultpass['Password'] && $cpuname == $resultpass['Username'])
		{
            if($cpnpass == $cpcpass)
    		{
                $pass = sha1($cpnpass);
    			$q = "UPDATE userinv set Password= '$pass' where InvID='$id';";
    			mysqli_query($db, $q);
    		}

            header('location: account.php');
		}
        else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }
?>
<html>
<head>
  <title>Account Settings</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link href="../css/inv.css" rel="stylesheet"> -->
  <!-- <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet"> -->
  <!--<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->


  <style>
    input.error {
        border: 1px dotted red;
    }
    label.error{
        width: 100%;
        color: red;
        font-style: italic;
        margin-left: 10px;
        margin-bottom: 5px;
    }
    </style>

</head>
<body>
  
<main>
<nav class="navbar navbar-default navbar-static-top">
<div class="container-fluid">

<!-- Brand/logo -->
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#example-1" aria-expanded="false">
<span class="sr-only">Toggle navigation</span>

</button>
<a class="navbar-brand" href="#">Naman</a>
</div>

<!-- Collapsible Navbar -->
<div class="collapse navbar-collapse" id="example-1">
<ul class="nav navbar-nav navbar-right">

<li class="nav-item active">
        <a class="nav-link" href="../../index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../../logout.php">Logout</a>
      </li>
</ul>
</div>

</div>

</nav>
</main>
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-10"><h1><?=$FName,' ', $LName?></h1></div>
        </div>
        <div class="row">
            <div class="col-sm-4"><!--left col-->
                <div class="text-center">

                <!-- <img src="../<?=$ProfilePic?>" class="avatar img-circle img-thumbnail img-fluid img-profile rounded-circle mx-auto" alt="avatar">
                <h6>Upload a different photo...</h6>
                <form method="post" action="account.php" enctype="multipart/form-data">
                    <div class="form-group col-sm-9">
                        <input type="file" class="form-control" name="company_image">
                    </div>
                    <div class="form-group col-sm-2">
                            <button class="btn btn-unique" name="image_submit">Submit</button>
                    </div>
                </form> -->

                    <img src="../../<?=$ProfilePic?>" class="avatar img-circle img-thumbnail img-responsive img-fluid img-profile rounded-circle mx-auto" alt="avatar">
                    <h6><a class="imagebox-desc" href="" data-toggle="modal" data-target="#profileImageForm">Upload a different photo...</a></h6>

                    <div class="modal fade" id="profileImageForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Update Logo</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="account.php" enctype="multipart/form-data">
                                    <div class="modal-body mx-3">
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="company_image">
                                        </div>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button class="btn btn-unique" name="image_submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <hr><br>
                <ul class="list-group">
                    <li class="list-group-item text-muted">Social presence </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong><i class="fa fa-linkedin"></i></strong></span> <?=$linkedin?></li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong><i class="fa fa-facebook"></i></strong></span> <?=$facebook?></li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong><i class="fa fa-instagram"></i></strong></span> <?=$instagram?></li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong><i class="fa fa-twitter"></i></strong></span> <?=$twitter?></li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong><i class="fa fa-globe"></i></strong></span> <?=$others?></li>
                </ul>
            </div><!--/col-3-->
    	<div class="col-sm-8">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#contact">Contact Details</a></li>
                <li><a data-toggle="tab" href="#account">Account Details</a></li>
              </ul>


          <div class="tab-content">
            <div class="tab-pane active" id="contact">
                  <form class="form" action="##" method="post" id="contactForm" name="contactForm">
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="<?=$FName?>" title="Enter your first name">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="<?=$LName?>" title="Enter your last name">
                          </div>
                      </div>

                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="phone"><h4>Phone</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="<?=$Phone?>" title="Enter your phone number">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Email Address</h4></label>
                              <input type="text" class="form-control" name="email" id="email" placeholder="<?=$Email?>" title="Enter your email address">
                          </div>
                      </div>

                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit" name="company_save"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
              	</form>

              <hr>

             </div><!--/tab-pane-->
             <div class="tab-pane" id="account">
                 <hr>
                 <form class="form" action="account.php" method="post" id="accountForm" name="accountForm">
                     <div class="form-group">
                         <div class="col-xs-6">
                             <label for="first_name"><h4>Username</h4></label>
                             <input type="text" class="form-control" name="user_name" id="user_name" placeholder="USERNAME" title="enter your user name">
                         </div>
                     </div>
                     <div class="form-group">
                         <div class="col-xs-6">
                             <label for="last_name"><h4>Current Passowrd</h4></label>
                             <input type="password" class="form-control" name="current_password" id="current_password" placeholder="CURRENT PASSWORD" title="Enter your current password">
                         </div>
                     </div>

                     <div class="form-group">
                         <div class="col-xs-6">
                             <label for="phone"><h4>New Password</h4></label>
                             <input type="password" class="form-control" name="new_password" id="new_password" placeholder="NEW PASSWORD" title="Enter your new password">
                         </div>
                     </div>

                     <div class="form-group">
                         <div class="col-xs-6">
                             <label for="mobile"><h4>Confirm Password</h4></label>
                             <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="CONFIRM PASSWORD" title="Enter new passowrd again">
                         </div>
                     </div>
                     <div class="form-group">
                         <div class="col-xs-12">
                             <br>
                             <button class="btn btn-lg btn-success" type="submit" name='cpsave'><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                             <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                         </div>
                     </div>
                 </form>
             </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
    <script src="../js/validation.js"></script>
</body>
</html>
