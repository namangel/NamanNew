<?php require "../server.php";?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Naman|Angels</title>
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
    
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        <!-- Uncomment below i you want to use a preloader -->
        <!-- <div id="preloader"></div> -->
        
        <!-- JavaScript Libraries -->
        <script src="lib/jquery/jquery.min.js"></script>
        <script src="lib/jquery/jquery-migrate.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/mobile-nav/mobile-nav.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/isotope/isotope.pkgd.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        <!-- Contact Form JavaScript File -->
        <script src="contactform/contactform.js"></script>
        
        <!-- Template Main Javascript File -->
        <script src="js/main.js"></script>
    </head>

    <body>
    <?php
                $qu="SELECT * FROM startup_land";
                $results=mysqli_query($db,$qu);
                $row = mysqli_fetch_assoc($results);
                $head = $row['head'];
                $text= $row['text'];
       echo '<section id="about">';
         echo '<div class="container">';
            echo'<header class="section-header">';
              echo   '<h3>'.$head.'</h3>';
               echo '<p>'.$text.'</p>';
                echo'</header>';
              
               echo' <div class="row about-extra">';
                 echo' <div class="col-lg-6 wow fadeInUp">';
                     echo '<img src="../img/Launch.png" class="img-fluid" alt="">';
                      echo '</div>';
                      echo '<div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">';
                      echo '<h4>'.$row["head1"].'</h4>';
                      echo wordwrap($row["para"],180,"<p></p>");
                        
                      echo '</div>';
               echo '</div>';
             
               echo '</div>';
               echo'</section>';
              
              
              echo '<div class="row about-extra">';
                  echo ' <div class="col-lg-6 wow fadeInUp order-1 order-lg-2">';
                     echo ' <img src="../img/Deal.png" class="img-fluid" alt="">';
                      echo '</div>';
              
                       echo' <div class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1">';
                       echo '<h4>'.$row["head3"].'</h4>';
                       echo wordwrap($row["para1"],180,"<p></p>");
                       echo '</div>';
                     ?>
                       <!-- <h4>Raise Capital from Top Angel Investors & VCs.</h4>';'
                          <p>
                                Naman angels provides a single common application for hundreds of angel groups across the world.
                          </p>
                          <p>
                                The Naman Company Profile guides you through the process of honing your application and connecting with the right investors.
                          </p>
                          <p>
                                Thousands of companies have used their profile to collectively raise through the Naman angel network. 
                          </p>
                        </div>
                        
                </div>-->
              
            
   



    </body>
</html>