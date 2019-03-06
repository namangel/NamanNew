<?php
    require '../../server.php';
?>
<html>
<head>
  <meta charset="utf-8">
  <title>NewBiz Bootstrap Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: NewBiz
    Theme URL: https://bootstrapmade.com/newbiz-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>
<body>
    <section id="team">
        <div class="container">
            <div class="section-header">
            <h3>Team</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
            </div>

            <div class="row">
                <?php
                $qu = "SELECT * FROM namanteam";
                $results = mysqli_query($db, $qu);

                while($row = mysqli_fetch_assoc($results))
                {
                        echo '<div class="col-lg-3 col-md-6 wow fadeInUp">
                            <div class="member">
                            <img src="../../'.$row['Image'].'" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                <h4>'.$row['Name'].'</h4>
                                <span>'.$row['Description'].'</span>
                                <div class="social">
                                    <a href="'.$row['Link'].'"><i class="fa fa-linkedin"></i></a>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>';
                }
                ?>
            </div>
        </div>
    </section>
</body>
</html>