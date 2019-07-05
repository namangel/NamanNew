<?php
    require('../../server.php');
    if(!isset($_SESSION['InvID'])){
        header('location: ../pageerror.php');
    }
    if(isset($_POST['submit'])){
        $_SESSION['searchbox'] = mysqli_real_escape_string($db, $_POST['searchkey']);
        $_SESSION['searchselect'] = mysqli_real_escape_string($db, $_POST['indsearchkey']);
        header('location: browsestartup.php?pageno=1');
    }

    // if(isset($_POST['indsubmit'])){
    //     $_SESSION['search'] = mysqli_real_escape_string($db, $_POST['indsearchkey']);
    //     header('location: browsebyname.php?pageno=1');
    // }
    $u = $_SESSION['InvID'];
	$qu = "SELECT * FROM inv_details WHERE InvID='$u'";
  	$results = mysqli_query($db, $qu);
	$row = mysqli_fetch_assoc($results);
    $cname = $row['CName'];

    $qu = "SELECT * FROM userinv WHERE InvID='$u'";
  	$resultrow = mysqli_query($db, $qu);
    $row = mysqli_fetch_assoc($results);
    $memberstatus = 'Member';
    if(empty($row['MemID'])){
        $memberstatus = 'NotMember'; ///not a member
    }
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Browse Startups | Naman Angels India Foundation</title>
    <link href="../../img/naman.png" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="../css/browse.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="navbar-header">
                    <img src="/NamanNew/img/logo.png"  height="50" class="d-inline-block align-top" alt="">
            </div>
          <div class="collapse navbar-collapse" id="navbarNav">
            <!-- <ul class="nav navbar-nav ml-auto">
              <li class="nav-item">
                <a class="btn btn-info" href='<?=$path?>'>Back</a>
              </li>
              &nbsp;
              <li class="nav-item">
                <a class="btn btn-secondary" href="../../logout.php">Logout</a>
              </li>

            </ul> -->
        </div>

        </nav>
    </div>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <br>
            <blockquote class="blockquote text-center">
            <p class="mb-0">
                Search among various Startups and Businesses.
            </p>
            </blockquote>

        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <form class="text-align-center" action="browsestartup.php" method="post">
                <div class="card-body row no-gutters align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <input class="form-control form-control-md " name="searchkey" type="search" placeholder="Search Startup name">
                    </div>
                    <div class="input-group-append col-lg-6 col-md-6 col-sm-12">
                        <select class="custom-select" id="inputGroupSelect01" name="indsearchkey">
                            <option value="">Select Industry Type</option>
                            <option value="Advertising">Advertising</option>
                            <option value="Agriculture">Agriculture</option>
                            <option value="Analytics">Analytics</option>
                            <option value="Android">Android</option>
                            <option value="Apps">Apps</option>
                            <option value="Art">Art</option>
                            <option value="Automotive">Automotive</option>
                            <option value="B2B">B2B</option>
                            <option value="Big Data">Big Data</option>
                            <option value="Big Data Analytics">Big Data Analytics</option>
                            <option value="Brand Marketing">Brand Marketing</option>
                            <option value="Business Development">Business Development</option>
                            <option value="Business Services">Business Services</option>
                            <option value="Clean Energy">Clean Energy</option>
                            <option value="Clean Technology">Clean Technology</option>
                            <option value="Cloud Computing">Cloud Computing</option>
                            <option value="Commercial Real Estate">Commercial Real Estate</option>
                            <option value="Consulting">Consulting</option>
                            <option value="Consumer Electronics">Consumer Electronics</option>
                            <option value="Consumer Goods">Consumer Goods</option>
                            <option value="Consumer Internet">Consumer Internet</option>
                            <option value="Consumers">Consumers</option>
                            <option value="Crowdfunding">Crowdfunding</option>
                            <option value="Design">Design</option>
                            <option value="Digital Marketing">Digital Marketing</option>
                            <option value="Digital Media">Digital Media</option>
                            <option value="E-Commerce">E-Commerce</option>
                            <option value="E-Commerce Platforms">E-Commerce Platforms</option>
                            <option value="Education">Education</option>
                            <option value="Enterprise Software">Enterprise Software</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="Events">Events</option>
                            <option value="Fashion">Fashion</option>
                            <option value="Finance">Finance</option>
                            <option value="Fitness">Fitness</option>
                            <option value="Food and Beverages">Food and Beverages</option>
                            <option value="Games">Games</option>
                            <option value="Hardware">Hardware</option>
                            <option value="Health and Wellness">Health and Wellness</option>
                            <option value="Hospitality">Hospitality</option>
                            <option value="Human Resources">Human Resources</option>
                            <option value="Information Technology">Information Technology</option>
                            <option value="Internet">Internet</option>
                            <option value="iOS">iOS</option>
                            <option value="Location Based Services">Location Based Services</option>
                            <option value="Manufacturing">Manufacturing</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Marketplaces">Marketplaces</option>
                            <option value="Media">Media</option>
                            <option value="Medical Devices">Medical Devices</option>
                            <option value="Mobile">Mobile</option>
                            <option value="Mobile Advertising">Mobile Advertising</option>
                            <option value="Mobile Application">Mobile Application</option>
                            <option value="Mobile Commerce">Mobile Commerce</option>
                            <option value="Mobile Games">Mobile Games</option>
                            <option value="Mobile Health">Mobile Health</option>
                            <option value="Mobile Payments">Mobile Payments</option>
                            <option value="Music">Music</option>
                            <option value="Nonprofits">Nonprofits</option>
                            <option value="Online Travel">Online Travel</option>
                            <option value="Payments">Payments</option>
                            <option value="Personal Health">Personal Health</option>
                            <option value="Publishing">Publishing</option>
                            <option value="Real Estate">Real Estate</option>
                            <option value="Recruiting">Recruiting</option>
                            <option value="Restaurants">Restaurants</option>
                            <option value="Retail">Retail</option>
                            <option value="Retail Technology">Retail Technology</option>
                            <option value="SaaS">SaaS</option>
                            <option value="Sales and Marketing">Sales and Marketing</option>
                            <option value="Security">Security</option>
                            <option value="Small and Medium Businesses">Small and Medium Businesses</option>
                            <option value="Social Commerce">Social Commerce</option>
                            <option value="Social Games">Social Games</option>
                            <option value="Social Media">Social Media</option>
                            <option value="Social Media Marketing">Social Media Marketing</option>
                            <option value="Software">Software</option>
                            <option value="Sports">Sports</option>
                            <option value="Technology">Technology</option>
                            <option value="Telecommunications">Telecommunications</option>
                            <option value="Transportation">Transportation</option>
                            <option value="Travel">Travel</option>
                            <option value="User Experience Design">User Experience Design</option>
                            <option value="Venture Capital">Venture Capital</option>
                            <option value="Video">Video</option>
                            <option value="Video Games">Video Games</option>
                            <option value="Web Design">Web Design</option>
                            <option value="Web Development">Web Development</option>
                        </select>
                        <button class="btn btn-md btn-info" type="submit" name="submit" value="Search">Search</button>
                    </div>
                </div>
            </form>
         </div>
    </div>
    <div class="row">
        <?php
            if($memberstatus == 'Member'){
                echo '<p style="color:gray;padding-bottom:10px"><i class="fa fa-lock" aria-hidden="true"></i> Become A Member to have an exclusive access to profile of Startups</p>';
            }
        ?>
    </div>

        <div class="row">
            <?php
                if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                }
                else {
                    $pageno = 1;
                }

                $sname="";
                $sind="";

                $no_of_records_per_page = 4;
                $offset = ($pageno - 1) * $no_of_records_per_page;

                if(isset($_SESSION['searchbox']) || isset($_SESSION['searchselect'])){
                $sname = $_SESSION['searchbox'];
                $sind = $_SESSION['searchselect'];
                }
                $total_pages_sql = "SELECT COUNT(*) FROM Profile where StpName LIKE '%{$sname}%' AND Type LIKE '%{$sind}%'";

                    $result = mysqli_query($db,$total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_rows = $total_rows < 1? 1:$total_rows;
                    $total_pages = ceil($total_rows/$no_of_records_per_page);

                    $sql = "SELECT * FROM Profile where StpName Like '%{$sname}%' AND Type LIKE '%{$sind}%' LIMIT $offset, $no_of_records_per_page";
                    $res_data = mysqli_query($db,$sql);

                    while($row = mysqli_fetch_array($res_data)){

                        $i=$row['StpID'];

                        $sql1 = "SELECT * FROM st_description where StpID='$i';";
                        $res_data1 = mysqli_query($db,$sql1);
                        $row1 = mysqli_fetch_array($res_data1);

                        echo'<div class="col-md-3 ml-5">';
                            echo'<div class="image-flip" ontouchstart="this.classList.toggle(';
                            echo"'hover'";
                            echo"');";
                            echo'">';
                            echo'<div class="mainflip">';
                                echo'<div class="frontside">';
                                    echo'<div class="card" style="width:18rem; height: 22rem;">';
                                        echo'<img class="card-img-top rounded-circle " src="../../'.$row['StpImg'].'" alt="StartUp Logo"  >';
                                        echo'<div class="card-body">';
                                            echo'<h4 class="card-title d-flex justify-content-center">'.$row['StpName'].'</h4>';
                                            echo'<p class="card-text text-center"><b>Industry type:</b> '.$row['Type'].'</p>';
                                            echo'<p class="card-text text-center"><b>Founders:</b> '.$row['FName'].' ,</p>';
                                            echo'<p class="card-text text-center">'.$row['SName'].'</p>';
                                        echo'</div>';
                                    echo'</div>';
                                echo'</div>';
                                echo'<div class="backside">';
                                    echo'<div class="card" style="width:18rem; height: 22rem;">';
                                        echo'<div class="card-header">';
                                            echo'<h4 class="card-title d-flex justify-content-center">'.$row['StpName'].'</h4>';
                                        echo'</div>';
                                        echo'<div class="card-body pitch">';
                                            echo'<h4 class="card-title">One Line Pitch</h4>';
                                            echo'<p class="card-text">'.$row1['OLP'].'</p>';
                                            echo'<span class="d-flex align-content-end flex-wrap"">View profile to get further details!</span>';
                                        echo'</div>';
                                        // echo'<div class="card-footer btn btn-viewprofile">';
                                            $button = "";
                                            if($memberstatus == 'NotMember'){
                                                $button = "<a href='../../profile/index.php?st=".$row['StpID']."' target='_blank'>
                                                <button type='submit' class='card-footer btn btn-viewprofile btn-lg btn-block button' name='subinv' value='View Profile' action='index.php'><span>View Profile</span></button></a>";
                                            }
                                            echo $button;
                                        // echo'</div>';
                                    echo'</div>';
                                echo'</div>';
                            echo'</div>';
                        echo'</div>';
                        echo'</div>';
                    }
                    ?>
                </div>

        <div class="row">

            <div class="col-md-12 float-center">
                <center>
                <?php
                    // echo '<nav aria-label="Page navigation example">';
                    echo '<ul class="pagination">';
                        echo '<li class="page-item"><a href="?pageno=1" class="page-link" >First</a></li>';
                        echo '<li class="page-item ';
                            if($pageno <= 1){ echo 'disabled'; };
                                echo '">';
                                echo'<a class="page-link" href=';
                            if($pageno <= 1){ echo "#"; } else { echo "?pageno=".($pageno - 1); };
                                echo '>Prev</a>';
                        echo '</li>';
                        echo '<li class="page-item ';
                            if($pageno >= $total_pages){ echo 'disabled'; };
                                echo '">';
                                echo '<a class="page-link" href=';
                            if($pageno >= $total_pages){ echo "#"; } else { echo "?pageno=".($pageno + 1); };
                                echo '>Next</a>';
                                echo '</li>';
                        echo "<li class='page-item'><a class='page-link' href='?pageno=$total_pages'>Last</a></li>";
                    echo '</ul>';
                    // echo '</nav>';
                ?>
                    </center>
            </div>


        </div>

    </div>



<?php include('../../include/footer/footersmall.php')?>
</body>
</html>
