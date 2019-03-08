<!DOCTYPE html>

<?php
    require '../server.php';
	if(!isset($_SESSION['StpID'])){
        header('location: ../pageerror.php');
    }

	$id = $_SESSION['StpID'];
	$qu = "SELECT * FROM st_details WHERE StpID = '$id'";
	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
	$Stname = $row['Stname'];
	$Ffname = $row['Ffname'];
	$Sfname = $row['Sfname'];
	$Email = $row['Email'];
	$Phone = $row['Phone'];
	$Type = $row['Type'];
	$Address = $row['Address'];
	$City = $row['City'];
	$State = $row['State'];
	$Country = $row['Country'];
	$Website = $row['Website'];
	$Inv = $row['Investment'];

	$q = "SELECT * FROM st_addetails WHERE StpID = '$id';";
	$results = mysqli_query($db, $q);
	$row = mysqli_fetch_assoc($results);
	$Stage = $row['Stage'] == "" ? '--' : $row['Stage'];
	$DOF = $row['DOF'] == "" ? '--' : $row['DOF'];
	$EmpNum = $row['EmpNum']==""? '--':$row['EmpNum'];
	$IncType = $row['IncType']==""? '--':$row['IncType'];
	$LinkedInLink = $row['LinkedIn']==""? '--':$row['LinkedIn'];
	$TwitterLink = $row['Twitter']==""? '--':$row['Twitter'];
	$FBLink = $row['Facebook']==""? '--':$row['Facebook'];
	$InstaLink = $row['Instagram']==""? '--':$row['Instagram'];
	$others = $row['Others']==""? '--':$row['Others'];
	$YTLink = $row['Youtube']==""? '--':$row['Youtube'];

	$q = "SELECT * FROM st_uploads WHERE StpID = '$id';";
	$results = mysqli_query($db, $q);
	$row = mysqli_fetch_assoc($results);
	$PitchName = $row['PitchName'];
	$PitchExt = $row['PitchExt'];
	$Logo = $row['Logo'];
  $Backimg = $row['BackImg'];

	$q = "SELECT * FROM st_description WHERE StpID = '$id';";
	$results = mysqli_query($db, $q);
	$row = mysqli_fetch_assoc($results);
	$Summary = $row['Summary']==""? 'Tell the world who you are and what makes your company special.':$row['Summary'];
	$OLP = $row['OLP']==""? 'Write A Short Pitch For Your Company In One Line':$row['OLP'];

  $qu = "SELECT * FROM st_description WHERE StpID = '$id';";
	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);

	// $MTeam = $row['MTeam'];
  $CProb = $row['CustomerProblem']==""? 'What customer problem does your product and/or service solve?':$row['CustomerProblem'];
	$ProdSer = $row['ProductService']==""? 'Describe the product or service that you will sell and how it solves the customer problem, listing the main value proposition for each product/service.':$row['ProductService'];
	$TarMar = $row['TargetMarket']==""? 'Define the important geographic, demographic, and/or psychographic characteristics of the market within which your customer segments exist.':$row['TargetMarket'];
	$BModel = $row['BusinessModel']==""? 'What strategy will you employ to build, deliver, and retain company value (e.g., profits)?':$row['BusinessModel'];
	$Market = "Estimate and realize the potential of you Market.";
	$CSegments = $row['CustomerSegments']==""? 'Outline your targeted customer segments. These are the specific subsets of your target market that you will focus on to gain traction.':$row['CustomerSegments'];
	$SMStrat = $row['SaleMarketStrat']==""? 'What is your customer acquisition and retention strategy? Detail how you will promote, sell and create customer loyalty for your products and services.':$row['SaleMarketStrat'];
	$Competitors = $row['Competitors']==""? 'Describe the competitive landscape and your competitors strengths and weaknesses. If direct competitors dont exist, describe the existing alternatives.':$row['Competitors'];
	$CompAdv = $row['CompAdvantage']==""? 'What is your companys competitive or unfair advantage? This can include patents, first mover advantage, unique expertise, or proprietary processes/technology.':$row['CompAdvantage'];


  $qrnd = "SELECT * FROM current_round WHERE StpID='$id'";
	$roundresult = mysqli_query($db, $qrnd);
	if(mysqli_num_rows($roundresult)== 1){
        $q = "SELECT * FROM current_round WHERE StpID = '$id'";
        $results = mysqli_query($db, $q);
        $row = mysqli_fetch_assoc($results);

        $RndName = $row['Round'];
        $Seek = $row['Seeking'];
        $SecType = $row['Security_type'];
        $PreVal = $row['Premoney_val'];
        $ValCap = $row['Val_cap'];
        $ConvDisc = $row['Conversion_disc'];
        $IntRate = $row['Interest_rate'];
        $Termlen = $row['Term_len'];
        $RndBtn = "Close Round";
        $RndBlock = 0;
    }
    else{
        $RndBtn = "Open Round";
        $RndBlock = 1;
    }

    $y=date("Y");
    $q = "SELECT revenue_rate,burn_rate,revenue_driver FROM annual_financial WHERE StpId='$id' AND year= '$y' ";
    $results = mysqli_query($db, $q);
    $row=mysqli_fetch_array($results);
    $revrr= $row[0];
    $mbr= $row[1];
    $revdr= $row[2];


    $q = "SELECT * FROM st_uploads WHERE StpID = '$id';";
  	$results = mysqli_query($db, $q);
  	$row = mysqli_fetch_assoc($results);
  	$PitchName = $row['PitchName'];
  	$PitchExt = $row['PitchExt'];
  	$Logo = $row['Logo'];
  	$Backimg = $row['BackImg'];
  	$BPlan = $row['BPlan'];
  	$BPlanExt = $row['BPlanExt'];
  	$FProjection = $row['FProjection'];
  	$FProjectionExt = $row['FProjectionExt'];
  	$AdDocs = $row['AdDocs'];
  	$AdDocsExt = $row['AdDocsExt'];


    if(isset($_POST["cbsave"])){
    		$cbname = mysqli_real_escape_string($db, $_POST['cbname']);
    		$cbstage = mysqli_real_escape_string($db, $_POST['cbstage']);
    		$cbaddress = mysqli_real_escape_string($db, $_POST['cbaddress']);
    		$cbcity = mysqli_real_escape_string($db, $_POST['cbcity']);
    		$cbstate = mysqli_real_escape_string($db, $_POST['cbstate']);
    		$cbcountry = mysqli_real_escape_string($db, $_POST['cbcountry']);
    		$cbdate = mysqli_real_escape_string($db, $_POST['cbdate']);
    		$cbempnum = mysqli_real_escape_string($db, $_POST['cbempnum']);
    		$cbinc = mysqli_real_escape_string($db, $_POST['cbinc']);
    		$cbweb = mysqli_real_escape_string($db, $_POST['cbweb']);
            $cbsummary = mysqli_real_escape_string($db, $_POST['cbsummary']);


    		if($cbname != "")
    		{
    			$q = "UPDATE st_details set Stname='$cbname' where StpID='$id';";
    			mysqli_query($db, $q);
    		}

    		if($cbstage != 'Select Stage')
    		{
    			$q = "UPDATE st_addetails set Stage='$cbstage' where StpID='$id';";
    			mysqli_query($db, $q);
    		}
    		if($cbaddress != "")
    		{
    			$q = "UPDATE st_details set Address='$cbaddress' where StpID='$id';";
    			mysqli_query($db, $q);
    		}
    		if($cbcity != "")
    		{
    			$q = "UPDATE st_details set City='$cbcity' where StpID='$id';";
    			mysqli_query($db, $q);
    		}
    		if($cbstate != "")
    		{
    			$q = "UPDATE st_details set State='$cbstate' where StpID='$id';";
    			mysqli_query($db, $q);
    		}
    		if($cbcountry != "")
    		{
    			$q = "UPDATE st_details set Country='$cbcountry' where StpID='$id';";
    			mysqli_query($db, $q);
    		}
    		if($cbdate != "")
    		{
    			$q = "UPDATE st_addetails set DOF='$cbdate' where StpID='$id';";
    			mysqli_query($db, $q);
    		}
    		if($cbempnum != "")
    		{
    			$q = "UPDATE st_addetails set EmpNum='$cbempnum' where StpID='$id';";
    			mysqli_query($db, $q);
    		}
    		if($cbinc != 'Select Incorporation')
    		{
    			$q = "UPDATE st_addetails set IncType='$cbinc' where StpID='$id';";
    			mysqli_query($db, $q);
    		}
    		if($cbweb != "")
    		{
    			$q = "UPDATE st_details set Website='$cbweb' where StpID='$id';";
    			mysqli_query($db, $q);
    		}
            if($cbsummary != "")
    		{
                $q = "UPDATE st_description set Summary='$cbsummary' where StpID='$id';";
        		mysqli_query($db, $q);
    		}
    		header('location:index.php');
	     }


    if(isset($_POST['essave'])){
        $CProb = mysqli_real_escape_string($db, $_POST['custform']);
        $ProdSer = mysqli_real_escape_string($db, $_POST['prodser']);
        $TarMar = mysqli_real_escape_string($db, $_POST['TarMar']);
        $BModel = mysqli_real_escape_string($db, $_POST['BModel']);
        $MarketSizing = mysqli_real_escape_string($db, $_POST['MarketSizing']);
        $CSegments = mysqli_real_escape_string($db, $_POST['CSegments']);
        $SMStrat = mysqli_real_escape_string($db, $_POST['SMStrat']);
        $Competitors = mysqli_real_escape_string($db, $_POST['Competitors']);
        $CompAdv = mysqli_real_escape_string($db, $_POST['CompAdv']);

        if($CProb != ""){
    		$q = "UPDATE st_description SET CustomerProblem='$CProb' WHERE StpID = '$id';";
    		mysqli_query($db, $q);
    	}
        if($ProdSer != ""){
    		$q = "UPDATE st_description SET ProductService='$ProdSer' WHERE StpID = '$id';";
    		mysqli_query($db, $q);
    	}
        if($TarMar != ""){
    		$q = "UPDATE st_description SET TargetMarket='$TarMar' WHERE StpID = '$id';";
    		mysqli_query($db, $q);
    	}
        if($BModel != ""){
    		$q = "UPDATE st_description SET BusinessModel='$BModel' WHERE StpID = '$id';";
    		mysqli_query($db, $q);
    	}
        if($MarketSizing != ""){
            $q = "UPDATE st_description SET MarketSizing='$MarketSizing' WHERE StpID = '$id';";
            mysqli_query($db, $q);
        }
        if($CSegments != ""){
    		$q = "UPDATE st_description SET CustomerSegments='$CSegments' WHERE StpID = '$id';";
    		mysqli_query($db, $q);
    	}
        if($SMStrat != ""){
    		$q = "UPDATE st_description SET SaleMarketStrat='$SMStrat' WHERE StpID = '$id';";
    		mysqli_query($db, $q);
    	}
        if($Competitors != ""){
    		$q = "UPDATE st_description SET Competitors='$Competitors' WHERE StpID = '$id';";
    		mysqli_query($db, $q);
    	}
        if($CompAdv != ""){
    		$q = "UPDATE st_description SET CompAdvantage='$CompAdv' WHERE StpID = '$id';";
    		mysqli_query($db, $q);
    	}

        header('location:index.php');
    }
    
    if(isset($_POST['roundsave'])){
    		$Round = mysqli_real_escape_string($db, $_POST['round']);
    		$Seek = mysqli_real_escape_string($db, $_POST['seeking']);
    		$Sec_type = mysqli_real_escape_string($db, $_POST['security']);
    		$Premoney_val = mysqli_real_escape_string($db, $_POST['preval']);
    		$Val_cap = mysqli_real_escape_string($db, $_POST['valcap']);
    		$Discount = mysqli_real_escape_string($db, $_POST['discount']);
    		$Interest = mysqli_real_escape_string($db, $_POST['interest']);
    		$Term = mysqli_real_escape_string($db, $_POST['term']);

    		if( $Sec_type == 'Preferred Equity' || $Sec_type == 'Common Equity' ){
    			$q = "INSERT INTO current_round(StpId,Round,Seeking,Security_type,Premoney_val) values('$id','$Round','$Seek','$Sec_type',$Premoney_val)";
    			mysqli_query($db, $q);
    		  }
    		if( $Sec_type == 'Convertible Notes' ){
    			$q = "INSERT INTO current_round(StpId,Round,Seeking,Security_type,Val_cap,Conversion_disc,Interest_rate,Term_len) values('$id','$Round','$Seek','$Sec_type','$Val_cap','$Discount','$Interest','$Term')";
    			mysqli_query($db, $q);
    		  }
    		header('location:index.php');
	   }
   
   if(isset($_POST['roundclose'])){
  		$Capraised = mysqli_real_escape_string($db, $_POST['capraise']);
  		$Cldate = mysqli_real_escape_string($db, $_POST['cal']);

  		$q= "SELECT Round,Security_type FROM current_round WHERE StpID = '$id';";
  		$results = mysqli_query($db, $q);
  		$row=mysqli_fetch_array($results);

  		$q1= "INSERT INTO round_history(StpID,Round,Security_type,Capital_raised,Close_date) values('$id','$row[0]','$row[1]','$Capraised','$Cldate')";
  		mysqli_query($db, $q1);

  		$q2 = "DELETE FROM current_round WHERE StpId='$id'";
  		mysqli_query($db, $q2);

  		header('location:index.php#financials');
  	 }

    if(isset($_POST['histdel'])){
    		$Hid= mysqli_real_escape_string($db, $_POST['hid']);
    		$q2 = "DELETE FROM round_history WHERE HistID='$Hid'";
    		mysqli_query($db, $q2);

    		header('location:index.php');
    	}

    $q = "SELECT * FROM userstp where StpID='$id'";
    $resultverify = mysqli_query($db, $q);
    $rowverify = mysqli_fetch_assoc($resultverify);

    if($rowverify["VerifyMe"] == 0){
        $verifybutton = "VERIFY ME";
        $verifybuttonname = "verifyme";
        $verifyclass = '';
    }
    elseif ($rowverify["VerifyMe"] == 1) {
        $verifybutton = "VERIFICATION IN PROGRESS";
        $verifybuttonname = "verificationinprogress";
        $verifyclass = 'disabled';
    }

    if(isset($_POST['verifyme'])){
        $q = "UPDATE userstp set VerifyMe=1 where StpID='$id';";
        mysqli_query($db, $q);
        header('location:index.php');
    }

    if($rowverify['Verified'] == 0){
        $verify = '#cf1919';
        $acctype = "Verify Yourself";
        $message = 'Your Account is not yet verified By Naman Angels. Please continue to complete your profile and have an early verification.';
    }
    else{
        $verify = '#18c74d';
        $acctype = "Verified Account";
        $message = 'Verified';
    }


    if(isset($_POST['subbusinessplan'])){
        $name= $Stname."_bplan_".$_FILES['businessplan']['name'];
        $tmp_name= $_FILES['businessplan']['tmp_name'];
        $submitbutton= $_POST['subbusinessplan'];
        $position= strpos($name, ".");
        $fileextension= substr($name, $position + 1);
        $fileextension= strtolower($fileextension);
        $success= -1;
        if (isset($name)){
            $pathas = 'uploads/startup/'.$name;
            $path= '../uploads/startup/'.$name;
            if (!empty($name)){
                if ($fileextension !== "pdf"){
                    $success=0;
                    echo '<script>alert("The file extension must be .pdf in order to be uploaded")</script>';
                }
                else if ($fileextension == "pdf"){
                    $success=1;
                    if (copy($tmp_name, $path)) {
                        echo '<script> alert("Uploaded!")</script>';
                        $q = "UPDATE st_uploads SET BPlan='$pathas', BPlanExt='$fileextension' where StpID='$id';";
                        mysqli_query($db, $q);
                    }
                }
            }
        }
        header('location:index.php');
    }


    if(isset($_POST['subfinancialprojection'])){
    		$name= $Stname."_fproj_".$_FILES['financialprojection']['name'];
    		$tmp_name= $_FILES['financialprojection']['tmp_name'];
    		$submitbutton= $_POST['subfinancialprojection'];
    		$position= strpos($name, ".");
    		$fileextension= substr($name, $position + 1);
    		$fileextension= strtolower($fileextension);
    		$success= -1;
    		if (isset($name)){
    			$pathas = 'uploads/startup/'.$name;
    			$path= '../uploads/startup/'.$name;
    			if (!empty($name)){
    				if ($fileextension !== "pdf"){
    					$success=0;
    					echo '<script>alert("The file extension must be .pdf in order to be uploaded")</script>';
    				}
    				else if ($fileextension == "pdf"){
    					$success=1;
    					if (copy($tmp_name, $path)) {
    						echo '<script> alert("Uploaded!")</script>';
    						$q = "UPDATE st_uploads SET FProjection='$pathas', FProjectionExt='$fileextension' where StpID='$id';";
    						mysqli_query($db, $q);
    					}
    				}
    			}
    		}
    		header('location:index.php');
    	}

	if(isset($_POST['sub_add_docs'])){
		$name= $Stname."_add_doc_".$_FILES['add_doc']['name'];
		$tmp_name= $_FILES['add_doc']['tmp_name'];
		$submitbutton= $_POST['sub_add_docs'];
		$position= strpos($name, ".");
		$fileextension= substr($name, $position + 1);
		$fileextension= strtolower($fileextension);
		$success= -1;
		if (isset($name)){
			$pathas = 'uploads/startup/'.$name;
			$path= '../uploads/startup/'.$name;
			if (!empty($name)){
				if ($fileextension !== "pdf"){
					$success=0;
					echo '<script>alert("The file extension must be .pdf in order to be uploaded")</script>';
				}
				else if ($fileextension == "pdf"){
					$success=1;
					if (copy($tmp_name, $path)) {
						echo '<script> alert("Uploaded!")</script>';
						$q = "UPDATE st_uploads SET AdDocs='$pathas', AdDocsExt='$fileextension' where StpID='$id';";
						mysqli_query($db, $q);
					}
				}
			}
		}
		header('location:index.php');
	}

?>

<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">
    <link href="css/resume.min.new.css" rel="stylesheet">
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    
    <script src="js/finround.js"></script>


</head>

<body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <!-- <span class="d-block d-lg-none">Clarence Taylor</span> -->
            <span class="d-none d-lg-block">
            <!-- <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="../.''" alt=""> -->
            <?= "<img class='img-fluid img-profile rounded-circle mx-auto mb-2' src='../".$Logo."' />";?>
            </span>
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
                    <a class="nav-link js-scroll-trigger" href="#overview">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#teams">Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#executivesummary">Executive Summary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#financials">Financials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#documents">Documents</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#toolsandservices">Tools and Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#consultancy">Consultancy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid p-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="home">
        <div class="w-100">
          <div class="user-icons">
            <a href="#">
              <i class="fas fa-user-circle" style="color:<?= $verify?>"></i>
            </a>
          </div>
          <h5 class="media-heading"><?=$message?></h5>
          

          <div class="row">
            <div class="col-md-9">
                <h1 class="mb-0">
                  <span class="text-primary">Hello <?=$Stname?>!</span>
                </h1>
            </div>
          </div>

          <div class="subheading mb-1">GET STARTED.
            <!-- <a href="mailto:name@email.com">name@email.com</a> -->
          </div>
          <!-- <p class="lead mb-2">I am experienced in leveraging agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition.</p> -->
          <div class="row" style="padding-top:10px">
              <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-6" style="padding-top:20px">
                          <div class="profile-item">
                              <div class="media">
                                  <div class="media-body">
                                      <h4 class="media-heading">Evaluate Your Startup</h4>
                                      Find out what investors think of your startup. Our automated fundraising coach will help you understan and maximize you project's chaneces of raising money.
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6" style="padding-top:20px">
                          <div class="profile-item">
                              <div class="media">
                                  <div class="media-body">
                                    <center>
                                      <img src="../img/Launch.png" height="200px">
                                    </center>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-2" style="padding-top:20px">
                          <div class="profile-item">
                              <div class="media">
                                  <div class="media-body">
                                      <form action="index.php" method="post">
                                          <button class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" type="submit">EVALUATE</button>
                                      </form>

                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row" style="padding-top:30px">
            <div class="col-md-3">
                <div class="section-title"><h3>Steps to get Funded: </h3></div>
            </div>
              <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-3" style="padding-top:20px">
                          <div class="profile-item">
                              <div class="media">
                                  <div class="media-body">
                                      <div class="steps">
                                        1
                                      </div>
                                      <b class="subheading">Build Your Profile
                                      </b>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3" style="padding-top:20px">
                          <div class="profile-item">
                              <div class="media">
                                  <div class="media-body">
                                    <div class="steps">
                                      2
                                    </div>
                                    <b class="subheading">Verify Yourself
                                    </b>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3" style="padding-top:20px">
                          <div class="profile-item">
                              <div class="media">
                                  <div class="media-body">
                                    <div class="steps">
                                      3
                                    </div>
                                    <b class="subheading">Get Discovered
                                    </b>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3" style="padding-top:20px">
                          <div class="profile-item">
                              <div class="media">
                                  <div class="media-body">
                                    <div class="steps">
                                      4
                                    </div>
                                    <b class="subheading">Get Funding
                                    </b>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row" style="padding-top:50px">
              <div class="col-md-6">
                  <div class="section-title"><h3>Verify your Startup once your profile is built</h3></div>
              </div>
              <div class="col-md-6" >
                  <div class="profile-item">
                      <div class="media">
                          <div class="media-body">
                              <form action="index.php" method="post">
                                  <button class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3 <?=$verifyclass?>" name="<?=$verifybuttonname?>" type="submit"><?=$verifybutton?></button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </section>

    <hr class="m-0">

    <div class="modal fade" id="CompanyBasicForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Company Basics</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <form method="post" action="index.php">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <!-- <label>Company Name</label>
                                    <input type="text" name="cbcomp" class="form-control" placeholder=" "> -->
                                    <label for="name">Company Name</label><br>
                                    <input type="text"  name="cbname" class="form-control" placeholder="<?= $Stname?>">
                                </div>
                                <div class="form-group">
                                    <!-- <label>Founder's First Name</label>
                                    <input type="text" class="form-control" name="cbfname"> -->
                                    <label for="stage">Company Stage</label><br>
                                    <select name="cbstage" class="form-control" placeholder="<?= $Stage?>">
                                        <option value="<?= $Stage?>"><?= $Stage?></option>
                                        <option>Concept Only</option>
                                        <option>Product in Development</option>
                                        <option>Prototype ready</option>
                                        <option>Full Product Ready</option>
                                        <option>Early Revenue Stage</option>
                                        <option>Growth Stage</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <!-- <label>Founder's Last Name</label>
                                    <input type="text" class="form-control" name="cblname"> -->
                                    <label for="cbaddress">Address</label><br>
    								<input name="cbaddress" class="form-control" type="text" placeholder="<?= $Address?>">
                                </div>
                                <div class="form-group">
                                    <!-- <label>Role</label>
                                    <input type="text" class="form-control" name="cbrole"> -->
                                    <label for="cbcity">City</label><br>
                                    <input name="cbcity" class="form-control" type="text" placeholder="<?= $City?>">
                                </div>
                                <div class="form-group">
                                    <!-- <label>City</label>
                                    <input type="text" class="form-control" name="cbcity"> -->
                                    <label for="cbstate">State</label><br>
                                    <input name="cbstate" class="form-control" type="text" placeholder="<?= $State?>">
                                </div>
                                <div class="form-group">
                                    <!-- <label>State</label>
                                    <input type="text" class="form-control" name="cbstate"> -->
                                    <label for="cbcountry">Country</label><br>
                                    <select name="cbcountry" class="form-control" placeholder="<?=$Country?>">
                                        <option value="<?= $Country?>"><?= $Country?></option>
                                        <option value="Afghanisthan">Afghanisthan</option>
                                        <option value="Aland Islands">Aland Islands</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia, Plurinational State">Bolivia, Plurinational State</option>
                                        <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo, the Democratic Republic">Congo, the Democratic Republic</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="C�te d'Ivoire">C�te d'Ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cura�ao">Cura�ao</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guernsey">Guernsey</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="eard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran, Islamic Republic">Iran, Islamic Republic</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jersey">Jersey</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea, Democratic People's Republic">Korea, Democratic People's Republic</option>
                                        <option value="Korea, Republic">Korea, Republic</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macao">Macao</option>
                                        <option value="Macedonia, the former Yugoslav Republic">Macedonia, the former Yugoslav Republic</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia, Federated States">Micronesia, Federated States</option>
                                        <option value="Moldova, Republic">Moldova, Republic</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montenegro">Montenegro</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russian Federation">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Barth�lemy">Saint Barth�lemy</option>
                                        <option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Martin (French part)">Saint Martin (French part)</option>
                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                        <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                                        <option value="South Sudan">South Sudan</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-Leste">Timor-Leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela, Bolivarian Republic">Venezuela, Bolivarian Republic</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <!-- <label>Country</label>
                                    <input type="text" class="form-control" name="cbcountry"> -->
                                    <label for="cbdate">Founding Date</label><br>
                                    <input name="cbdate" class="form-control" type="date" placeholder="<?= $DOF?>">
                                </div>
                                <div class="form-group">
                                    <!-- <label>Country</label>
                                    <input type="text" class="form-control" name="cbcountry"> -->
                                    <label for="cbempnum">Number of Employees</label><br>
                                    <input name="cbempnum" class="form-control" type="number" placeholder="<?= $EmpNum?>">
                                </div>
                                <div class="form-group">
                                    <!-- <label>Country</label>
                                    <input type="text" class="form-control" name="cbcountry"> -->
                                    <label for="inc">Incorporation Type</label><br>
                                    <select name="cbinc" class="form-control" placeholder="<?= $IncType?>">
                                        <option><?= $IncType?></option>
                                        <option>Not Incorporated</option>
                                        <option>Proprietorship</option>
                                        <option>Partnership</option>
                                        <option>LLP</option>
                                        <option>Pvt Ltd</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <!-- <label>Country</label>
                                    <input type="text" class="form-control" name="cbcountry"> -->
                                    <label for="cbweb">Company Website</label><br>
                                    <input name="cbweb" class="form-control" type="text" placeholder="<?= $Website?>">
                                </div>
                                <div class="form-group">
                                    <!-- <label>Country</label>
                                    <input type="text" class="form-control" name="cbcountry"> -->
                                    <label for="cbsummary">Company Website</label><br>
                                    <textarea class="form-control" rows=10 name="cbsummary" id="summ"><?= $Summary?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <!-- <button class="btn btn-unique">Cancel <i class="fas fa-paper-plane-o ml-1"></i></button> -->
                        <button class="btn btn-unique" name="cbsave">Save <i class="fas fa-paper-plane-o ml-1"></i></button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="companybasics">
      <div class="w-100">
          <div class="row">
            <div class="col-md-9">
                <h1 class="mb-0">
                  <span class="text-primary"><?=$Stname?></span>
                </h1>
            </div>
            <div class="col-md-3"><div class="text-center">
                <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#CompanyBasicForm">Edit</a>
              </div>
            </div>
          </div>


        <div class="subheading"><?=$Address?> , <?=$City?> , <?=$State?> , <?=$Country?>.
          <!-- <a href="mailto:name@email.com">name@email.com</a> -->
        </div>
        <div class="subheading mb-5"><?=$OLP?>
          <!-- <a href="mailto:name@email.com">name@email.com</a> -->
        </div>
        <div class="row" >
            <div class="col-md-6">
                <div class="section-title"><h3>Industry  :  <?=$Type?></h3></div>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-6">
                <div class="section-title"><h3>Incorporation Type  :  <?=$IncType?></h3></div>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-6">
                <div class="section-title"><h3>Stage  :  <?=$Stage?></h3></div>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-6">
                <div class="section-title" style="padding-top:50px"><h3>Company Summary</h3></div>
            </div>
        </div>
        <p class="lead mb-5"><?=$Summary?> ---- Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <div class="row">
            <div class="col-md-6">
                <div class="section-title"><h3>Founded  :  <?=$DOF?></h3></div>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-6">
                <div class="section-title"><h3>Employees  :  <?=$EmpNum?></h3></div>
            </div>
        </div>
        <div class="social-icons">
          <a href="<?=$Website?>">
            <i class='fab fa-react'></i>
          </a>
          <a href="<?=$LinkedInLink?>">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="<?=$YTLink?>">
            <i class="fab fa-github"></i>
          </a>
          <a href="<?=$TwitterLink?>">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="<?=$FBLink?>">
            <i class="fab fa-facebook-f"></i>
          </a>
        </div>
      </div>
    </section>

    <hr class="m-0">

    <div class="modal fade" id="OverviewPitchForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Company Overview</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <form method="post" action="index.php">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="olpform">Elevator Pitch</label><br>
                                            <textarea class="form-control" rows=5 name="olpform" id="pitch" required><?= $OLP?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Pitch</label><br>
                                            <input type="file" name="pitchfile" class="form-control">
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <!-- <button class="btn btn-unique">Cancel <i class="fas fa-paper-plane-o ml-1"></i></button> -->
                            <button class="btn btn-unique" name="cbsave">Save <i class="fas fa-paper-plane-o ml-1"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="overview">
        <div class="w-100">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-right">
                        <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#OverviewPitchForm">Edit</a>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top:20px">
                <div class="col-md-3">
                    <div class="section-title">
                        <h3>Elevator Pitch</h3>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content-item">
                                <p>Let's face it. Parking can be a real nightmare. It can be infuriating to find, extremely pricey and by the time you find that spot you would have lost time, petrol, and caused a lot of unnecessary traffic and pollution. Well, there's an answer, parkatmyhouse.com. We are an awesome little company, backed by an awesome big company called BMW. Now, listen in: You can reserve parking in a private property and save up to 70%. Need to park at a sports match or local station? Sorted. ... Just go to parkatmyhouse.com and simply type in where you want to park and what dates. It is that simple.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top:20px">
                <div class="col-md-3">
                    <div class="section-title">
                        <h3>Pitch</h3>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <video width="100%" controls><source src='/NamanNew/Startup/videotest.mp4' type='video/mp4'>Your browser does not support the video tag.</video>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top:20px">
                <div class="col-md-3">
                    <div class="section-title">
                        <h3>Advisors</h3>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="profile-item">
                                <div class="media">
                                    <div class="media-body">
                                        <h4 class="media-heading">ENVATO STUDIO</h4>
                                        Seamlessly formulate covalent outsourcing vis-a-vis virtual resources. Distinctively conceptualize.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-item">
                                <div class="media">
                                    <div class="media-body">
                                        <h4 class="media-heading">FREELANCER</h4>
                                        Seamlessly formulate covalent outsourcing vis-a-vis virtual resources. Distinctively conceptualize.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-item">
                                <div class="media">
                                    <div class="media-body">
                                        <h4 class="media-heading">UPWORK</h4>
                                        Seamlessly formulate covalent outsourcing vis-a-vis virtual resources. Distinctively conceptualize.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-item">
                                <div class="media">
                                    <div class="media-body">
                                        <h4 class="media-heading">PEOPLEPERHOUR</h4>
                                        Seamlessly formulate covalent outsourcing vis-a-vis virtual resources. Distinctively conceptualize.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top:20px">
            <div class="col-md-3">
                <div class="section-title"><h3>Previous Investors</h3></div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <div class="profile-item">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">ENVATO STUDIO</h4>
                                    Seamlessly formulate covalent outsourcing vis-a-vis virtual resources. Distinctively conceptualize.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-item">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">FREELANCER</h4>
                                    Seamlessly formulate covalent outsourcing vis-a-vis virtual resources. Distinctively conceptualize.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="teams">
      <div class="w-100">
          <div class="row">
            <div class="col-md-9">
                <h2 class="mb-5">Our Team</h2>
            </div>
            <div class="col-md-3">
                <div class="text-right">
                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">Edit</a>
                </div>
            </div>
          </div>


        <?php
			$q = "SELECT * FROM st_team where StpID = '$id' AND expertise != '';";
			$results=mysqli_query($db, $q);
			if (mysqli_num_rows($results) > 0) {
                  while($row = mysqli_fetch_assoc($results)) {
                    echo '<div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">';
                      echo '<div class="resume-content">';
                        echo '<h3 class="mb-0">'.$row["FName"].'&nbsp;'.$row["LName"].'</h3>';
                        echo '<div class="subheading mb-3">'.$row["Designation"].'</div>';
                        echo '<p>'.$row["Expertise"].'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate</p>';
                      echo '</div>';
                      echo '<div class="resume-date text-md-right">';
                        echo '<span class="text-primary">'.$row["Email"].'</span>';
                      echo '</div>';
                    echo '</div>';
                  }
								} else {
									echo '<img src="../img/Contact.png">';
								}
							?>

    </section>

    <hr class="m-0">

    <div class="modal fade" id="ExecutiveSummaryForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Executive Summary</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button><br><br>
                    <!-- <h6>You can save the form partially filled and continue filling later</h6> -->
                </div>
                <small class='text-center'>You can save the form partially filled and continue filling later</small>
                <div class="modal-body mx-3">
                    <form method="post" action="index.php">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Customer Problem</label><br>
			    						                  <small>What customer problem does your product and/or service solve? (upto 200 words)</small>
                                        <textarea rows="5" name="custform" id="custform" class='form-control' autofocus></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Products & Services</label><br>
                                        <small>Describe the product or service that you will sell and how it solves the customer problem, listing the main value proposition for each product/service. (upto 200 words)</small>
                                        <textarea rows="5" name="prodser" id="prodser" class='form-control'></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Target Market</label><br>
                                        <small>Define the important geographic, demographic, and/or psychographic characteristics of the market within which your customer segments exist. (upto 200 words)</small>
                                        <textarea rows="5" name="TarMar" id="TarMar" class='form-control'></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Business Model</label><br>
                                        <small>What strategy will you employ to build, deliver, and retain company value (e.g., profits)? (upto 200 words)</small>
                                        <textarea rows="5" name="BModel" id="BModel" class='form-control'></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Market sizing</label><br>
                                        <small>Estimate and realize the potential of you Market.</small>
                                        <textarea rows="5" name="MarketSizing" id="MarketSizing" class='form-control'></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Customer Segments</label><br>
                                        <small>Outline your targeted customer segments. These are the specific subsets of your target market that you will focus on to gain traction. (upto 200 words)</small>
                                        <textarea rows="5" name="CSegments" id="CSegments" class='form-control'></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Sales & Marketing Strategy</label><br>
                                        <small>What is your customer acquisition and retention strategy? Detail how you will promote, sell and create customer loyalty for your products and services. (upto 200 words)</small>
                                        <textarea rows="5" name="SMStrat" id="SMStrat" class='form-control'></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Competitors</label><br>
                                        <small>Describe the competitive landscape and your competitors' strengths and weaknesses. If direct competitors don't exist, describe the existing alternatives. (upto 200 words)</small>
                                        <textarea rows="5" name="Competitors" id="Competitors" class='form-control'></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Competitive Advantage</label><br>
                                        <small>What is your company's competitive or unfair advantage? This can include patents, first mover advantage, unique expertise, or proprietary processes/technology. (upto 200 words)</small>
                                        <textarea rows="5" name="CompAdv" id="CompAdv" class='form-control'></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <!-- <button class="btn btn-unique">Cancel <i class="fas fa-paper-plane-o ml-1"></i></button> -->
                            <button class="btn btn-unique" name="essave">Save <i class="fas fa-paper-plane-o ml-1"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="executivesummary">
      <div class="w-100">
          <div class="row">
            <div class="col-md-9">
                <h2 class="mb-5">Executive Summary</h2>
            </div>
            <div class="col-md-3"><div class="text-right">
                <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#ExecutiveSummaryForm">Edit</a>
              </div>
            </div>
          </div>

          <div class="row" style="padding-top:20px">
              <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-6" style="padding-top:20px">
                          <div class="profile-item">
                              <div class="media">
                                  <div class="media-body">
                                      <h4 class="media-heading">Customer Problem</h4>
                                      <p><?=$CProb?></p>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6" style="padding-top:20px">
                          <div class="profile-item">
                              <div class="media">
                                  <div class="media-body">
                                      <h4 class="media-heading">Product & Service</h4>
                                      <p><?=$ProdSer?></p>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6" style="padding-top:20px">
                          <div class="profile-item">
                              <div class="media">
                                  <div class="media-body">
                                      <h4 class="media-heading">Target Market</h4>
                                      <p><?=$TarMar?>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6" style="padding-top:20px">
                          <div class="profile-item">
                              <div class="media">
                                  <div class="media-body">
                                      <h4 class="media-heading">Business Model</h4>
                                      <p><?=$BModel?>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6" style="padding-top:20px">
                          <div class="profile-item">
                              <div class="media">
                                  <div class="media-body">
                                      <h4 class="media-heading">Market Sizing</h4>
                                    <!-- /NEED TO PUT PHP -->
                                    <p><?=$Market?></p>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6" style="padding-top:20px">
                          <div class="profile-item">
                              <div class="media">
                                  <div class="media-body">
                                      <h4 class="media-heading">Customer Segments</h4>
                                      <p><?=$CSegments?>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6" style="padding-top:20px">
                          <div class="profile-item">
                              <div class="media">
                                  <div class="media-body">
                                      <h4 class="media-heading">Sales & Marketing Strategy</h4>
                                      <p><?=$SMStrat?>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6" style="padding-top:20px">
                          <div class="profile-item">
                              <div class="media">
                                  <div class="media-body">
                                      <h4 class="media-heading">Competitors</h4>
                                      <p><?=$Competitors?>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6" style="padding-top:20px">
                          <div class="profile-item">
                              <div class="media">
                                  <div class="media-body">
                                      <h4 class="media-heading">Competitive Advantage</h4>
                                      <p><?=$CompAdv?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </div>
    </section>

    <hr class="m-0">
    
    <div class="modal fade" id="OpenRoundForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Open Funding Round</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <form method="post" action="index.php">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                          <select name="round" class="form-control">
                                                <option>Select Round</option>
                                                <option value="Founder">Founder</option>
                                                <option value="Friends and Family">Friends and Family</option>
                                                <option value="Angel">Angel</option>
                                                <option value="Preseries A">Preseries A</option>
                                                <option value="Series A">Series A</option>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label>Seeking</label>
                                          <input type="text" class="form-control" name="seeking" placeholder="Numbers Only" size="54">
                                        </div>
                                        <div class="form-group">
                                          <label>Security type</label>
                          									<select name="security" name="sec" id="sec" class="form-control" onchange="valfunc()">
                                                <option value="SecType" selected='selected'>Select Security Type</option>
                                                <option value="Preferred Equity">Preferred Equity</option>
                                                <option value="Common Equity">Common Equity</option>
                                                <option value="Convertible Notes">Convertible Notes</option>
                          									</select>
                                        </div>
                                        <div class="form-group">
                                          <!-- <script>
                                          document.getElementById("notes").style.display = "none";
                                          document.getElementById("equity").style.display = "none";
                                          </script> -->
                                            <span id="equity" class="collapse1">
                          										<label>Pre-Money Valuation</label>
                          										<input type="text" class="form-control" name="preval" placeholder="Numbers Only" size="54">      
                                              <br>
                          									</span>
                          									<span id="notes" class="collapse1">
                          										<label>Valuation Cap</label>
                          										<input type="text" class="form-control" name="valcap" placeholder="Numbers Only" size="54">
                                              <br>
                          										<label>Conversion Discount</label>
                          										<input type="text" class="form-control" name="discount" placeholder="Numbers Only" size="53">
                                              <br>
                          										<label>Interest Rate</label>
                          										<input type="text" class="form-control" name="interest" placeholder="Numbers Only" size="53">
                                              <br>
                          										<label>Term Length</label>
                          										<input type="text" class="form-control" name="term" placeholder="Months" size="55">
                          									</span>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <!-- <button class="btn btn-unique">Cancel <i class="fas fa-paper-plane-o ml-1"></i></button> -->
                            <button class="btn btn-unique" name="roundsave">Start Round <i class="fas fa-paper-plane-o ml-1"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="CloseRoundForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Open Funding Round</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <form method="post" action="index.php">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                    <div class="card-body">
                                        <!-- <div class="form-group">
                                          <label>Round</label>
                                          <input type="text" class="form-control" name="seeking" placeholder="Numbers Only" size="54">
                                        </div> -->
                                        <div class="subheading mb-4">Round : <?= $RndName?></div>
                                        <div class="form-group">
                                          <label>Capital Raised</label>
                                          <input type="text" class="form-control" name="capraise" placeholder="Numbers Only" size="54">
                                        </div>
                                        <div class="form-group">
                                          <label>Closing Date</label>
                                          <input type="date" class="form-control" name="cal" placeholder="Numbers Only" size="54">
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <!-- <button class="btn btn-unique">Cancel <i class="fas fa-paper-plane-o ml-1"></i></button> -->
                            <button class="btn btn-unique" name="roundclose">Close Round<i class="fas fa-paper-plane-o ml-1"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="financials">
      <div class="w-100">
          <div class="row">
            <div class="col-md-9">
                <h2 class="mb-5">Current Funding Round</h2>
            </div>
            <!-- <div class="col-md-3">
                <div class="text-right">
                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">Edit</a>
                </div>
            </div> -->
          </div>

          <!-- <h2 class="mb-5">Current Funding Round</h2> -->
          <?php
              if($RndBlock == 0){
              echo '<div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">';
                echo '<div class="resume-content">';
                  echo '<h3 class="mb-0">Round : '.$RndName.'</h3>';
                  echo '<div class="subheading mb-3">Seeking :'.$Seek.'</div>';
                  echo '<div class="subheading mb-3">Security Type :'.$SecType.'</div>';
                  echo '<div class="subheading mb-3">Premoney Evaluation : '.$PreVal.'</div>';
                  if($SecType == 'Convertible Notes'){
                    echo '<div class="subheading mb-3">Valuation Capital :'.$ValCap.'</div>';
                    echo '<div class="subheading mb-3">Conversion Discount :'.$ConvDisc.'</div>';
                    echo '<div class="subheading mb-3">Interest Rate : '.$IntRate.'</div>';
                    echo '<div class="subheading mb-3">Term Length : '.$Termlen.'</div>';
                  }
                echo '</div>';
                echo '<div class="resume-date text-md-right">';
                  echo '<span class="text-primary"><button class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" data-toggle="modal" data-target="#CloseRoundForm" type="submit">'.$RndBtn.'</button></span>';
                echo '</div>';
              echo '</div>';
            }
            else{
                echo '<div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">';
              echo '<div class="resume-date text-md-right">';
                echo '<span class="text-primary"><button class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" data-toggle="modal" data-target="#OpenRoundForm" type="submit">'.$RndBtn.'</button></span>';
              echo '</div>';
              echo '</div>';
            }
          ?>

        <div class="row" style="padding-bottom:20px">
            <div class="col-md-3">
                <div class="section-title">
                    <h3>Funding History</h3>
                </div>
            </div>



            <div class="col-md-9" style="padding-bottom:20px">
                <div id="review">
                  <?php
					$q= "SELECT * FROM round_history WHERE StpID = '$id';";
					$results = mysqli_query($db, $q);
					while($row=mysqli_fetch_assoc($results)){
                      echo '<div class="item">';
                      echo '<form method="post" action="index.php">';
                      echo '<input type="text" name="hid" value="'.$row['HistID'].'" style="display:none;">';
                      echo '<input type="submit" class="close closebtn" name="histdel"  value="&times" aria-label="Close">';
                      echo '</form>';
                          echo '<div class="media">';
                            echo '  <div class="media-body">';
                                  echo '<div class="user-name subheading">ROUND : '.$row['Round'];
                                  echo '</div>';
                              echo '</div>';
                          echo '</div>';
                          echo '<div class="user-name subheading">SECURITY TYPE : '.$row['Security_type'].'</div>';
                          echo '<div class="user-name subheading">CAPITAL RAISED : Rs.'.$row['Capital_raised'].'</div>';
                          echo '<div class="user-name subheading">CLOSE DATE : '.$row['Close_date'].'</div>';
                      echo '</div>';
      							}
      						?>

                </div>
            </div>
        </div>

        <div class="row" style="padding-bottom:20px">
          <div class="col-md-4">
              <div class="section-title">
                  <h3>Annual Financials</h3>
              </div>
              <div class="subheading mb-3"><p>Annual Revenue Run Rate : <?=$revrr?></p></div>
              <div class="subheading mb-3"><p>Monthly Burn Rate: <?=$mbr?></p></div>
          </div>

          <div class="col-md-8">
              <table class="table table-sm text-center">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">2017</th>
                    <th scope="col">2018</th>
                    <th scope="col">2019</th>
                    <th scope="col">2020</th>
                    <th scope="col">2021</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">ddf $</th>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                  </tr>
                  <tr>
                    <th scope="row">Revenue $</th>
                    <td>21</td>
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                  </tr>
                  <tr>
                    <th scope="row">Expenditure $</th>
                    <td>234</td>
                    <td>324</td>
                    <td>213</td>
                    <td>213</td>
                    <td>213</td>
                  </tr>
                  <tr>
                    <th scope="row">Profit</th>
                    <td>213</td>
                    <td>322</td>
                    <td>213</td>
                    <td>213</td>
                    <td>213</td>
                  </tr>

                </tbody>
              </table>
          </div>

        </div>
      </div>


    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="documents">
        <div class="w-100">
          <h2 class="mb-5">Documents</h2>
            <div style="padding-bottom:40px">
                <h4>Business Plan</h4>
                <p>What is your long term business plan? (Upload .pdf file)</p>
                <div class="">
                    <form action="index.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="businessplan" value="Select File">
                        <input type="submit" name="subbusinessplan" value="Submit">
                    </form>
                </div>

                <!-- echo '<div class="col-md-12">';
                    echo '<div class="row">';
                        echo '<div class="col-md-2" style="padding-top:20px">';
                            echo '<div class="profile-item">';
                                echo '<div class="media">';
                                    echo '<div class="media-body">';
                                        echo '<form action="index.php" method="post">';
                                            echo '<a href="#link" class="btn btn-info" role="button">Link Button</a>';
                                        echo '</form>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>'; -->
                <?php

                // if($BPlan != ""){
                //     // echo '<a href="../'.$BPlan.'" target="_blank">Business Plan</a>';
                //     echo '<div class="col-md-12">';
                //         echo '<div class="row">';
                //             echo '<div class="col-md-3" style="padding-top:20px">';
                //                 echo '<div class="profile-item">';
                //                     echo '<div class="media">';
                //                         echo '<div class="media-body">';
                //                             echo '<form action="index.php" method="post">';
                //                                 echo '<a href="../'.$BPlan.'" class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" role="button">Show Business Plan</a>';
                //                             echo '</form>';
                //                         echo '</div>';
                //                     echo '</div>';
                //                 echo '</div>';
                //             echo '</div>';
                //         echo '</div>';
                //     echo '</div>';
                // }

                ?>
            </div>
            <div style="padding-bottom:40px">
                <h4>Financial Projection</h4>
                <p>Provide an overview of where your financials are headed within the next 5 years. Preferred file types: .pdf, .doc, .xls</p>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="financialprojection" value="Select File">
                    <input type="submit" name="subfinancialprojection" value="Submit">
                </form>
            </div>
            <div style="padding-bottom:40px">
                <h4>Additional Documents</h4>
                <p>Upload any documents to support your company. (Upload all document as a single PDF File )</p>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="add_doc" value="Select File">
                    <input type="submit" name="sub_add_docs" value="Submit">
                </form>
            </div>


            <?php
            echo '<div class="col-md-12">';
                echo '<div class="row">';
            if($BPlan != ""){
                // echo '<a href="../'.$BPlan.'" target="_blank">Business Plan</a>';
                    echo '<div class="col-md-4" style="padding-top:20px">';
                        echo '<div class="profile-item">';
                            echo '<div class="media">';
                                echo '<div class="media-body">';
                                    echo '<form action="index.php" method="post">';
                                        echo '<a href="../'.$BPlan.'" class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" role="button" download>Show Business Plan</a>';
                                    echo '</form>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
            }
            if($FProjection != ""){
                // echo '<a href="../'.$BPlan.'" target="_blank">Business Plan</a>';
                    echo '<div class="col-md-4" style="padding-top:20px">';
                        echo '<div class="profile-item">';
                            echo '<div class="media">';
                                echo '<div class="media-body">';
                                    echo '<form action="index.php" method="post">';
                                        echo '<a href="../'.$FProjection.'" class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" role="button" download>Show Financial Projection</a>';
                                    echo '</form>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
            }
            if($AdDocs != ""){
                // echo '<a href="../'.$BPlan.'" target="_blank">Business Plan</a>';
                    echo '<div class="col-md-4" style="padding-top:20px">';
                        echo '<div class="profile-item">';
                            echo '<div class="media">';
                                echo '<div class="media-body">';
                                    echo '<form action="index.php" method="post">';
                                        echo '<a href="../'.$AdDocs.'" class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" role="button" download>Show Additional Documents</a>';
                                    echo '</form>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
            }
                echo '</div>';
            echo '</div>';

            ?>

        </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="toolsandservices">
      <div class="w-100">
        <h2 class="mb-5">Tools &amp; Services</h2>
        <div class="row" style="padding-top:20px">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4" style="padding-top:20px">
                      <div class="card" style="width: 18rem;">
                          <div class="card-body">
                            <h5 class="card-title">Tool Name</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Tool Price</h6>
                            <p class="card-text">Description Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <button class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" type="submit">Buy</button>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="padding-top:20px">
                      <div class="card" style="width: 18rem;">
                          <div class="card-body">
                            <h5 class="card-title">Tool Name</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Tool Price</h6>
                            <p class="card-text">Description Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <button class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" type="submit">Buy</button>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="padding-top:20px">
                      <div class="card" style="width: 18rem;">
                          <div class="card-body">
                            <h5 class="card-title">Tool Name</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Tool Price</h6>
                            <p class="card-text">Description Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <button class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" type="submit">Buy</button>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="padding-top:20px">
                      <div class="card" style="width: 18rem;">
                          <div class="card-body">
                            <h5 class="card-title">Tool Name</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Tool Price</h6>
                            <p class="card-text">Description Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <button class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" type="submit">Buy</button>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="padding-top:20px">
                      <div class="card" style="width: 18rem;">
                          <div class="card-body">
                            <h5 class="card-title">Tool Name</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Tool Price</h6>
                            <p class="card-text">Description Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <button class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" type="submit">Buy</button>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="padding-top:20px">
                      <div class="card" style="width: 18rem;">
                          <div class="card-body">
                            <h5 class="card-title">Tool Name</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Tool Price</h6>
                            <p class="card-text">Description Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <button class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" type="submit">Buy</button>
                          </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- <ul class="fa-ul mb-0">
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            Google Analytics Certified Developer</li>
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            Mobile Web Specialist - Google Certification</li>
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            1<sup>st</sup>
            Place - University of Colorado Boulder - Emerging Tech Competition 2009</li>
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            1<sup>st</sup>
            Place - University of Colorado Boulder - Adobe Creative Jam 2008 (UI Design Category)</li>
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            2<sup>nd</sup>
            Place - University of Colorado Boulder - Emerging Tech Competition 2008</li>
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            1<sup>st</sup>
            Place - James Buchanan High School - Hackathon 2006</li>
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            3<sup>rd</sup>
            Place - James Buchanan High School - Hackathon 2005</li>
        </ul> -->
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="consultancy">
      <div class="w-100">
        <h2 class="mb-5">Consultancy Form</h2>
        <div class="form">
          <!-- <div id="sendmessage">Your message has been sent. Thank you!</div> -->
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-lg-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-lg-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" type="submit">Submit</button></div>
          </form>
        </div>
        <!-- <ul class="fa-ul mb-0">
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            Google Analytics Certified Developer</li>
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            Mobile Web Specialist - Google Certification</li>
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            1<sup>st</sup>
            Place - University of Colorado Boulder - Emerging Tech Competition 2009</li>
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            1<sup>st</sup>
            Place - University of Colorado Boulder - Adobe Creative Jam 2008 (UI Design Category)</li>
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            2<sup>nd</sup>
            Place - University of Colorado Boulder - Emerging Tech Competition 2008</li>
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            1<sup>st</sup>
            Place - James Buchanan High School - Hackathon 2006</li>
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            3<sup>rd</sup>
            Place - James Buchanan High School - Hackathon 2005</li>
        </ul> -->
      </div>
    </section>


  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/resume.min.js"></script>

  <!--owl carousal-->
  <script src="js/owl.carousel.min.js"></script>
  <!--theme script-->
  <script src="js/scripts.js"></script>

</body>

</html>
