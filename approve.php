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
        You can approve or deny a request that is pending approval only if you are a member of the necessary approval group.
        <br><br>
        First review the details of the edited record. Then, enter an approval or rejection reason and additional comments.
        Click on the <b>"Approve"</b> button to move the edition to the production timeline or to reject the edition request, click on "Deny".
        <br><br>
        After approval, the event will be updated in the both sandbox and production timelines with the edited information.
        After deny, the event will be removed from the edition list and neither sandbox nor production files will be modified.
        If any of the options are selected the edition will remain on this list and no changes will be done in Sandbox or Production.
      </p>


      <form method="post" action="event-manager.php">
        <input type="hidden" name="page" value="approveEvent" />
      <?php
        include ("./event-manager.php");
        displayForApproval();
      ?>
    </form>

    </div>

      <br>
      <br>

      <div class="footer">
        © Copyright 2023 IEEE – All rights reserved. A not-for-profit organization, IEEE is the world's largest technical professional organization dedicated to advancing technology for the benefit of humanity.
      </div>

  </body>

</html>
