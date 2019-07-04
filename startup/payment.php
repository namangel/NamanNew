<?php
    require '../server.php';
	if(!isset($_SESSION['StpID'])){
        header('location: ../pageerror.php');
    }
	$id = $_SESSION['StpID'];

  $toolid = $_GET['tid'];

  echo $toolid;

  if(isset($_POST['paid'])){
    $q = "INSERT INTO tools_used(TID,StpID) values('$toolid','$id')";
    mysqli_query($db, $q);
    header('location:index.php');
  }


  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Payment | Naman Angels India Foundation</title>
    <link href="../img/naman.png" rel="icon">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="home">
    <div class="profile-item">
        <div class="media">
            <div class="media-body">
                <form action="payment.php?tid=<?=$toolid?>" method="post">
                    <button class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" name="paid" type="submit">Sucessful</button>
                </form>
            </div>
        </div>
    </div>
    <div class="profile-item">
        <div class="media">
            <div class="media-body">
                <form action="payment.php?tid=<?=$toolid?>" method="post">
                    <button class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-3" name="unpaid" type="submit">Not Sucessful</button>
                </form>
            </div>
        </div>
    </div>
  </section>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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
