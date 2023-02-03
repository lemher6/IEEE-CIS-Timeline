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
    <title>IEEE-CIS TIMELINE HOME</title>
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
      <h1>EDIT TIMELINE EVENTS</h1>
    </div>

    <?php include ("./menu.php"); ?>

    <div class="centerBlock">
      <p>Welcome to the Institute of Electrical and Electronics Engineers <b>(IEEE)</b> Computational Intelligence Society <b>(CIS)</b> Historical Timeline!</p>
      <br>
      <a href="/sandbox-timeline.html" target="_blank">
        <img src="/img/IEEE-CIS-TIMELINE.JPG" width="90%" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" title="Launch Sandbox Timeline">
      </a>
    </div>

  </body>

</html>
