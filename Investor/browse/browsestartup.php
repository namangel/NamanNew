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

     <script>

$(document).ready(function(){
    load_json_data('type');

    function load_json_data(id){
        var html_code = '';
        $.getJSON('../../json/industry.json', function(data){

            function SortByName(x,y){
                return (((x.name).toLowerCase() == (y.name).toLowerCase()) ? 0 : (((x.name).toLowerCase() > (y.name).toLowerCase()) ? 1 : -1 ));
            }

            // Call Sort By Name
            data.sort(SortByName);

            function removeDumplicateValue(myArray){
                var newArray = [];

                $.each(myArray, function(key, value) {
                    var exists = false;
                    $.each(newArray, function(k, val2) {
                        if(value.name == val2.name){ exists = true };
                    });
                    if(exists == false && value.name != "") { newArray.push(value); }
                });

                return newArray;
            }

            data = removeDumplicateValue(data);
            var count = Object.keys(data).length;
            console.log(count);

            html_code += '<option value="">Select Industry '+id+'</option>';
            $.each(data, function(key, value){
                if(value.name != "Others")
                    html_code += '<option value="'+value.name+'" id="'+value.name+'">'+value.name+'</option>';
            });
            html_code += '<option value="Others" id="Others">Others</option>';

            $('#'+id).html(html_code);
        });
    }
});
</script>
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
                    
                            <select class="form-control input-sm" name="indsearchkey" id="type" onchange="CheckInd(this.value);">
                            <option value="">Select Industry Type</option>
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

        <div class="row justify-content-center">
                <?php
                    echo '<center>';
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
                    echo '</center>';
                ?>
        </div>

    </div>


   



</body>

</html>
