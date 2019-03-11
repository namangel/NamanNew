<?php
    require('../../server.php');
    if(!isset($_SESSION['InvID'])){
        header('location: ../pageerror.php');
    }
    if(isset($_POST['submit'])){
        $_SESSION['searchbox'] = mysqli_real_escape_string($db, $_POST['searchkey']);
        $_SESSION['searchselect'] = mysqli_real_escape_string($db, $_POST['indsearchkey']);
        header('location: browsebyname.php?pageno=1');
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="../css/browse.css" rel="stylesheet">
    <style>
    .img-profile{
       max-width:10rem;
       max-height:10rem;
       border:.5rem solid rgba(255,255,255,.2)
   }
    </style>


</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-10 col-lg-8">
            <form class="text-align-center" action="browsebyname.php" method="post">
                <div class="card-body row no-gutters align-items-center">
                    <div class="col">
                        <input class="form-control form-control-md " name="searchkey" type="search" placeholder="Search topics or keywords">                        
                    </div>
                    <div class="input-group-append">
                        <select class="custom-select" id="inputGroupSelect01" name="indsearchkey">
                            <option value="">Select Industry</option>
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
                        echo'<div class="col-md-3">';  
                            echo'<div class="image-flip" ontouchstart="this.classList.toggle(';
                            echo"'hover'";
                            echo"');";
                            echo'">';
                            echo'<div class="mainflip">';
                                echo'<div class="frontside">';
                                    echo'<div class="card" style="width:15rem;">';
                                        echo'<img class="card-img-top img- fluid img-profile rounded-circle " src="../../'.$row['StpImg'].'" alt="StartUp Logo"  >';
                                        echo'<div class="card-body">';
                                            echo'<h4 class="card-title">'.$row['StpName'].'</h4>';
                                            echo'<p class="card-text">'.$row['Type'].'</p>';
                                            echo'<p class="card-text">'.$row['FName'].', '.$row['SName'].'</p>';
                                            echo'<p class="card-text">'.$row['SName'].'</p>';
                                        echo'</div>';
                                    echo'</div>';
                                echo'</div>';
                                echo'<div class="backside">';
                                    echo'<div class="card" style="width:15rem;">';
                                        echo'<div class="card-header">';
                                            echo'This is a Header';
                                        echo'</div>';
                                        echo'<div class="card-body">';
                                            echo'<h4 class="card-title">Pitch</h4>';
                                            echo'<p class="card-text">This is pitch.</p>';
                                                $button = "";
                                                if($memberstatus == 'NotMember'){
                                                    $button = "<a href='../../../Profile/index.php?s=".$row['StpID']."' target='_blank'>
                                                    <button type='submit' name='subinv' class='viewprofile' value='View Profile' action='index.php'>View Profile</button></a>";
                                                }
                                                echo $button;
                                        echo'</div>';
                                        echo'<div class="card-footer">';
                                            echo'This is a Footer';
                                        echo'</div>';
                                    echo'</div>';
                                echo'</div>';
                            echo'</div>';
                        echo'</div>';
                        echo'</div>';
                    }
                    ?>
                </div>
            
        <div class="row">
        <?php 
            echo '<nav aria-label="Page navigation example">';
            echo '<ul class="pagination">';
            echo '<li class="page-item">';
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
                echo '</li>';
                echo '</ul>';
            echo '</nav>';
        ?>
        </div>
        </div>      

        
           
</body>
</html>