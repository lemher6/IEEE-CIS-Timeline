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

      }
    </style>
  </head>

  <body>
    <div class="pageTitle">
      <h1>APPROVE EVENTS CHANGES</h1>
    </div>

    <?php include ("./menu.php"); ?>

    <div class="leftBlock">

      <p class="leftBlock">
        Click on the <b>"Approve"</b> button to move the edition to the production timeline. After approval, the event will be changed in the both sandbox and production file with the edited information.<br>       
        Use the <b>"Discard"</b> button if you want to forget the changes done. The event will be removed from this list and neither sandbox nor production files will be modified.<br>
        If any of the options are selected the edition will remain on this list and no changes will be done in Sandbox or Production. </p>


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
