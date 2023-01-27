<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2022-11 AH
?>

<!DOCTYPE html>
<html>

  <head>
    <title>IEEE-CIS TIMELINE HOME</title>
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

    <?php include ("./menu.php"); ?>


    <div class="rightBlock">
      <button onclick="document.location='event.php?opt=new'">Create a New Event</button>
    </div>


    <div class="iBlock">
        <table style="width:100%">
          <tr>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Headline</th>
            <th>Group</th>
            <th style="text-align:center;">Options</th>
          </tr>
          <tr>

        <?php
          include ("./event-manager.php");
          printAllEvent();
          #listBasicEvents();
        ?>
          </tr>
        </table>
    </div>

  </body>

</html>
