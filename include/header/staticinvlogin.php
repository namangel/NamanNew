<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="css/navbar.css">
</head>
<body>
    <div class="topnav">
        <div class="toplogo">
            <center><a href="./index.php"><img src="/NamanNew/img/HeaderLogo.png" style="height:50px;width:135px; margin: 5px;"></a></center>
        </div>
        <?php
            if(isset($_SESSION['InvID'])){
                echo '<div class="topbutn2">
                      <button class="button" onclick=\'location.href = "Investor/index.php"\'><span >Profile</span></button>
                  </div>';
            }

         ?>
    </div>
</body>
