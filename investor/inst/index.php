<?php
	require '../../server.php';
	if(!isset($_SESSION['InvID'])){
        header('location: ../pageerror.php');
    }
	$u = $_SESSION['InvID'];
	$qu = "SELECT * FROM inv_details WHERE InvID='$u'";
  $results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
	$fname = $row['FName'];
  $lname = $row['LName'];
  $cname = $row['CName'];
  $web = $row['Website'];
  $city = $row['City'];
  $state = $row['State'];
	$country = $row['Country'];
	$phone = $row['Phone'];
  $email = $row['Email'];
	$website = $row['Website'];

  $qu = "SELECT * FROM inv_addetails WHERE InvID='$u'";
  $results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
	$indOfInt=$row['IOI']==""? '--':$row['IOI'];
	$facebook=$row['Facebook']==""? '--':$row['Facebook'];
	$twitter=$row['Twitter']==""? '--':$row['Twitter'];
	$linkedin=$row['LinkedIn']==""? '--':$row['LinkedIn'];
	$instagram=$row['Instagram']==""? '--':$row['Instagram'];
	$others = $row['Others']==""? '--':$row['Others'];
	// $role = $row['Role']==""? '--':$row['Role'];
	// $partner = $row['Partner']==""? '--':$row['Partner'];
	$invrange = $row['InvRange']==""? '--':$row['InvRange'];
  $summary=$row['Summary']==""? 'Describe yourself and the value of your investment.':$row['Summary'];

	$q = "SELECT * FROM inv_uploads WHERE InvID='$u'";
  $results = mysqli_query($db, $q);
	$row = mysqli_fetch_assoc($results);
	$img = $row['ProfilePic']==""? '/NamanNew/Uploads/default.png':$row['ProfilePic'];

	if(isset($_POST["cbsave"])){
    $cbfname = mysqli_real_escape_string($db, $_POST['cbfname']);
    $cblname = mysqli_real_escape_string($db, $_POST['cblname']);
		// $cbcomp = mysqli_real_escape_string($db, $_POST['cbcomp']);
    $cbcity = mysqli_real_escape_string($db, $_POST['cbcity']);
    $cbstate = mysqli_real_escape_string($db, $_POST['cbstate']);
		$cbcountry = mysqli_real_escape_string($db, $_POST['cbcountry']);
		// $cbrole = mysqli_real_escape_string($db, $_POST['cbrole']);
		// $cbpartner = mysqli_real_escape_string($db, $_POST['cbpartner']);
		$cbioi = mysqli_real_escape_string($db, $_POST['cbioi']);
    $cbrange = mysqli_real_escape_string($db, $_POST['cbrange']);
    $summary = mysqli_real_escape_string($db, $_POST['summary']);
		// $cbweb = mysqli_real_escape_string($db, $_POST['cbweb']);


		if($cbfname != "")
		{
			$q = "UPDATE inv_details set FName ='$cbfname' where InvID='$u';";
			mysqli_query($db, $q);
        }

    if($cblname != "")
		{
			$q = "UPDATE inv_details set LName ='$cblname' where InvID='$u';";
			mysqli_query($db, $q);
		}

		if($cbcity != "")
		{
			$q = "UPDATE inv_details set City='$cbcity' where InvID='$u';";
			mysqli_query($db, $q);
		}
		if($cbstate != "")
		{
			$q = "UPDATE inv_details set State='$cbstate' where InvID='$u';";
			mysqli_query($db, $q);
		}
		if($cbcountry != "")
		{
			$q = "UPDATE inv_details set Country='$cbcountry' where InvID='$u';";
			mysqli_query($db, $q);
		}
        if($cbioi != "")
		{
			$q = "UPDATE inv_addetails set IOI ='$cbioi' where InvID='$u';";
			mysqli_query($db, $q);
		}
		if($cbrange != 'Select Investment')
		{
			$q = "UPDATE inv_addetails set InvRange='$cbrange' where InvID='$u';";
			mysqli_query($db, $q);
        }
		// if($cbweb != "")
		// {
		// 	$q = "UPDATE inv_details set Website='$cbweb' where InvID='$u';";
		// 	mysqli_query($db, $q);
    // }
    
    if($summary != "")
	  {
			$q = "UPDATE inv_addetails set Summary='$summary' where InvID='$u'";
			mysqli_query($db, $q);
    }
		header('location: index.php');
	}


  if(isset($_POST["cfsave"])){
		$sllinkin = mysqli_real_escape_string($db, $_POST['sflinkedin']);
		$sltwit = mysqli_real_escape_string($db, $_POST['sftwitter']);
		$slfb = mysqli_real_escape_string($db, $_POST['sffacebook']);
		$slinst = mysqli_real_escape_string($db, $_POST['sfinstagram']);
    $slots = mysqli_real_escape_string($db, $_POST['sfothers']);
    $sfemail = mysqli_real_escape_string($db, $_POST['sfemail']);
    $sfphone = mysqli_real_escape_string($db, $_POST['sfphone']);
    $sfwebsite = mysqli_real_escape_string($db, $_POST['sfwebsite']);


		if($sfemail != NULL)
		{
			$q = "UPDATE inv_details set Email='$sfemail' where InvID='$u'";
			mysqli_query($db, $q);
		}
		if($sfphone != NULL)
		{
			$q = "UPDATE inv_details set Phone='$sfphone' where InvID='$u'";
			mysqli_query($db, $q);
    }
    if($sfwebsite != NULL)
		{
			$q = "UPDATE inv_details set Website='$sfwebsite' where InvID='$u'";
			mysqli_query($db, $q);
		}


		if($sllinkin != NULL)
		{
			$q = "UPDATE inv_addetails set LinkedIn='$sllinkin' where InvID='$u'";
			mysqli_query($db, $q);
        }
		if($sltwit != NULL)
		{
			$q = "UPDATE inv_addetails set Twitter='$sltwit' where InvID='$u'";
			mysqli_query($db, $q);
        }
		if($slfb != NULL)
		{
			$q = "UPDATE inv_addetails set Facebook='$slfb' where InvID='$u'";
			mysqli_query($db, $q);
		}
		if($slinst != NULL)
		{
			$q = "UPDATE inv_addetails set Instagram='$slinst' where InvID='$u'";
			mysqli_query($db, $q);
		}
		if($slots != NULL)
		{
			$q = "UPDATE inv_addetails set Others='$slots' where InvID='$u'";
			mysqli_query($db, $q);
     }
		header('location: index.php');
  }

	if(isset($_POST['pisave'])){
		$piname = mysqli_real_escape_string($db, $_POST['piname']);
		$piyear = mysqli_real_escape_string($db, $_POST['piyear']);
		$piamount = mysqli_real_escape_string($db, $_POST['piamount']);
		$pistage = mysqli_real_escape_string($db, $_POST['pistage']);
		$pistake = mysqli_real_escape_string($db, $_POST['pistake']);
    $piweb = mysqli_real_escape_string($db, $_POST['piweb']);
    
		$q = "INSERT INTO inv_previnvestment (InvID, Name, Year,Amount, Stage, Stake, Website) VALUES ('$u', '$piname', '$piyear', '$piamount','$pistage','$pistake','$piweb');";
		mysqli_query($db, $q);

		header('location: index.php');
  }
  
  if(isset($_POST['gmsave'])){
    $tmname = mysqli_real_escape_string($db, $_POST['tmname']);
    $tmdesig = mysqli_real_escape_string($db, $_POST['tmdesig']);
    $tmyears = mysqli_real_escape_string($db, $_POST['tmyears']);
    $tmemail = mysqli_real_escape_string($db, $_POST['tmemail']);
    $tmlinkedin = mysqli_real_escape_string($db, $_POST['tmlinkedin']);
		$tmexp = mysqli_real_escape_string($db, $_POST['tmexp']);

		$q = "INSERT INTO inv_group (InvID, Name, Designation, Email, LinkedIn , Years, Expertise) VALUES ('$u','$tmname', '$tmdesig', '$tmemail', '$tmlinkedin', '$tmyears' ,'$tmexp')";
		mysqli_query($db, $q);
    header('location: index.php');

  }
  
  if(isset($_POST['rem_mem'])){
		$mem_id = mysqli_real_escape_string($db, $_POST['member']);

		$q = "DELETE FROM inv_group where ID = $mem_id;";
		mysqli_query($db, $q);

		header('location:index.php');
  }
  
  if(isset($_POST['rem_inv'])){
		$inv_id = mysqli_real_escape_string($db, $_POST['invest']);

		$q = "DELETE FROM inv_previnvestment where ID = $inv_id;";
		mysqli_query($db, $q);

		header('location:index.php');
	}


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Resume - Start Bootstrap Theme</title>



  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



  <!-- Custom styles for this template -->
  <link href="../css/inv.css" rel="stylesheet">
  <link href="../css/owlcarousel.css" rel="stylesheet">

  <style>
      #LinkedIn, #Facebook, #Twitter, #Instagram, #Others{
        display: none;
      }
      .member, .invest{
        display:none;
      }
      .rem_mem , .rem_inv{
        border:0px;
        background-color:#eee;
      }
  </style>

  <script>
    function social() {
      var x = document.getElementById("soc").value;
      if (x== "Facebook")
      {
        document.getElementById("Facebook").style.display = "block";
      }
      if (x== "LinkedIn")
      {
        document.getElementById("LinkedIn").style.display = "block";
      }
      if (x== "Instagram")
      {
        document.getElementById("Instagram").style.display = "block";
      }
      if (x== "Twitter")
      {
        document.getElementById("Twitter").style.display = "block";
      }
      if (x== "Others")
      {
        document.getElementById("Others").style.display = "block";
      }
    }

  </script>


</head>


<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">

      <span class="d-block d-lg-none"><?= cname ?> </span>
      <span class="d-none d-lg-block">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2 " src="../img/profile.jpg" alt="">
      </span>
      <span class="d-block d-lg-block">
         <a href=""  data-toggle="modal" data-target="#profileimageform">
         <i class="fa fa-pencil"></i>
       </a></span>

    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link js-scroll-trigger" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#companybasics">Company Basics</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#teams">Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#investment">Investments </a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#membership">Membership</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#browsestartup">browse startups</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#consultancy">Consultancy</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#settings">Account settings</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="../../logout.php">log out</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid p-0">


      <div class="modal fade" id="profileimageform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">investor Basics</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-3">
                <div class="form-group">
                    <label>Profile Image</label>
                    <input class="row" type="file" name="cbpic" placeholder=" ">
                  </div>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-unique close">Cancel </button>
                <button class="btn btn-unique">Save </button>

              </div>
            </div>
          </div>
      </div>

      <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Contact and Social Presence</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mx-3">
              <form method="post">
                <div class="accordion" id="accordionExample">
                  <div class="card">
                    <h2 class="mb-0">
                    <button class="btn btn-light btn-block btn-lg" type="button" data-toggle="collapse" data-target="#contact" aria-expanded="true" aria-controls="collapseOne">
                      Contact Details
                    </button>
                    </h2>
                    <div id="contact" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                      <div class="card-body">
                        <div class="form-group">
                          <label>Phone</label>
                          <input type="number" class="form-control" name="sfphone" placeholder="<?=$phone?>">
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" class="form-control" name="$sfemail" placeholder="<?=$email?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div>
                      <h2 class="mb-0">
                      <button class="btn btn-light btn-block btn-lg collapsed" type="button" data-toggle="collapse" data-target="#social" aria-expanded="false" aria-controls="collapseTwo">
                      Social Presence
                      </button>
                      </h2>
                    </div>
                    <div id="social" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                      <div class="card-body">
                        <div class="form-group">
                          <label>Website</label>
                          <input type="text" class="form-control" placeholder="<?=$website?>" name="sfwebsite">
                        </div>
                        <div class="form-group">
                          <label>Social Media</label>
                            <select class="custom-select" name="sfsocialmedia" id="soc" required onchange="social()">
                              <option>Select Social media</option>
                              <option value="LinkedIn">LinkedIn</option>
                              <option value="Facebook">Facebook</option>
                              <option value="Instagram">Instagram</option>
                              <option value="Twitter">Twitter</option>
                              <option value="Others">Others</option>
                            </select>

                            <div id="LinkedIn" class="form-group">
                              <i class="fa fa-linkedin">&nbsp;&nbsp;
                              <input type="text" class="form-control" name="sflinkedin" placeholder="<?=$linkedin?>"></i>
                            </div>
                            <div id="Facebook" class="form-group">
                              <i class="fa fa-facebook">&nbsp;&nbsp;
                              <input type="text" class="form-control" name="sffacebook" placeholder="<?=$facebook?>"></i>
                            </div>
                            <div id="Instagram" class="form-group">
                              <i class="fa fa-instagram">&nbsp;&nbsp;
                              <input type="text" class="form-control" name="sfinstagram" placeholder="<?=$instagram?>"></i>
                            </div>
                            <div id="Twitter" class="form-group">
                              <i class="fa fa-twitter">&nbsp;&nbsp;
                              <input type="text" class="form-control" name="sftwitter" placeholder="<?=$twitter?>"></i>
                            </div>
                            <div id="Others" class="form-group">
                              <i class="fa fa-globe">&nbsp;&nbsp;
                              <input type="text" class="form-control" name="sfothers" placeholder="<?=$others?>"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-unique close">Cancel</button>
                <button class="btn btn-unique" name="cfsave">Save</i></button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalInvestmentForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Add a previous investment(max 3)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mx-3">
              <form method="post">
                <div class="form-group">
                  <label>Startup Name</label>
                  <input type="text" class="form-control" name="piname" >
                </div>
                <div class="form-group">
                  <label>Year of Investment</label>
                  <input type="number" min="2000" max="2099" step="1" class="form-control" name="piyear">
                </div>
                <div class="form-group">
                  <label>Amount of Investment</label>
                  <input type="number" class="form-control" name="piamount">
                </div>
                <div class="form-group">
                  <label>Stage</label>
                  <select class="custom-select" name="pistage" required>
                    <option>Select Stage</option>
                    <option>Concept Only</option>
                    <option>Product in Development</option>
                    <option>Prototype ready</option>
                    <option>Full Product Ready</option>
                    <option>Early Revenue Stage</option>
                    <option>Growth Stage</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Stake holding(%)</label>
                  <input type="number" class="form-control" name="pistake">
                </div>
                <div class="form-group">
                  <label>Website of Startup</label>
                  <input type="text" class="form-control" name="piweb">
                </div>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-unique close" data-dismiss="modal" aria-label="Close">Cancel</button>
                <button class="btn btn-unique" name="pisave">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalBasicForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Investor Basics</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mx-3">
            <form method="POST">
              <div class="accordion" id="accordionExample">
                <div class="card">
                  <h2 class="mb-0">
                  <button class="btn btn-light btn-block btn-lg" type="button" data-toggle="collapse" data-target="#basics" aria-expanded="true" aria-controls="collapseOne">
                  Company Details
                  </button>
                  </h2>
                  <div id="basics" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="cbfname" placeholder="<?=$fname?>">
                      </div>
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="cblname" placeholder="<?=$lname?>">
                      </div>
                      <div class="form-group">
                          <label>City</label>
                          <input type="text" class="form-control" name="cbcity" placeholder="<?=$city?>">
                      </div>
                      <div class="form-group">
                        <label>State</label>
                        <input type="text" class="form-control" name="cbstate" placeholder="<?=$state?>">
                      </div>
                      <div class="form-group">
                          <label>Country</label>
                          <input type="text" class="form-control" name="cbcountry" placeholder="<?=$country?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div>
                    <h2 class="mb-0">
                    <button class="btn btn-light btn-block btn-lg collapsed" type="button" data-toggle="collapse" data-target="#industry" aria-expanded="false" aria-controls="collapseTwo">
                    Industry details
                    </button>
                    </h2>
                  </div>
                  <div id="industry" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Industry of Interest</label>
                        <input type="text" class="form-control" name="cbioi" placeholder="<?=$indOfInt?>">
                      </div>
                      <div class="form-group">
                        <label>Investment range</label>
                          <select class="custom-select" name="cbrange">
                            <option>Select Investment</option>
                            <option>0 - 1,00,000</option>
                            <option>1,00,000 - 10,00,000</option>
                            <option>10,00,000 - 50,00,000</option>
                            <option>50,00,000 - 1,00,00,000</option>
                            <option>More than 1,00,00,000</option>
                          </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <h2 class="mb-0">
                  <button class="btn btn-light btn-block btn-lg collapsed" type="button" data-toggle="collapse" data-target="#description" aria-expanded="false" aria-controls="collapseTwo">
                    Company Description
                  </button>
                  </h2>
                  <div id="description" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea row="3" class="form-control" name="summary" placeholder="<?=$summary?>"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-unique close">Cancel</button>
                <button class="btn btn-unique" name="cbsave">Save</button>
              </div>
              </form>
            </div>
          </div>
      </div>

      <div class="modal fade" id="addteamform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Add Group member (max 6)</h4>
              <!-- <p>Your Group is one of the most influential factors driving the investment process.</p> -->
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mx-3">
              <form method="post" >
                <div class="card">
                  <div id="basics" aria-labelledby="headingOne">
                    <div class="card-body">
                      <form>
                        <div class="form-group">
                          <label>Member Name</label>
                          <input type="text" class="form-control" name="tmname" placeholder="">
                        </div>
                        <div class="form-group">
                          <label>Member Designation</label>
                          <input type="text" class="form-control" name="tmdesig"  placeholder="">
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="tmemail" placeholder="">
                        </div>
                        <div class="form-group">
                          <label>Linkedin</label>
                          <input type="text" class="form-control" name="tmlinkedin" placeholder="">
                        </div>
                        <div class="form-group">
                          <label>Experience(in yrs)</label>
                          <input type="text" class="form-control" name="tmyears" placeholder="">
                        </div>
                        <div class="form-group">
                          <label>Expertise</label>
                          <input type="text" class="form-control" name="tmexp" placeholder="">
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-unique close">Cancel </button>
                <button class="btn btn-unique" name="gmsave">Save </button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="ourteamform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Update Group member's Details</h4>
                <!-- <p>Your Group is one of the most influential factors driving the investment process.</p> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
              <div class="card">
                <div id="basics" aria-labelledby="headingOne">
                  <div class="card-body">
                    <form>
                      <div class="form-group">
                        <label>Member Name</label>
                        <input type="text" class="form-control"  placeholder="">
                      </div>
                      <div class="form-group">
                        <label>Member Designation</label>
                        <input type="text" class="form-control"  placeholder="">
                      </div>
                      <div class="form-group">
                        <label>Member Designation</label>
                        <input type="text" class="form-control"  placeholder="">
                      </div>
                      <div class="form-group">
                        <label>Experience(in yrs)</label>
                        <input type="text" class="form-control"  placeholder="">
                      </div>
                      <div class="form-group">
                        <label>Expertise</label>
                        <input type="text" class="form-control"  placeholder="">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button class="btn btn-unique close">Cancel </button>
              <button class="btn btn-unique">Save </button>
            </div>
          </div>
        </div>
      </div>

    
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="home">
      <div class="w-100">
        <div class="user-icons">
          <a href="#">
            <i class="fas fa-user-circle"></i>
          </a>
        </div>

        <h1 class="mb-0">
          <span class="text-primary">Hello <?=$cname?></span>
        </h1>
        <div class="subheading mb-5">GET STARTED.
          <!-- <a href="mailto:name@email.com">name@email.com</a> -->
        </div>
        <p class="lead mb-2">Thank you for your interest in Naman!
            Our team will contact you shortly to discuss your needs and schedulea demo. In the meantime,
            take a look at some startups in your area.
        </p>

        <div class="row" style="padding-top:10px">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12" style="padding-top:20px">
                <div class="profile-item">
                  <div class="media">
                    <div class="media-body">
                      <h4 class="media-heading">Next Steps</h4>
                      Follow the next steps to invest in starups of your interest.
                    </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4" style="padding-top:20px">
                      <div class="profile-item">
                        <div class="media">
                          <div class="media-body step-icons">
                              <a href="#">
                                <i class="fa fa-calendar"></i>
                              </a>
                            <button class="btn btn-steps">Schedule a demo</button>
                            <p>Schedule an introductory call or demo</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4" style="padding-top:20px">
                      <div class="profile-item">
                        <div class="media">
                          <div class="media-body step-icons">
                              <a href="#">
                                <i class="fa fa-registered"></i>
                              </a>
                            <button class="btn btn-steps">Get Registered</button>
                            <p>Complete your enterprise registration</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4" style="padding-top:20px">
                      <div class="profile-item">
                        <div class="media">
                          <div class="media-body step-icons">
                              <a href="#">
                                <i class="fa fa-address-book"></i>
                              </a>
                            <button class="btn btn-steps">Browse Startups</button>
                            <p>Explore latest startups</p>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="social-icons" style="padding-top: 50px">
          <a href="#">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="#">
            <i class="fab fa-github"></i>
          </a>
          <a href="#">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#">
            <i class="fab fa-facebook-f"></i>
          </a>
        </div>
      </div> -->
    </section>

  <hr class="m-0">

  <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="companybasics">
      <div class="w-100">
        <div class="row">
          <div class="col-md-9">
              <h1 class="mb-0">
                  <span class="text-primary"><?=$cname?></span>
                </h1>
          </div>
          <div class="col-md-3">
            <div class="text-right">
              <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalBasicForm">Edit</a>
            </div>
          </div>
        </div>
          <div class="subheading"><?= $city ?> ,&nbsp;<?= $state ?> ,&nbsp;<?= $country ?>.
          </div>
          <div class="subheading mb-5"><?= $fname ?>&nbsp;<?= $lname ?>
          </div>
          <div class="row" >
              <div class="col-md-12">
                  <div class="section-title"><h3>Industry of interest  :   <?= $indOfInt ?></h3></div>
              </div>
          </div>
          <div class="row" >
              <div class="col-md-12">
                  <div class="section-title"><h3>Investment range  :   <?= $invrange ?></h3></div>
              </div>
          </div>
          <div class="row" >
              <div class="col-md-12">
                  <div class="section-title" style="padding-top:50px"><h3>Company description</h3></div>
              </div>
          </div>
          <p class="lead mb-5">Company description ----<?php echo $summary;?></p>
          <div class="row">
              <div class="col-md-9">
                  <div class="section-title"><h3>Email  :  <?=$email?></h3></div>
              </div>
              <div class="col-md-3">
                  <div class="text-right">
                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">Edit</a>
                  </div>
                </div>
          </div>
          <div class="row" >
              <div class="col-md-4">
                  <div class="section-title"><h3>Contact  : <?=$phone?></h3></div>
              </div>
          </div>
          <div class="row" >
              <div class="col-md-4">
                  <div class="section-title"><h3>Website  : <?=$website?></h3></div>
              </div>
          </div>
          <div class="social-icons">
            <a href="#">
              <i class='fab fa-react'></i>
            </a>
            <a href="#">
              <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="#">
              <i class="fab fa-github"></i>
            </a>
            <a href="#">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
          </div>
        </div>
  </section>

  <hr class="m-0">

  <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="teams">
    <div class="w-100">
      <div class="row">
        <div class="col-md-9">
          <h2 class="mb-5">
            Our Team
          </h2>
        </div>
        <div class="col-md-3">
          <div class="text-right">
            <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#addteamform">ADD</a>
          </div>
        </div>
      </div>


      <div class=row>
      <?php
			    	$q = "SELECT * FROM inv_group where InvID='$u';";
		    		$results=mysqli_query($db, $q);
					if (mysqli_num_rows($results) > 0) {
            while($row = mysqli_fetch_assoc($results)) {
              echo '<div class="col-md-6">';
              echo '<div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">';
              echo '<div class="resume-content">';
              echo '<div class="row">';
              echo '<div class="col-md-10">';
              echo '<h3 class="mb-0">';
              echo $row["Name"] ;
              echo '</h3>';
              echo '</div>';
              echo '<div class="col-md-2">';
              echo '<div class="row">';
              echo '<div class="col-md-1">';
              echo '<a href="" data-toggle="modal" data-target="#ourteamform"><i class="fa fa-pencil "></i></a></div>';
              echo '<div class="col-md-1">';    
              echo '<form method="post" action="index.php">
                    <input class="member" type="number" name="member" value="'.$row['ID'].'">
                    <button name="rem_mem" value="rem_mem" type="submit" class="rem_mem"  ><i class="fa fa-close"></i></button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="subheading mb-3">';
                echo $row["Designation"]. "," .$row["Years"].'</div>';
                echo '<p>' .$row["Email"]. " | " .$row["LinkedIn"]. '</p>';
                echo '<p>' .$row["Expertise"]. '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

              }
             }
           else{
            echo 'Add team members with thier details';
          }
?>
</div>

          

      <!-- <div class=row>
          <div class="col-md-6">
            <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
              <div class="resume-content">
                <div class="row">
                  <div class="col-md-10">
                    <h3 class="mb-0">Member Name</h3>
                  </div>
                  <div class="col-md-2">
                    <div class="row">
                      <div class="col-md-1">
                          <a href="" data-toggle="modal" data-target="#ourteamform"><i class="fa fa-pencil "></i></a>
                        </div>
                      <div class="col-md-1">
                        <i class="fa fa-close"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="subheading mb-3">Member Designation, years</div>
                  <p>email | linkedin</p>
                  <p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.</p>
                </div>
              </div>
              </div>

              <div class="col-md-6">
                <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                  <div class="resume-content">
                    <div class="row">
                      <div class="col-md-10">
                        <h3 class="mb-0">Member Name</h3>
                      </div>
                      <div class="col-md-2">
                        <div class="row">
                          <div class="col-md-1">
                              <a href="" data-toggle="modal" data-target="#ourteamform"><i class="fa fa-pencil "></i></a>
                            </div>
                          <div class="col-md-1">
                            <i class="fa fa-close"></i>
                          </div>
                        </div>
                      </div>
                      </div>
                    <div class="subheading mb-3">Member Designation, years</div>
                      <p>email | linkedin</p>
                      <p>Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.</p>
                    </div>
                </div>
              </div>
            </div>

      </div> -->
      </div>

    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="investment">
      <div class="w-100">
          <div class="row">
            <div class="col-md-9">
              <h2 class="mb-5">
                Previous Investments
              </h2>
            </div>
            <div class="col-md-3">
                <div class="text-right">
                  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalInvestmentForm">Add</a>
                </div>
            </div>
          </div>

          <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
            <div class="col-md-12">
              <div class="row">
                <?php
                $q = "SELECT * FROM inv_previnvestment where InvID='$u';";
                $results=mysqli_query($db, $q);
                if (mysqli_num_rows($results) > 0) {
                  while($row = mysqli_fetch_assoc($results)) {

                echo'<div class="col-md-3">
                  <div class="profile-item">
                    <div class="media">
                      <div class="media-body">
                        <h3 class="media-heading">';
                        echo $row["Name"];
                        echo '</h3>';
                        echo '<div class="subheading">'.$row["Website"].'</div>';
                        echo '<p>'.$row["Stage"].'</p>';
                        echo '<p>'.$row["Stake"].'</p>';
                        echo '<p>'.$row["Amount"].'</p>';
                        echo '<p>'.$row["Year"].'</p>';
                      echo '</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-1">
                <form method="post" action="index.php">
                <input class="invest" type="number" name="invest" value="'.$row['ID'].'">
                <button name="rem_inv" value="rem_inv" type="submit" class="rem_inv" ><i class="fa fa-close"></i></button>
                </form>
                </div>';
                  }
                }
                else{
                  echo'<div class="col-md-4">';
                    echo'<div class="profile-item">';
                      echo'<div class="media">';
                        echo'<div class="media-body">';
                          echo '<h3 class="subheading">Add your previous investments!</h3>';
                          echo '<p>Mention the best three investments done and its details.</p>';
                          echo'</div>';
                        echo'</div>';
                      echo'</div>';
                    echo'</div>';
                }
                ?>
            </div>
          </div>
        </div>

      <div class="w-100">
        <div class="row">
            <div class="col-md-3">
              <div class="section-title">
                <h3>Investments Through Naman</h3>
              </div>
            </div>

            <div class="col-md-9">
              <div id="review">

              <?php
                $q = "SELECT * FROM requests where Inv_ID='$u';";
                $results=mysqli_query($db, $q);
                if (mysqli_num_rows($results) > 0) {
                  while($row = mysqli_fetch_assoc($results)) {
                    $stid=$row['St_ID'];
                    $qu = "SELECT * FROM st_details where StpID='$stid';";
                    $result = mysqli_query($db, $qu);
                    $row1= mysqli_fetch_assoc($result);
                      echo '<div class="item">';
                        echo '<div class="media">';
                          echo '<div class="media-body">';
                            echo '<div class="user-name">'.$row1["Stname"].'</div>';
                          echo '</div>';
                        echo '</div>';
                        echo'<div class="review-text">';
                          if($row['Deal'] == 0){
                            echo 'Transaction in progress';
                          }
                          if($row['Deal'] == 1){
                            echo 'Invested';
                             echo 'Amount: '.$row['Amount'];
                        echo '<br>';
                        echo 'Stakeholding: '.$row['Stakehold'];
                        echo '<br>';
                        echo 'Date: '.$row['Date']; 
                        };
                        echo'</div>';
                        echo'</div>';
                      }
                    }
                    else{
                      echo'<div id="review">';
                        echo'<div class="item">';
                          echo'<div class="media">';
                            echo'<div class="media-body">';
                              echo'<div class="user-name">Hello '.$fname.'</div>';
                            echo'</div>';
                          echo'</div>';
                          echo'<div class="review-text">';
                          echo'Start browsing startups and invest now!!';
                          echo'<br>';
                          echo'<a class="nav-link" href="#browsestartup">Browse Startups</a>';
                        echo'</div>';
                      echo'</div>';
                    }
                    ?> 
              </div>
            </div>
      </div>

    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="membership">
      <div class="w-100">
          <h2 class="mb-5">Membership</h2>
          <p class="lead mb-5">"A great business starts from small investment, whereas the small investments start from a big risk." </p>
          <div class="row">
            <div class="col-md-6" style="padding-top:20px">
              <div class="profile-item">
                <div class="media">
                  <div class="media-body">
                    <h3 class="media-heading">Why become a member?</h3>
                    <p class="lead">Becoming a member of Naman Angels enables you to explore the startups and look through their details before investing.
                    Become a member of Naman Angels network, browse through unlimited industries and get premium treatment.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6" style="padding-top:20px">
              <div class="row">
                <div class="col-md-3">
                  <div class="profile-item">
                    <div class="media">
                      <div class="media-body im">
                        <img src="../img/Internet.png" height="100px">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="profile-item">
                    <div class="media">
                      <div class="media-body im">
                        <img src="../img/Food.png" height="100px">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="profile-item">
                    <div class="media">
                      <div class="media-body im">
                        <img src="../img/Education.png" height="100px">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="container-fluid">
              <button type="button" class="btn btn-member" onclick="location.href=#" style="margin:20px 50px 0px 50px">BECOME OUR MEMBER</button>
            </div>
          </div>
      </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="browsestartup">
        <div class="w-100">
          <h2 class="mb-5">Browse Startups</h2>
          <p>Flip through the latest starups connected with Naman!</p>
          <p class="mb-0">Explore the startups of your interest.</p>

        <div class="col-md-12">
          <div class="row">
              <div class="col-md-6" style="padding-top:40px">
                <div class="profile-item">
                  <div class="media">
                    <div class="media-body browse-icons">
                        <a href="../browse/browsebyname.html" target="_blank">
                          <i class="fa fa-font"></i>
                        </a>
                      <button class="btn btn-browse">Browse by name</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6" style="padding-top:40px">
                <div class="profile-item">
                  <div class="media">
                    <div class="media-body browse-icons">
                        <a href="../browse/browsebyindustry.html" target="_blank">
                          <i class="fa fa-industry"></i>
                        </a>
                      <button class="btn btn-browse">Browse by Industry</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="consultancy">
    <div class="w-100">
        <h2 class="mb-5">Contact Naman</h2>
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6" style="padding-top:10px">
            <div class="media-body step-icons">
                <a href="#">
                  <i class="fa fa-phone"></i>
                </a>
              <button class="btn btn-steps">Introductory call</button>
              <div><img src="../img/Call.png" height="250px" width="350px"></div>
                <br>
                <i class="fa fa-phone" style="font-size:20px"> +91 9876543211</i><br>
                <i class="fa fa-phone" style="font-size:20px"> +91 9876543211</i>
                <p>Contact us on any of these numbers for an introductory call.</p>
            </div>
          </div>
          <div class="col-md-6" style="padding-top:10px">
            <div class="media-body step-icons">
                <a href="#">
                  <i class="fa fa-comments"></i>
                </a>
              <button class="btn btn-steps">Schedule a meeting</button>
              <div><img src="../img/Meet.png" height="300px" width="350px"></div>
              <br>
              <button class="btn btn-meetus">Meet us</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <hr class="m-0">

  <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="settings">
    <div class="w-100">
      <h3 class="mb-5">Change Contact Information</h3>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <p class="settings">Company Name:</p>
            </div>
            <div class="col-md-6">
              <p class="settings">Website:</p>
            </div>
          </div>
      </div>
      <div class="w-100">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <p class="settings">Email:</p>
            </div>
            <div class="col-md-6">
              <p class="settings">Phone Number:</p>
            </div>
          </div>
        </div>
      </div>
      <div class="w-100" style="padding-top: 60px">
          <h3 class="mb-5">Change Password</h3>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6">
                  <p class="settings">Current Password:</p>
                </div>
              </div>
          </div>
          <div class="w-100">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6">
                  <p class="settings">New Password:</p>
                </div>
                <div class="col-md-6">
                  <p class="settings">Confirm Password:</p>
                </div>
              </div>
            </div>
          </div>
    </section>

    <hr class="m-0">

  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../js/inv.js"></script>

  <!--owl carousal-->
  <script src="../js/owlcarousel.js"></script>
  <!--theme script-->
  <script src="../js/invscripts.js"></script>

</body>

</html>