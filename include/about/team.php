<?php
    require '../../server.php';
?>
<html>
<head>
  <meta charset="utf-8">
  <title>Team Naman | NAMAN</title>
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
            <!-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p> -->
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
    <section class="sticky-bottom shadow p-1 bg-light">
        <div class="row" style="font-size:12px">
            <div class="col-md-12 text-center p-2">
                <div class="row">
                    <div class="col-md-12 text-center p-1">
                        <div class="col-2 d-inline">
                            <a href="../../#intro" class="text-dark">Home</a>
                        </div>
                        <div class="col-2 d-inline">
                            <a href="../../#about" class="text-dark">About</a>
                        </div>
                        <div class="col-2 d-inline">
                            <a href="terms.php" class="text-dark">Terms and Conditions</a>
                        </div>
                        <div class="col-2 d-inline">
                            <a href="privacy.php" class="text-dark">Privacy Policy</a>
                        </div>
                        <div class="col-2 d-inline">
                            <a href="../../faq.php" class="text-dark">FAQs</a>
                        </div>
                        <div class="col-2 d-inline">
                            <a href="../../#contact" class="text-dark">Contact</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center p-1">
                        <div class="col-md-12 d-block">
                            Copyright @2019 | Designed With by CONTENT AND TECHNICAL TEAM CESS
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center p-1">
                        <div class="col-1 d-inline">
                            <a href="#" class="text-dark"><i class="fa fa-facebook-f"></i></a>
                        </div>
                        <div class="col-1 d-inline">
                            <a href="#" class="text-dark"><i class="fa fa-twitter"></i></a>
                        </div>
                        <div class="col-1 d-inline">
                            <a href="#" class="text-dark"><i class="fa fa-linkedin"></i></a>
                        </div>

                        <div class="col-1 d-inline">
                            <a href="#" class="text-dark"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>