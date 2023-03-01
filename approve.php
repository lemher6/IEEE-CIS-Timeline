<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2022-11 AH
  session_start();
  include('./src/check-login.php');
  checkLogin('Ana','123','Admin');
?>

<!DOCTYPE html>
<html>

  <head>
    <title>IEEE-CIS HISTORICAL TIMELINE - APPROVAL</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link title="timeline-styles" rel="stylesheet" href="/css/timeline.css">
    <script src="/js/timeline-min.js"></script>

    <style>
      body{
        margin: auto;
        padding: 1em;
      }
      .iBlock{
        text-align:left;
        border-radius: 5px;
        background-color: #f9f9f9;
        padding: 1em;
        border: #dddcdc 1px solid;
      }




      @media only screen and (min-width: 768px) {
      /* ==== For desktop: ===== */
          body{
            width: 80%;
          }
          .rightBlock{
            padding:10px 30px;
            width: 90%;
          }
          .iBlock{
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
          }

      }
    </style>
  </head>

  <body>
    <div class="pageTitle">
      <h1>APPROVE EVENTS CHANGES</h1>
    </div>

    <?php include ("./src/menu.php"); ?>

    <div class="leftBlock">

      <div class="flex-container">
        <div>
          <br>You can approve or deny a request that is pending approval only if you are a member of the timeline commitee.<br><br>
        </div>
        <div>
          <br>
          1. Review the details of the edited record. <br>
          2. Enter an approval or rejection reason.<br>
          3. Click on the <b>"Approve"</b> or <b>"Deny"</b>button.
          <br><br>
        </div>
        <div>
          <br>
          After approval or denial, the event will be removed from the edition list and the event will be updated in the production timelines.
          <br><br>
        </div>
      </div>




      <?php
        if(isset($_GET['msg'])){
          echo '<div class="iBlock" style="text-align:center">'.$_GET['msg'].'</div>';
        }
        include ("./src/event-manager.php");
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
