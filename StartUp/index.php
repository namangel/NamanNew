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
	$CProb = $row['CustomerProblem'];
	$ProdSer = $row['ProductService'];
	$TarMar = $row['TargetMarket'];
	$BModel = $row['BusinessModel'];
	// $Market = $row['Market'];
	$CSegments = $row['CustomerSegments'];
	$SMStrat = $row['SaleMarketStrat'];
	$Competitors = $row['Competitors'];
	$CompAdv = $row['CompAdvantage'];

  ?>

<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Resume - Start Bootstrap Theme</title>

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
          <a class="nav-link" href="#">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid p-0" style="margin-top:50px">
    <!-- <header id="header" class="fixed-top">
      <div class="container">

        <div class="logo float-left">
          <a href="#intro" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a>
        </div>

        <nav class="main-nav float-right d-none d-lg-block">
          <ul>
            <li class="active"><a href="#intro">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#startups">Startups</a></li>
            <li><a href="#investors">Investors</a></li>

           <li class="drop-down"><a href="">Drop Down</a>
              <ul>
                <li><a href="#">Drop Down 1</a></li>
                <li class="drop-down"><a href="#">Drop Down 2</a>
                  <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                  </ul>
                </li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
                <li><a href="#">Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#contact">Contact Us</a></li>

                <div class="btn-group" style="height: -1000px;">
                    <button type="button" class="btn btn-link btn-group-sm">Sign In</button>
                    <button type="button" class="btn btn-link btn-group-sm">Sign Up</button>
                    </div>
          </ul>
        </nav>

      </div>
    </header> -->

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="home">
        <div class="w-100">
          <div class="user-icons">
            <a href="#">
              <i class="fas fa-user-circle"></i>
            </a>
          </div>

          <h1 class="mb-0">
            <span class="text-primary">Hello <?=$Stname?></span>
          </h1>
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
                                      <button class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" type="submit">EVALUATE</button>
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
          <!-- <div class="col-md-12"> -->
              <!-- <div class="row"> -->
                  <div class="col-md-6" >
                      <div class="profile-item">
                          <div class="media">
                              <div class="media-body">
                                  <button class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" type="submit">Verify</button>
                              </div>
                          </div>
                      </div>
                  </div>
                <!-- </div> -->
          </div>
        </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="companybasics">
      <div class="w-100">
        <h1 class="mb-0">
          <span class="text-primary"><?=$Stname?></span>
        </h1>
        <div class="subheading"><?=$Address?> , <?=$City?> , <?=$State?> , <?=$Country?>.
          <!-- <a href="mailto:name@email.com">name@email.com</a> -->
        </div>
        <div class="subheading mb-5"><?=$OLP?>
          <!-- <a href="mailto:name@email.com">name@email.com</a> -->
        </div>
        <div class="row" >
            <div class="col-md-4">
                <div class="section-title"><h3>Industry  :  <?=$Type?></h3></div>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-4">
                <div class="section-title"><h3>Incorporation Type  :  <?=$IncType?></h3></div>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-4">
                <div class="section-title"><h3>Stage  :  <?=$Stage?></h3></div>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-4">
                <div class="section-title" style="padding-top:50px"><h3>Company Summary</h3></div>
            </div>
        </div>
        <p class="lead mb-5"><?=$Summary?> ---- Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <div class="row">
            <div class="col-md-4">
                <div class="section-title"><h3>Founded  :  <?=$DOF?></h3></div>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-4">
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

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="overview">
      <div class="w-100">
          <!-- <div class="row" style="padding-top:20px">
              <div class="col-md-3">
                  <div class="section-title"><h3>Company Summary</h3></div>
              </div>
              <div class="col-md-9">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="content-item">

                              <p>XYZ Consulting is a new company that provides expertise in search marketing solutions for businesses worldwide, including website promotion, online advertising, and search engine optimization techniques to improve its clients' positioning in search engines. We cater to the higher education market, including colleges, universities, and professional educational institutions.</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div> -->
          <div class="row" style="padding-top:20px">
              <div class="col-md-3">
                  <div class="section-title"><h3>Elevator Pitch</h3></div>
              </div>
              <div class="col-md-9">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="content-item">
                              <!-- <small>2010 - 2012</small>
                              <h3>MA Product Design</h3>
                              <h4>University of California</h4> -->

                              <p>Let's face it. Parking can be a real nightmare. It can be infuriating to find, extremely pricey and by the time you find that spot you would have lost time, petrol, and caused a lot of unnecessary traffic and pollution. Well, there's an answer, parkatmyhouse.com. We are an awesome little company, backed by an awesome big company called BMW. Now, listen in: You can reserve parking in a private property and save up to 70%. Need to park at a sports match or local station? Sorted. ... Just go to parkatmyhouse.com and simply type in where you want to park and what dates. It is that simple.</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row" style="padding-top:20px">
              <div class="col-md-3">
                  <div class="section-title"><h3>Pitch</h3></div>
              </div>
              <div class="col-md-9">
                  <div class="row">
                    <video width="100%" controls><source src='/NamanNew/Startup/videotest.mp4' type='video/mp4'>Your browser does not support the video tag.</video>
                  </div>
              </div>
          </div>
          <div class="row" style="padding-top:20px">
              <div class="col-md-3">
                  <div class="section-title"><h3>Advisors</h3></div>
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

      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="teams">
      <div class="w-100">
        <h2 class="mb-5">Our Team</h2>

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

        <!-- <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0">Member Name</h3>
            <div class="subheading mb-3">Member Designation</div>
            <p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.</p>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary">March 2013 - Present</span>
          </div>
        </div>

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0">Member Name</h3>
            <div class="subheading mb-3">Member Designation</div>
            <p>Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.</p>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary">December 2011 - March 2013</span>
          </div>
        </div>

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0">Member Name</h3>
            <div class="subheading mb-3">Member Designation</div>
            <p>Podcasting operational change management inside of workflows to establish a framework. Taking seamless key performance indicators offline to maximise the long tail. Keeping your eye on the ball while performing a deep dive on the start-up mentality to derive convergence on cross-platform integration.</p>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary">July 2010 - December 2011</span>
          </div>
        </div>

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between">
          <div class="resume-content">
            <h3 class="mb-0">Member Name</h3>
            <div class="subheading mb-3">Member Designation</div>
            <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary">September 2008 - June 2010</span>
          </div>
        </div>

      </div> -->

    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="executivesummary">
      <div class="w-100">
        <h2 class="mb-5">Executive Summary</h2>
        <div class="row" style="padding-top:20px">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6" style="padding-top:20px">
                        <div class="profile-item">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">Customer Problem</h4>
                                    Seamlessly formulate covalent outsourcing vis-a-vis virtual resources. Distinctively conceptualize.<br>
                                    <?=$CProb?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-top:20px">
                        <div class="profile-item">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">Product & Service</h4>
                                    Seamlessly formulate covalent outsourcing vis-a-vis virtual resources. Distinctively conceptualize.<br>
                                    <?=$ProdSer?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-top:20px">
                        <div class="profile-item">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">Target Market</h4>
                                    Seamlessly formulate covalent outsourcing vis-a-vis virtual resources. Distinctively conceptualize.<br>
                                    <?=$TarMar?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-top:20px">
                        <div class="profile-item">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">Business Model</h4>
                                    Seamlessly formulate covalent outsourcing vis-a-vis virtual resources. Distinctively conceptualize.<br>
                                    <?=$BModel?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-top:20px">
                        <div class="profile-item">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">Market Sizing</h4>
                                    Seamlessly formulate covalent outsourcing vis-a-vis virtual resources. Distinctively conceptualize.<br>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-top:20px">
                        <div class="profile-item">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">Customer Segments</h4>
                                    Seamlessly formulate covalent outsourcing vis-a-vis virtual resources. Distinctively conceptualize.<br>
                                    <?=$CSegments?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-top:20px">
                        <div class="profile-item">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">Sales & Marketing Strategy</h4>
                                    Seamlessly formulate covalent outsourcing vis-a-vis virtual resources. Distinctively conceptualize.
                                    <br>
                                    <?=$SMStrat?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-top:20px">
                        <div class="profile-item">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">Competitors</h4>
                                    Seamlessly formulate covalent outsourcing vis-a-vis virtual resources. Distinctively conceptualize.<br>
                                    <?=$Competitors?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-top:20px">
                        <div class="profile-item">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">Competitive Advantage</h4>
                                    Seamlessly formulate covalent outsourcing vis-a-vis virtual resources. Distinctively conceptualize.<br>
                                    <?=$CompAdv?>
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
          <h2 class="mb-5">Current Funding Round</h2>
          <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
            <div class="resume-content">
              <h3 class="mb-0">Round : Round Name</h3>
              <div class="subheading mb-3">Seeking : $10000</div>
              <div class="subheading mb-3">Security Type : My Bungalow</div>
              <div class="subheading mb-3">Premoney Evaluation : $900000</div>
            </div>
            <div class="resume-date text-md-right">
              <span class="text-primary">March 2013 - Present</span>
            </div>
          </div>

        <div class="row" style="padding-bottom:20px">
            <div class="col-md-3">
                <div class="section-title">
                    <h3>Funding History</h3>
                </div>
            </div>

            <div class="col-md-9" style="padding-bottom:20px">
                <div id="review">
                    <div class="item">
                        <div class="media">
                            <div class="media-left">
                                <img src="img/img-testimonial-2.jpg" alt="avatar"/>
                            </div>

                            <div class="media-body">
                                <div class="user-name">Sofia Voigt</div>
                            </div>
                        </div>
                        <div class="review-text">
                            Seamlessly leverage other's transparent resources after resource maximizing channels.
                            Continually grow economically sound collaboration and idea-sharing and compelling
                            technology. Collaboratively unleash.
                        </div>
                    </div>

                    <div class="item">
                        <div class="media">
                            <div class="media-left">
                                <img src="img/img-testimonial-1.jpg" alt="avatar"/>
                            </div>

                            <div class="media-body">
                                <div class="user-name">Matteo Müller</div>
                                <!--.user-name-->

                            </div>
                        </div>
                        <div class="review-text">
                            Uniquely target empowered relationships after client-based e-commerce. Energistically morph
                            worldwide resources for future-proof content. Authoritatively transform granular users
                            whereas intermandated applications.
                        </div>
                        <!--.review-text-->
                    </div>

                    <div class="item">
                        <div class="media">
                            <div class="media-left">
                                <img src="img/img-testimonial-3.jpg" alt="avatar"/>
                            </div>

                            <div class="media-body">
                                <div class="user-name">Noel Schulze</div>
                            </div>
                        </div>
                        <div class="review-text">
                            Enthusiastically mesh an expanded array of infrastructures through distinctive customer
                            service. Distinctively reintermediate e-business information vis-a-vis excellent networks.
                            Uniquely fabricate just.
                        </div>
                    </div>

                    <div class="item">
                        <div class="media">
                            <div class="media-left">
                                <img src="img/unknown.png" alt="avatar"/>
                            </div>

                            <div class="media-body">
                                <div class="user-name">Jason Lehmann</div>
                                <!--.user-name-->

                            </div>
                        </div>
                        <div class="review-text">
                            Proactively network unique potentialities rather than one-to-one process improvements.
                            Dynamically leverage existing progressive methods of empowerment rather than efficient
                            functionalities. Continually.
                        </div>
                        <!--.review-text-->
                    </div>
                    <!--.item-->

                    <div class="item">
                        <div class="media">
                            <div class="media-left">
                                <img src="img/unknown.png" alt="avatar"/>
                            </div>

                            <div class="media-body">
                                <div class="user-name">Jason Lehmann</div>
                                <!--.user-name-->
                            </div>
                        </div>
                        <div class="review-text">
                            Progressively leverage existing 24/7 paradigms through exceptional process improvements.
                            Completely revolutionize compelling architectures for team driven partnerships. Quickly
                            transform focused value.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="padding-bottom:20px">
          <div class="col-md-4">
              <div class="section-title">
                  <h3>Annual Financials</h3>
              </div>
              <div class="subheading mb-3"><p>Annual Revenue Run Rate : 100</p></div>
              <div class="subheading mb-3"><p>Monthly Burn Rate: 11</p></div>
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
                <form action="Doc.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="businessplan" value="Select File">
                    <input type="submit" name="subbusinessplan" value="Submit">
                </form>
            </div>
            <div style="padding-bottom:40px">
                <h4>Financial Projection</h4>
                <p>Provide an overview of where your financials are headed within the next 5 years. Preferred file types: .pdf, .doc, .xls</p>
                <form action="Doc.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="financialprojection" value="Select File">
                    <input type="submit" name="subfinancialprojection" value="Submit">
                </form>
            </div>
            <div style="padding-bottom:40px">
                <h4>Additional Documents</h4>
                <p>Upload any documents to support your company. (Upload all document as a single PDF File )</p>
                <form action="Doc.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="add_doc" value="Select File">
                    <input type="submit" name="sub_add_docs" value="Submit">
                </form>
            </div>

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
