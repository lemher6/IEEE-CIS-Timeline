<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2022-11 AH
  session_start();
  include('./src/check-login.php');
?>

<!DOCTYPE html>
<html>

  <head>
    <title>IEEE-CIS HISTORICAL TIMELINE - HOME</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="IEEE CIS">
    <meta name="application-name" content="IEEE-CIS HISTORICAL TIMELINE">
    <meta name="application-version" content="1.1">

    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <style>
      @media only screen and (min-width: 768px) {
      /* ==== For desktop: ===== */
        .content{
          width: 80%;
        }
      }
    </style>
  </head>

  <body>
    <div class="header">

      <div class="pageTitle">
        <h1>IEEE-CIS HISTORICAL TIMELINE</h1>
      </div>
    </div>

    <?php include ("./src/menu.php"); ?>

    <div class="content">

      <div class="centerBlock">
        <p>Welcome to the Institute of Electrical and Electronics Engineers <b>(IEEE)</b> Computational Intelligence Society <b>(CIS)</b> Historical Timeline!</p>
        <br>
        <a href="/src/timeline-launch.php" target="_blank">
          <img src="/img/IEEE-CIS-TIMELINE.JPG" width="90%" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" title="Launch Production Timeline">
        </a>
      </div>

    </div><!-- END DIV CONTENT -->
    
    <?php include ("./src/footer.php"); ?>

  </body>

</html>
