<?php require('../server.php') ?>
<html>
<head>
  <title>Membership Mail | Billennium Divas</title>
  <link href="../img/divas.png" rel="icon">
  <link rel="stylesheet" type="text/css" href="css/register.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .message{
        font-size: 22px;
        margin: 90px;
        font-weight: light;
        background-color: #F4F5F6;
        padding: 50px;
    }
  </style>
</head>

<body>
    <?php require 'include/header/sign.php'; ?>
    <div>
    <center><img src="../img/Logo2.png" height="150px" style="margin-top: 40px;">
    <div class="message">A mail has been sent to Billennium Divas and you will recieve a reply from our team shortly.
    <br>Thank you for consulting with Billennium Divas!!</div></center>
    </div>
    <?php require "../include/footer/footersmall.php"?>
</body>
</html>
