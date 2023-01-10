<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2022-11 AH
?>

<!DOCTYPE html>
<html>

  <head>
    <title>IEEE-CIS TIMELINE HOME</title>
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
      <div class="logo">
        <img src="https://cis.ieee.org/images/files/template/cis-logo.png" alt="(IEEE) Computational Intelligence Society">
      </div>
      <div class="bar">
        <h1>TIMELINE EVENT</h1>
        <!--<button onclick="document.location='timeline-google-sheet.html'">Launch Timeline <br> using Google Sheets</button>-->
        <button onclick="document.location='index.html'">Home Page</button>
        <button onclick="document.location='edit-events.php'">Edit Events</button>
        <button onclick="document.location='sandbox-timeline.html'">Launch Sandbox Timeline</button> <!-- Using JSON file -->
        <button onclick="document.location='approve.html'">Approve Changes</button>
        <button onclick="document.location='timeline-Launch.html'">Launch Production Timeline</button> <!-- Using JSON file -->
        <p>Welcome to the Institute of Electrical and Electronics Engineers <b>(IEEE)</b> Computational Intelligence Society <b>(CIS)</b> Historical Timeline!</p>
        <br>
        <br>
      </div>


      <?php
        ########################################################################
        ### DELETING AN EVENT
        ########################################################################
        if($_GET['opt'] == 'del' && $_GET['eve'] != ''){
      ?>
          <form method="post" action="event-manager.php">

          </form>

      <?php
        }
      ?>


      <?php
        ########################################################################
        ### CREATING OR UPDATING AN EVENT
        ########################################################################
        if($_GET['opt'] == 'upd' || $_GET['opt'] == 'new'){
      ?>


      <?php
        }
      ?>

  </body>

</html>
