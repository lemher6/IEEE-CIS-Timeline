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
        <br>
        <br>
      </div>


      <form method="post" action="event-manager.php">
        <label for='eId'>Event ID:</label><input type="text" name="eId" value="<?php echo $_GET['eId']; ?>" />
        <br>
      <?php
        ########################################################################
        ### IF AN EVENT ID IS PASSED
        ########################################################################
        if($_GET['eId'] != ''){
          include ("./event-manager.php");
          displayEvent($_GET['eId']);

            ########################################################################
            ### DELETING AN EVENT
            ########################################################################
            if($_GET['opt'] == 'del'){
      ?>

                <p>Do you want to delete this event?</p>
                <input type="hidden" name="opt" value="del" />
                <input type="submit" value="Yes" />
                <button type="button" onclick="document.location='edit-events.php'">Cancel</button>

            <?php  } // END if($_GET['opt'] == 'del')  ?>


            <?php
              ########################################################################
              ### CREATING OR UPDATING AN EVENT
              ########################################################################
              if($_GET['opt'] == 'upd'){
            ?>
                    <p>Update the event information and then click on submit button.</p>
                      <input type="hidden" name="opt" value="upt" />
                      <input type="submit" value="Submit" />

            <?php  } // END if($_GET['opt'] == 'upd')  ?>


            <?php
              ########################################################################
              ### CREATING OR UPDATING AN EVENT
              ########################################################################
              if($_GET['opt'] == 'new'){
            ?>
                  <p>Complete the event information and then click on submit button.</p>
                  <input type="hidden" name="opt" value="new" />
                  <input type="submit" value="Submit" />

            <?php  } // END if($_GET['opt'] == 'new')  ?>

        <?php  } // END if($_GET['eId'] != '') ?>
    </form>

  </body>

</html>
