
<?php
    require '../server.php';
	if(!isset($_SESSION['StpID']) && !isset($_SESSION['InvID'])) {
        header('location: ../pageerror.php');
    }
    $invid = "";
    $intbtn = 0;
    if(isset($_SESSION['StpID'])) {
          $intbtn = 0;
      }
    if(isset($_SESSION['InvID'])) {
          $invid = $_SESSION['InvID'];
          $intbtn = 1;
      }

	$id = $_GET['st'];
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

    $q = "SELECT * FROM userstp where StpID='$id'";
    $resultverify = mysqli_query($db, $q);
    $rowverify = mysqli_fetch_assoc($resultverify);

    if($rowverify["VerifyMe"] == 0){
        $verifybutton = "VERIFY ME";
        $verifybuttonname = "verifyme";
        $verifyclass = '';
        $verifydisable = '';
    }
    elseif ($rowverify["VerifyMe"] == 1) {
        $verifybutton = "VERIFICATION IN PROGRESS";
        $verifybuttonname = "verificationinprogress";
        $verifyclass = 'disabled';
        $verifydisable = 'disabled';
    }


    if(isset($_POST['verifyme'])){
        $q = "UPDATE userstp set VerifyMe=1 where StpID='$id';";
        mysqli_query($db, $q);
        header('location:index.php#home');
    }

    if($rowverify['Verified'] == 0){
        $verify = '#cf1919';
        $acctype = "Verify Yourself";
        $verifydisable = 'disabled';
        $message = 'Your Account is not yet verified By Naman Angels. Please continue to complete your profile and have an early verification.';
    }
    else{
        $verify = '#18c74d';
        $verifybutton = "Verified Account";
        $message = 'Verified';
        $verifydisable = 'disabled';
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$Stname?>'s Dashboard | Naman Angels India Foundation</title>
    <link href="../img/naman.png" rel="icon">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Custom styles for this template -->
    <link href="css/stp.css" rel="stylesheet">
    <link href="css/owlcarousel.css" rel="stylesheet">
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <style>
        input.error {
            border: 1px dotted red;
        }
        label.error{
            width: 100%;
            color: red;
            font-style: italic;
            margin-left: 20px;
            margin-bottom: 5px;
        }
        @media (max-width: 768px) {
            .back-to-top {
                bottom: 15px;
            }
        }
        .back-to-top {
            position: fixed;
            display: none;
            background: #0e3c58;
            color: #fff;
            width: 44px;
            height: 44px;
            text-align: center;
            line-height: 1;
            font-size: 16px;
            border-radius: 50%;
            right: 15px;
            bottom: 15px;
            transition: background 0.5s;
            z-index: 11;
        }

        .back-to-top i {
            padding-top: 12px;
            color: #fff;
        }
    </style>

</head>

<body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-none d-lg-block">
                <div class="d-none d-lg-block imagebox">
                    <?= "<img class='img-fluid img-profile rounded-circle mx-auto mb-2' src='../".$Logo."' />";?>
                </div>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
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
                    <a class="nav-link js-scroll-trigger" href="../startup/index.php">Back</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- <div class="container-fluid p-0"> -->
    <section class="sticky-top shadow p-2 bg-white d-sm-none d-lg-block ">
      <div class="row">
        <div class="col-12 text-right">
        <button class="btn btn-member" >NAMAN</button>
        <!-- <button class="btn btn-member" onclick="window.open('../browse/browsestartup.php')"><i class="fa fa-navicon" style="font-size:20px;color:white"></i></button> -->
        </div>
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="companybasics">
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
                    <span class="text-primary"><?=$Stname?></span>
                </h1>
            </div>
            <div class="text-right col-md-3">
              <?php
              if($intbtn == 1){
                echo '<form action="index.php" name="interest" method="post">';
                echo '<button class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" type="submit">INTERESTED<?= $intbtn?></button>';
                echo '</form>'
              }
              ?>
            </div>
        </div>

        <div class="subheading"><?=$Email?>
          <!-- <a href="mailto:name@email.com">name@email.com</a> -->
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
        <p class="lead mb-5"><?=$Summary?> </p>
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
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="overview">
        <div class="w-100">
            <div class="row">
                <div class="col-md-9">
                    <h2 class="mb-0">
                        <span class="text-primary">Overview</span>
                    </h2>
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
            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="text-right">
                        <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#AdvisorsForm">Add</a>
                    </div>
                </div>
            </div> -->
            <hr class="m-8">
            <div class="row" style="padding-top:20px">
                <div class="col-md-3">
                    <div class="section-title">
                        <h3>Advisors</h3>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <?php
                        $q = "SELECT * FROM st_advisors where StpID = '$id'";
                        $results=mysqli_query($db, $q);
                        if (mysqli_num_rows($results) > 0) {
                              while($row = mysqli_fetch_assoc($results)) {
                                  echo '<div class="col-md-6" style="padding-bottom:10px">';
                                      echo '<div class="profile-item">';
                                          echo '<div class="media">';
                                              echo '<div class="media-body">';
                                                  echo '<h4 class="media-heading">'.$row['Name'].'</h4>';
                                                  echo $row['Email'];
                                              echo '</div>';
                                          echo '</div>';
                                      echo '</div>';
                                  echo '</div>';
                              }
                            } else {
                                echo '<img src="../img/Contact.png">';
                            }

                        ?>

                        <!-- <div class="col-md-6" style="padding-bottom:10px">
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
                        </div> -->
                    </div>
                </div>
            </div>
            <hr class="m-8">
            <div class="row" style="padding-top:20px">
                <div class="col-md-3">
                    <div class="section-title"><h3>Previous Investors</h3></div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <?php
                        $q = "SELECT * FROM st_previnvestment where StpID = '$id'";
                        $results=mysqli_query($db, $q);
                        if (mysqli_num_rows($results) > 0) {
                              while($row = mysqli_fetch_assoc($results)) {
                                  echo '<div class="col-md-6" style="padding-bottom:10px">';
                                      echo '<div class="profile-item">';
                                          echo '<div class="media">';
                                              echo '<div class="media-body">';
                                                  echo '<h4 class="media-heading">'.$row['Name'].'</h4>';
                                                  echo $row['Email'];
                                              echo '</div>';
                                          echo '</div>';
                                      echo '</div>';
                                  echo '</div>';
                              }
                            } else {
                                echo '<img src="../img/Contact.png">';
                            }
                        ?>



                        <!-- <div class="col-md-6">
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
                        </div> -->
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
                        echo '<span class="text-primary"><a href="mailto:'.$row["Email"].'" target="_top">'.$row["Email"].'</a></span>';
                      echo '</div>';
                    echo '</div>';
                  }
				} else {
					echo '<img src="../img/Contact.png">';
				}
			?>

    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="executivesummary">
      <div class="w-100">
          <div class="row">
            <div class="col-md-9">
                <h2 class="mb-5">Executive Summary</h2>
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

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="financials">
      <div class="w-100">
          <div class="row">
            <div class="col-md-9">
                <h2 class="mb-5">Current Funding Round</h2>
            </div>
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
                      echo '<form method="post" action="index.php#financials">';
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
                    <form action="index.php#documents" method="post" enctype="multipart/form-data">
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
                <form action="index.php#documents" method="post" enctype="multipart/form-data">
                    <input type="file" name="financialprojection" value="Select File">
                    <input type="submit" name="subfinancialprojection" value="Submit">
                </form>
            </div>
            <div style="padding-bottom:40px">
                <h4>Additional Documents</h4>
                <p>Upload any documents to support your company. (Upload all document as a single PDF File )</p>
                <form action="index.php#documents" method="post" enctype="multipart/form-data">
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
                                    echo '<a href="../'.$BPlan.'" class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" role="button" download>Show Business Plan</a>';
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
                                    echo '<a href="../'.$FProjection.'" class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" role="button" download>Show Financial Projection</a>';
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
                                    // echo '<form action="index.php" method="post">';
                                        echo '<a href="../'.$AdDocs.'" class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" role="button" download>Show Additional Documents</a>';
                                    // echo '</form>';
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


  </div>
  <a href="#" class="back-to-top" style="display:inline"><i class="fa fa-chevron-up"></i></a>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/stp.js"></script>

  <!--owl carousal-->
  <script src="js/owlcarousel.js"></script>
  <!--theme script-->
  <script src="js/stpscripts.js"></script>

  <script src="js/finround.js"></script>

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
<script type="text/javascript">
  inactivityTimeout = false;
  resetTimeout();
  function onUserInactivity() {
     window.location.href = "../logoutwarned.php";
  }
  function resetTimeout() {
     clearTimeout(inactivityTimeout);
     inactivityTimeout = setTimeout(onUserInactivity, 1000 * 600);
  }
  window.onmousemove = resetTimeout;
</script>
<script>
    $(document).ready(function(){

    load_json_data('country');

    function load_json_data(id,parent_id,state_id)
    {
       //console.log(parent_id);
       //console.log(id);
     var html_code = '';
     $.getJSON('json/location.json', function(data){

      html_code += '<option value="">Select '+id+'</option>';
      $.each(data, function(key, value){
       if(id == 'country')
       {

         html_code += '<option value="'+value.name+'" id="'+value.id+'">'+value.name+'</option>';
       }
       else if(id == 'state')
       {
           if(value.id == parent_id)
           {
               $.each(data[parent_id-1].states, function(key, value){
               html_code += '<option value="'+key+'">'+key+'</option>';
           });
           }
       }
       else
       {
           // console.log("Parent_id"+parent_id);
           // console.log("State_id"+state_id);

           if(value.id == parent_id)
           {
               $.each(data[parent_id-1].states, function(key, value){
               if(key == state_id)
               {
                   for (var i = 0;i < value.length;i++)
                   {
                       html_code += '<option value="'+value[i]+'">'+value[i]+'</option>';
                   }
               }
           });
       }
       }
      });
      $('#'+id).html(html_code);
     });

    }

    $(document).on('change', '#country', function(){
     var country_id = $('#country option:selected').attr('id');
     //console.log("Hello"+country_id);
     if(country_id != '')
     {
      load_json_data('state',country_id);
     }
     else
     {
      $('#state').html('<option value="">Select state</option>');
      $('#city').html('<option value="">Select city</option>');
     }
    });
    $(document).on('change', '#state', function(){

       var e = document.getElementById("country");
       var country_id = $('#country option:selected').attr('id');

       //console.log("dafafafadfa"+country_id);

       var e = document.getElementById("state");
       var state_id = e.options[e.selectedIndex].text;

   //   var state_id = $(this).val();
   //   var state_id = "Maharashtra";

     if(state_id != '')
     {
      load_json_data('city',country_id,state_id);
     }
     else
     {
      $('#city').html('<option value="">Select city</option>');
     }
    });
   });

   // Back to top button
   $(window).scroll(function() {
          if ($(this).scrollTop() > 100) {
          $('.back-to-top').fadeIn('slow');
          } else {
          $('.back-to-top').fadeOut('slow');
          }
      });
      $('.back-to-top').click(function(){
          $('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
          return false;
      });
</script>
