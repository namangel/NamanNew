<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="/NamanNew/css/navbar.css">
</head>
<body>
  <div class="topnav">
    <div class="toplogo1">
       <center><a href="../../index.php"><img src="/NamanNew/img/HeaderLogo.png" style="height:50px;width:135px; margin: 5px;"></a></center>
    </div>
      <div class="dropdown">
          <button class="dropbtn"><?= $fname ?> <?= $lname ?></button>
          <div class="dropdown-content">
              <a href="Settings/contact.php">Account settings</a>
              <a href="../../logout.php">Sign out</a>
          </div>
      </div>
    </div>
</body>
