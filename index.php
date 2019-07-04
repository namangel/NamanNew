<?php
 require 'server.php';
 $sql = "SELECT * FROM home;";
 $result = mysqli_query($db, $sql);
 while($row= mysqli_fetch_array($result))
 {
  $tagline = $row['tagline'];
  $abt_us = $row['abt_us'];

 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Home | Naman Angels India Foundation</title>
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


</head>

<body>

  <!--==========================
  Header
  ============================-->
 <?php require "include/header/mainheader.php"?>

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container">

      <div class="intro-img">
        <img src="img/intro.png" alt="" class="img-fluid">
      </div>

      <div class="intro-info">

        <h2>Connect with Entrepreneurs and Investors <br><span> on a single platform</span><br>to help startups grow!</h2>
        <div>
          <a href="#about" class="btn-get-started scrollto">Get Started</a>
          <a href="steps.php" class="btn-services scrollto">Learn what We do</a>
        </div>
      </div>

    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>About Us</h3>
          <p class="text-justify">Naman Angels India Foundation (NAMAN) is Navi Mumbai’s first Seed Investment & Innovation Platform.
            We are committed to disrupt the seed investment in Navi Mumbai and Maharashtra.
            Our innovation platform provides values to startups through its angel networks,
            mentors, venture funds & co-working facility and strategic tie-ups.</p>
        </header>

        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
                <h2 class="title">Featured On</h2>
                <div class="icon-box wow fadeInUp">

                  <div class="icon"> <img src="img/featured/f1.png" class="img-fluid" alt="" style=""></div>
                  <h4 class="title">Economic Times</h4>
                  <p class="description"><br></p>
              </div>

              <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
                  <div class="icon"><img src="img/featured/f2.png" class="img-fluid" alt=""></div>
                  <h4 class="title">Maharashtra Times</h4>
                   <p class="description"><br></p>
               <!--   <p class="description">Setting up incubation centres at top colleges to encourage innovation and support such alphapreneurs.</p>-->
              </div>

              <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
                  <div class="icon"> <img src="img/featured/f3.png" class="img-fluid" alt=""></div>
                  <h4 class="title">University Startup World Cup</h4>
                   <p class="description"><br></p>
                 <!-- <p class="description">Facilitating a Pan-India Network of Entrepreneurs, Investors and Mentors.</p>-->
              </div>

          </div>

          <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp">
            <img src="img/featured.png" class="img-fluid" alt="">

          </div>
        </div>
      <section id="startups">
        <div class="row about-extra">
          <div class="col-lg-6 wow fadeInUp">
            <img src="img/startup.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">
            <h2>Startups.</h2>
            <p>
                Building a successful business requires more than just capital – a motivated team, a business edge, mentoring,
                 technological support and networks NAMAN nurtures the idea of start-ups,
                 helps them grow with proper mentoring and provides varied investment opportunities for the investors.
                </p>
                <p>
                NAMAN ensures that quality startups are given the support they need in the form of capital, tech support and mentoring.
                NAMAN carefully curate startups and hand-hold them through the entire process of angel investing.
                The startups choose by NAMAN and they have an overall access to all amenities of our incubation center, networks and technology support.
                </p>
          <button type="button" class="btn btn-primary" onclick="location.href = './Signing/register_st.php'"   >Register Now!</button>
          </div>
        </div>
      </section>
      <br>
      <br>
      <section id="investors">
        <div class="row about-extra">
          <div class="col-lg-6 wow fadeInUp order-1 order-lg-2">
            <img src="img/investors.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1">
            <h2>Investors</h2>
            <p>
                As Seed Investment continues to grow, Naman Angels India Foundation will strive to bring investors a greater breadth of investment opportunities.
                </p>
                <p>
                Investors when onboard are provided with Investor Development Program (IDP) and opportunities to attend round table conferences
                 with fellow investors. Once the agreement is signed the investor becomes a certified NAMAN investor with recognition across social media.
                </p>
              <button type="button" class="btn btn-primary" onclick="location.href = './Signing/register_inv.php'">Register Now!</button>
              </div>
          </div>
          </section>
        </div>

      </div>
  </section>

    <!--==========================
      Why Us Section
    ============================-->
    <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>Why choose us?</h3>
          <!-- Write Required Data -->
          <p></p>
        </header>

        <div class="row row-eq-height justify-content-center">

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-sitemap"></i>
              <div class="card-body">
                <h5 class="card-title">The Trusted Network</h5>
                <p class="card-text">Tens of thousands of accredited investors worldwide use Naman. to connect and collaborate with startup companies.</p>

              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-lock"></i>
              <div class="card-body">
                <h5 class="card-title">Robust Privacy Controls</h5>
                <p class="card-text">Naman. enables you to control your privacy settings, profile visibility and who has access to your information. What's private stays private.</p>

              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-industry"></i>
              <div class="card-body">
                <h5 class="card-title">The Industry Standards</h5>
                <p class="card-text">Naman. is the global industry standard for early stage investing. </p>

              </div>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!--==========================
      Clients Section
    ============================-->
    <!-- <section id="testimonials" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Testimonials</h3>
        </header>

        <div class="row justify-content-center">
          <div class="col-lg-8">

            <div class="owl-carousel testimonials-carousel wow fadeInUp">

              <div class="testimonial-item">
                <img src="img/testimonial-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <p>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                </p>
              </div>

              <div class="testimonial-item">
                <img src="img/testimonial-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <p>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                </p>
              </div>

              <div class="testimonial-item">
                <img src="img/testimonial-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <p>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                </p>
              </div>

              <div class="testimonial-item">
                <img src="img/testimonial-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <p>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                </p>
              </div>

              <div class="testimonial-item">
                <img src="img/testimonial-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <p>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                </p>
              </div>

            </div>

          </div>
        </div>


      </div>
    </section>-->
    <!-- #testimonials -->

    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container">
        <div class="section-header">
          <h3>Our Chief Advisory</h3>
          <p></p>
        </div>

        <div class="row">
                <?php
                $qu = "SELECT * FROM namanteam";
                $results = mysqli_query($db, $qu);

                for($i=0 ; $i<4; $i++){
                      $row = mysqli_fetch_assoc($results);
                        echo '<div class="col-lg-3 col-md-6 wow fadeInUp">
                            <div class="member">
                            <img src="'.$row['Image'].'" class="img-fluid" alt="">
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
    </section><!-- #team -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="clients" class="section-bg">

      <div class="container">

        <div class="section-header">
          <h3>Our Partners</h3>

        </div>

        <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/partners/p1.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/partners/p2.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/partners/p3.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/partners/p4.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/partners/p5.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/partners/p6.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/partners/p7.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/partners/p8.png" class="img-fluid" alt="">
            </div>
          </div>

        </div>

      </div>

    </section>

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container-fluid">

        <div class="section-header">
          <h3>Contact Us</h3>
        </div>

        <div class="row wow fadeInUp">

          <div class="col-lg-5">
            <div class="map mb-4 mb-lg-0">
              <iframe src="" frameborder="1" style="border:2; width: 100%; height: 312px;" allowfullscreen ></iframe>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-3 info">
                <i class="ion-ios-location-outline"></i>
                <p>
                  Plot No 37, Sector 26, <br>
                    Parsik Hill, CBD Belapur.</p>
              </div>
              <div class="col-md-5 info">
                <i class="ion-ios-email-outline"></i>
                <p>naman@namanangels.com</p>
              </div>
              <div class="col-md-4 info">
                <i class="ion-ios-telephone-outline"></i>
                <p>+91 915 2095 991</p>
              </div>
            </div>

            <div class="form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
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
                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <?php require "include/footer/footer.php"?>

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
  <script src="js/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/mainhome.js"></script>
  <script>
    $(document).ready(function(){

    $(document).on('click', '.abt_us', function(){
        var abt_us = $('#abt_us').text();

        $.ajax({
            url:'edit.php',
            method:"POST",
            data:{abt_us:abt_us},
            dataType:"text",
            success:function(data)
            {
                alert(data);
                fetch_data();
            }
        })
    });
    $(document).on('blur', '.abt_us', function(){

        var abt_us = $(this).text();
        edit_data(abt_us, "abt_us");
    });
});

    </script>

</body>
</html>
