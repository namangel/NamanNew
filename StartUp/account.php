<?php
    require('../server.php');
    $id = $_SESSION['StpID'];

    $qu = "SELECT * FROM st_details WHERE StpID = '$id'";
	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
	$Stname = $row['Stname'];
	$Ffname = $row['Ffname'];
    $Sfname = $row['Sfname'];
    $Email = $row['Email'];
	$Phone = $row['Phone'];
	$Website = $row['Website'];


    $q = "SELECT * FROM st_uploads WHERE StpID = '$id';";
	$results = mysqli_query($db, $q);
	$row = mysqli_fetch_assoc($results);
	$Logo = $row['Logo'];
    if(isset($_POST["image_submit"])){
        $check = getimagesize($_FILES["company_image"]["tmp_name"]);
		if($check != false)
		{
			$file_name = $Stname."_".$_FILES['company_image']['name'];
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
					$uploadas = "uploads/startup/".$file_name;
					$upload = "../uploads/startup/".$file_name;
					if(move_uploaded_file($file_tmp, $upload)){
						$q = "UPDATE st_uploads set Logo='$uploadas' where StpID='$id';";
						mysqli_query($db, $q);
						echo "<script>alert('Successfully Uploaded')</script>";
					}
				}
			}
        }
        header('location: account.php');
    }

    if(isset($_POST['company_save'])){
        $cname = mysqli_real_escape_string($db, $_POST['company_name']);
		$cweb = mysqli_real_escape_string($db, $_POST['cwebsite']);
		$cphone = mysqli_real_escape_string($db, $_POST['cphone']);
		$cemail = mysqli_real_escape_string($db, $_POST['cemail']);

        if($cname != "")
		{
			$q = "UPDATE st_details set Stname='$cname' where StpID='$id';";
			mysqli_query($db, $q);
		}
        if($cweb != "")
		{
			$q = "UPDATE st_details set Website='$cweb' where StpID='$id';";
			mysqli_query($db, $q);
		}
        if($cphone != "")
		{
			$q = "UPDATE st_details set Phone='$cphone' where StpID='$id';";
			mysqli_query($db, $q);
		}
        if($cemail != "")
		{
			$q = "UPDATE st_details set Email='$cemail' where StpID='$id';";
			mysqli_query($db, $q);
		}

        header('location: account.php');
    }

    $q = "SELECT * FROM userstp where StpID='$id'";
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
    			$q = "UPDATE userstp set Password= '$pass' where StpID='$id';";
    			mysqli_query($db, $q);
    		}

            header('location: account.php');
		}
        else{
            echo "<script>alert('Invalid Credentials')";
        }


    }


?>
<html>
    <head>
        <title><?=$Stname?>'s Account Settings | Naman Angels India Foundation</title>
        <link href="../img/naman.png" rel="icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
        <hr>
        <div class="container bootstrap snippet">
            <div class="row">
                <div class="col-sm-10"><h1><?=$Stname?></h1></div>
            </div>
            <div class="row">
                <div class="col-sm-4"><!--left col-->
                    <div class="text-center">

                    <!-- <img src="../<?=$Logo?>" class="avatar img-circle img-thumbnail img-fluid img-profile rounded-circle mx-auto" alt="avatar">
                    <h6>Upload a different photo...</h6>
                    <form method="post" action="account.php" enctype="multipart/form-data">
                        <div class="form-group col-sm-9">
                            <input type="file" class="form-control" name="company_image">
                        </div>
                        <div class="form-group col-sm-2">
                                <button class="btn btn-unique" name="image_submit">Submit</button>
                        </div>
                    </form> -->

                        <img src="../<?=$Logo?>" class="avatar img-circle img-thumbnail img-fluid img-profile rounded-circle mx-auto" alt="avatar">
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
                        <li class="list-group-item text-muted">Social presence <i class="fa fa-dashboard fa-1x"></i></li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
                    </ul>
                </div><!--/col-3-->
                <div class="col-sm-8">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#contact">Contact Details</a></li>
                        <li><a data-toggle="tab" href="#account">Change Password</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="contact">
                            <hr>
                            <form class="form" action="account.php" method="post" id="contactForm" name="contactForm">
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="first_name"><h4>Company name</h4></label>
                                        <input type="text" class="form-control" name="company_name" id="company_name" placeholder="<?=$Stname?>" title="Enter your company name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="first_name"><h4>Website</h4></label>
                                        <input type="text" class="form-control" name="cwebsite" id="website" placeholder="<?=$Website?>" title="Enter your website">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="phone"><h4>Phone</h4></label>
                                        <input type="text" class="form-control" name="cphone" id="phone" placeholder="<?=$Phone?>" title="Enter your phone number">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="mobile"><h4>Email Address</h4></label>
                                        <input type="text" class="form-control" name="cemail" id="email" placeholder="<?=$Email?>" title="Enter your email address">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-success" type="submit" name=company_save><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
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
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
        <script src="js/validation.js"></script>
    </body>
</html>
<script>
  	if ( window.history.replaceState ) {
  		window.history.replaceState( null, null, window.location.href );
  	}
  </script>
