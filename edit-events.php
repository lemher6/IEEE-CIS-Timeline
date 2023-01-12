<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2022-11 AH
?>

<!DOCTYPE html>
<html>

  <head>
    <title>IEEE-CIS TIMELINE HOME</title>
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
    <div class="logo">
      <img src="https://cis.ieee.org/images/files/template/cis-logo.png" alt="(IEEE) Computational Intelligence Society">
    </div>
    <div class="bar">
      <h1>EDIT TIMELINE EVENTS</h1>
      <!--<button onclick="document.location='timeline-google-sheet.html'">Launch Timeline <br> using Google Sheets</button>-->
      <button onclick="document.location='index.html'">Home Page</button>
      <button onclick="document.location='edit-events.php'">Edit Events</button>
      <button onclick="document.location='sandbox-timeline.html'">Launch Sandbox Timeline</button> <!-- Using JSON file -->
      <button onclick="document.location='approve.html'">Approve Changes</button>
      <button onclick="document.location='timeline-Launch.html'">Launch Production Timeline</button> <!-- Using JSON file -->
    </div>
    <br><br>

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
          listBasicEvents();
        ?>
          </tr>
        </table>
    </div>

  </body>

</html>
