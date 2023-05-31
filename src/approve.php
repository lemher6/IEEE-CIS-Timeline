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

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link title="timeline-styles" rel="stylesheet" href="../css/timeline.css">
    <script src="../js/timeline-min.js"></script>

    <style>

      .aBlock{
        text-align:left;
        border-radius: 5px;
        background-color: #f9f9f9;
        padding: 1em;
        border: #dddcdc 1px solid;
      }




      @media only screen and (min-width: 768px) {
      /* ==== For desktop: ===== */
          .content{
            width: 80%;
          }
          .rightBlock{
            padding:10px 30px;
            width: 90%;
          }
          .aBlock{
            margin: 2em;
          }

          .flex-container {
            display: flex;
            justify-content: center;
            width: 100%;
          }

          .flex-container > div {
            background-color: #20b2e2;
            color: #333;
            width: 25%;
            margin: 1em;
            padding: 1em;
            text-align: center;
            vertical-align: middle;
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
          }

      }
    </style>
  </head>

  <body>
    <div class="content">
      <div class="pageTitle">
        <h1>APPROVE UPDATES</h1>
      </div>

      <?php include ("./menu.php"); ?>

      <div class="leftBlock">

        <div class="flex-container">
          <div>
            <br>
            <i class='fas fa-user-shield' style='font-size:48px;color:white;'></i>
            <br>
            <br>Only timeline commitee members can approve or reject requests.<br><br>
          </div>
          <div>
            <br>
            <i class='fas fa-book-reader' style='font-size:48px;color:white'></i>            
            <br><br>
            1. Review request. <br>
            2. Inpupt your reasons or comments.<br>
            3. Click on the <b>"Approve"</b> or <b>"Reject"</b> button.
            <br><br>
          </div>
          <div>
            <br>
            <i class='fas fa-file-export' style='font-size:48px;color:white'></i>
            <br>
            <br>
            After approval, the event will be moved from the waiting list to the production timeline.
            <br><br>
          </div>
        </div>




        <?php
          if(isset($_GET['msg'])){
            echo '<div class="iBlock" style="text-align:center">'.$_GET['msg'].'</div>';
          }
          include ("./event-manager.php");
          displayForApproval();
        ?>

      </div>

        <br>
        <br>
    </div><!-- END DIV CONTENT -->
    <div class="footer">
      © Copyright 2023 IEEE – All rights reserved. A not-for-profit organization, IEEE is the world's largest technical professional organization dedicated to advancing technology for the benefit of humanity.
    </div>

  </body>

</html>
