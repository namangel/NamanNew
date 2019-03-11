<?php
    require('../../server.php');
    if(!isset($_SESSION['InvID'])){
        header('location: ../pageerror.php');
    }
    if(isset($_POST['submit'])){
        $_SESSION['search'] = mysqli_real_escape_string($db, $_POST['searchkey']);
        header('location: browsebyname.php?pageno=1');
    }
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
    <div class="row">
        <div class="container">
        <div class="col-12 col-md-10 col-lg-8">
            <form class="text-align-center" action="browsebyname.php" method="post">
                <div class="card-body row no-gutters align-items-center">
                    <div class="col">
                        <input class="form-control form-control-md " name="searchkey" type="search" placeholder="Search topics or keywords">                        
                    </div>
                    <div class="input-group-append">
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <button class="btn btn-md btn-info" type="submit" name="submit" value="Search">Search</button>
                    </div>
                </form>
        </div>
    </div>

    </div>
    <div class="row">
        <?php
            if($memberstatus == 'Member'){
                echo '<p style="color:gray;padding-bottom:10px"><i class="fa fa-lock" aria-hidden="true"></i> Become A Member to have an exclusive access to profile of Startups</p>';
            }
        ?>
    </div>
    <div class="container">
        <div class="row">
            <?php
                    if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                    }
                    else {
                        $pageno = 1;
                    }

                    $sname="";

                    $no_of_records_per_page = 3;
                    $offset = ($pageno - 1) * $no_of_records_per_page;

                    $sname = $_SESSION['search'];


                $total_pages_sql = "SELECT COUNT(*) FROM Profile where StpName LIKE '%{$sname}%'";

                    $result = mysqli_query($db,$total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_rows = $total_rows < 1? 1:$total_rows;
                    $total_pages = ceil($total_rows/$no_of_records_per_page);

                    $sql = "SELECT * FROM Profile where StpName Like '%{$sname}%' LIMIT $offset, $no_of_records_per_page";
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
            </div>
<div class="row">
<?php
            echo '<div class="pages">';
            echo '<ul class="pagination">';
                echo '<li><a href="?pageno=1">First</a></li>';
                echo '<li class=';
                    if($pageno <= 1){ echo 'disabled'; };
                        echo '>';
                    echo '<a href=';
                    if($pageno <= 1){ echo "#"; } else { echo "?pageno=".($pageno - 1); };
                    echo '>Prev</a>';
                echo '</li>';
                echo '<li class=';
                    if($pageno >= $total_pages){ echo 'disabled'; };
                    echo '>';
                    echo '<a href=';
                    if($pageno >= $total_pages){ echo "#"; } else { echo "?pageno=".($pageno + 1); };
                    echo '>Next</a>';
                echo '</li>';
                echo "<li><a href='?pageno=$total_pages'>Last</a></li>";
            echo '</ul>';
        echo '</div>';
        ?>

    </div>
</body>
</html>