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
    <title>IEEE-CIS HISTORICAL TIMELINE - EVENTS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="./css/style.css">
  </head>

  <style>
    body{
      margin: auto;
      padding: 1em;
    }
    .rightBlock{
      text-align:right;
    }
    .iBlock{
        margin: auto;
        text-align:center;
    }
    @media only screen and (min-width: 768px) {
    /* For desktop: */
      body{
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

    <div class="pageTitle">
      <h1>EDIT TIMELINE EVENTS</h1>
    </div>

    <?php include ("./src/menu.php"); ?>


    <div class="rightBlock">
      <button onclick="document.location='event.php?opt=new&page=listEvents'">Create a New Event</button>
    </div>


    <div class="iBlock">
        <table style="width:100%">
          <tr>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Headline</th>
            <th>Group</th>
            <th style="text-align:center;">Actions</th>
          </tr>
          <tr>

        <?php
          include ("./src/event-manager.php");
          listEditions();
          printAllEvent();
        ?>
          </tr>
        </table>
    </div>

    <div class="footer">
      © Copyright 2023 IEEE – All rights reserved. A not-for-profit organization, IEEE is the world's largest technical professional organization dedicated to advancing technology for the benefit of humanity.
    </div>

  </body>

</html>
