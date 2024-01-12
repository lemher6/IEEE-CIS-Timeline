<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2022-11 AH
  session_start();
  include('./check-login.php');
?>

<!DOCTYPE html>
<html>

  <head>
    <title>IEEE-CIS HISTORICAL TIMELINE - EVENTS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>

  <style>

    .rightBlock{
      text-align:right;
    }
    .iBlock{
        margin: auto;
        text-align:center;
    }
    @media only screen and (min-width: 768px) {
    /* For desktop: */
      .content{
        width: 80%;
      }
      .rightBlock{
        padding:10px 30px;
        width: 90%;
      }
      .iBlock{
          width: 80%;
      }
    }

  </style>


  <body>
    <div class="content">

      <div class="pageTitle">
        <h1>YOUR REQUESTS WAITING FOR APPROVAL</h1>
      </div>

      <?php include ("./menu.php"); ?>

      <div class="iBlock">
          <table style="width:100%">
            <tr>
              <th>No.</th>
              <th>Requested On</th>
              <th>Headline</th>
              <th>Group</th>
              <th>Request Status</th>
              <th style="text-align:center;">Actions</th>
            </tr>
            <tr>

          <?php
            include ("./event-manager.php");
            listEditions();
            #printAllEvent();
          ?>
            </tr>
          </table>
      </div>
    </div><!-- END DIV CONTENT -->
    
    <?php include ("./footer.php"); ?>

  </body>

</html>
