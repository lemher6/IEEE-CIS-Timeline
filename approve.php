<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2022-11 AH
  session_start();
  include('./check-login.php');
  checkLogin('Ana','123','Admin');
?>

<!DOCTYPE html>
<html>

  <head>
    <title>IEEE-CIS HISTORICAL TIMELINE - APPROVAL</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <style>
      body{
        margin: auto;
        padding: 20px;
        width: 80%;
      }
    </style>
  </head>

  <body>
    <div class="pageTitle">
      <h1>APPROVE EVENTS CHANGES</h1>
    </div>

    <?php include ("./menu.php"); ?>

    <div class="centerBlock">
      <p>Under Construction! This application will copy any modifications done in the sandbox timeline to the production timeline.</p>


      <?php
        include ("./event-manager.php");
        displayForApproval();
      ?>
      
    </div>

      <br>
      <br>

      <div class="footer">
        © Copyright 2023 IEEE – All rights reserved. A not-for-profit organization, IEEE is the world's largest technical professional organization dedicated to advancing technology for the benefit of humanity.
      </div>

  </body>

</html>
