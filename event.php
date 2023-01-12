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
        padding: 1em;
      }
      .rightBlock{
        text-align:right;
      }
      .iBlock{
        margin: auto;
        text-align:left;
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 1em;
      }
      .eventView{
        border: 1px solid gray;
        display: block;
        width: 80%;
        margin: auto;
        padding: 1em;
        height: 200px;
      }
      .floatLeft{
        float: left;
        text-align: right;
        width: 40%;
        padding-right: 1em;
      }
      .floatRight{
        float: right;
        text-align: left;
        width: 50%;
        padding-left: 1em;
        vertical-align: middle;
      }
      .dates{
        font-size: 0.8em;
      }
      .title{
        font-size: 1.8em;
        font-weight: bold;
      }
      .details{
        font-size: 0.9em;
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
            width: 80%;
        }

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

      <div class="iBlock">
        <form method="post" action="event-manager.php">
          <input type="hidden" name="eId" value="<?php echo $_GET['eId']; ?>" />
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
                <div class="rightBlock">
                  <p>Do you want to delete this event?</p>
                  <input type="hidden" name="opt" value="del" />
                  <input type="submit" value="Yes" />
                  <button type="button" onclick="document.location='edit-events.php'">Cancel</button>
                </div>
              <?php  } // END if($_GET['opt'] == 'del')  ?>


              <?php
                ########################################################################
                ### CREATING OR UPDATING AN EVENT
                ########################################################################
                if($_GET['opt'] == 'upd'){
              ?>
                  <div class="rightBlock">
                      <p>Update the event information and then click on submit button.</p>
                        <input type="hidden" name="opt" value="upt" />
                        <input type="submit" value="Submit" />
                  </div>

              <?php  } // END if($_GET['opt'] == 'upd')  ?>


              <?php
                ########################################################################
                ### CREATING OR UPDATING AN EVENT
                ########################################################################
                if($_GET['opt'] == 'new'){
              ?>
                  <div class="rightBlock">
                    <p>Complete the event information and then click on submit button.</p>
                    <input type="hidden" name="opt" value="new" />
                    <input type="submit" value="Submit" />
                  </div>

              <?php  } // END if($_GET['opt'] == 'new')  ?>

          <?php  } // END if($_GET['eId'] != '') ?>
      </form>
    </div>

  </body>

</html>
