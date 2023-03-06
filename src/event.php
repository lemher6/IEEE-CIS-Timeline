<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2022-11 AH
  session_start();
  include('./check-login.php');
?>

<!DOCTYPE html>
<html>

  <head>
    <title>IEEE-CIS HISTORICAL TIMELINE - EVENT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link title="timeline-styles" rel="stylesheet" href="../css/timeline.css">
    <script src="../js/timeline-min.js"></script>

    <style>
      .iBlock{
        text-align:left;
        border-radius: 5px;
        background-color: #f9f9f9;
        padding: 1em;
        border: #dddcdc 1px solid;
      }


      @media only screen and (min-width: 768px) {
      /* ==== For desktop: ===== */
          .content{
            width: 80%;
          }
          .rightBlock{
            padding:10px 30px;
            width: 90%;
          }
          .formBlock{
              width: 80%;
              margin: auto;
          }
          .iBlock{
            margin: 2em;
          }

      }
    </style>
  </head>

  <body>
    <div class="content">
        <?php
          ########################################################################
          ###  GETTING HEADER PARAMETERS
          ########################################################################
          if(isset($_GET['eId'])){
            $eId = $_GET['eId'];
          }else{
            $eId = '';
          }

          if(isset($_GET['opt'])){
            $opt = $_GET['opt'];
          }else{
            $opt = '';
          }

          if(isset($_REQUEST['status'])){
            $status = $_REQUEST['status'];
          }else{
            $status = '';
          }

          if($opt == 'new'){
            $title = "CREATE A NEW EVENT";
          }elseif($opt == 'del'){
            $title = "REMOVE AN EVENT";
          }else{
            $title = "UPDATE AN EVENT";
          }

        ?>

          <div class="pageTitle">
            <h1><?php echo $title; ?></h1>
          </div>

          <?php include ("./menu.php"); ?>



          <div class="formBlock">

            <?php if($opt != 'new' || $status == 'edited'){ // DISPLAYS TIMELINE IF IT IS NOT A NEW EVENT ?>
              <div id="timeline-embed" style="border: 1px solid #ccc; width:100%; height:480px;">
                <div id="timeline"></div>
              </div>
            <?php } // END display the div ?>

            <form method="post" action="./event-manager.php">




          <?php

            include ("./event-manager.php");
            displayEvent($eId,$opt,$status);

            ### GETTING THE COUNTER PARAMETER AFTER CALLING THE displayEvent FUNCTION BECAUSE THAT FUNCTION COULD UPDATE THE PARAMETER
            if(isset($_REQUEST['counter'])){
              $counter = $_REQUEST['counter'];
            }else{
              $counter = 0;
            }

          ?>


              <input type="hidden" name="eId" value="<?php echo $eId; ?>" />
              <input type="hidden" name="opt" value="<?php echo $opt; ?>" />
              <input type="hidden" name="status" value="<?php echo $status; ?>" />
              <input type="hidden" name="page" value="editEvent" />





            <?php
              ########################################################################
              ### CREATING OR UPDATING AN EVENT
              ########################################################################
              if($opt == 'new' && $status == ''){
            ?>
                <div class="rightBlock">
                  <p>Complete the event information and then click on "Create" button.</p>
                  <input type="submit" value="Create" />
                </div>

            <?php  } // END if($op == 'new')  ?>


            <?php
                  ########################################################################
                  ### DELETING AN EVENT
                  ########################################################################
                  if($opt == 'del' && $status == ''){
            ?>

                    <script>
                     $(document).ready(function() {
                         var embed = document.getElementById('timeline-embed');
                         window.timeline = new TL.Timeline('timeline-embed', '../json/timeline.json', {
                             hash_bookmark: false, /* If set to true, TimelineJS will update the browser URL each time a slide advances, so that people can link directly to specific slides. */
                             font: "fjalla-average",
                             scale_factor: 1, /* How many screen widths wide the timeline should be at first presentation. */
                             initial_zoom: 1, /* The position in the zoom_sequence series used to scale the Timeline when it is first created. Takes precedence over scale_factor. */
                             zoom_sequence: [0.5, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89], /* Array of values for TimeNav zoom levels. Each value is a scale_factor, which means that at any given level, the full timeline would require that many screens to display all events. */
                             start_at_slide: <?php echo $counter; ?>
                        });
                     });
                    </script>

                    <div class="rightBlock">
                      <p>Do you want to delete this event?</p>
                      <input type="submit" value="Yes" />
                      <button type="button" onclick="document.location='/src/edit-events.php'">Cancel</button>
                    </div>
                  <?php  } // END if($op == 'del')  ?>


            <?php
              ########################################################################
              ### CREATING OR UPDATING AN EVENT
              ########################################################################
              if($opt == 'upd' && $status == ''){
            ?>

            <script>
             $(document).ready(function() {
                 var embed = document.getElementById('timeline-embed');
                 window.timeline = new TL.Timeline('timeline-embed', '../json/timeline.json', {
                     hash_bookmark: true, /* If set to true, TimelineJS will update the browser URL each time a slide advances, so that people can link directly to specific slides. */
                     font: "fjalla-average",
                     initial_zoom: 1, /* The position in the zoom_sequence series used to scale the Timeline when it is first created. Takes precedence over scale_factor. */
                     start_at_slide: <?php echo $counter; ?>
                });
             });
            </script>

                <div class="rightBlock">
                    <p>Update the event information and then click on "Update" button.</p>
                      <input type="submit" value="Update" />
                </div>

            <?php  } // END if($op == 'upd')  ?>


            <?php
              ########################################################################
              ### CREATING OR UPDATING AN EVENT
              ########################################################################
              if($status == 'edited'){
            ?>

              <script>
               $(document).ready(function() {
                   var embed = document.getElementById('timeline-embed');
                   window.timeline = new TL.Timeline('timeline-embed', '../json/<?php echo $eId; ?>.json', {
                       hash_bookmark: true, /* If set to true, TimelineJS will update the browser URL each time a slide advances, so that people can link directly to specific slides. */
                       font: "fjalla-average",
                       scale_factor: 1, /* How many screen widths wide the timeline should be at first presentation. */
                       initial_zoom: 1, /* The position in the zoom_sequence series used to scale the Timeline when it is first created. Takes precedence over scale_factor. */
                       zoom_sequence: [0.5, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89], /* Array of values for TimeNav zoom levels. Each value is a scale_factor, which means that at any given level, the full timeline would require that many screens to display all events. */
                       start_at_slide: <?php echo $counter; ?>
                  });
               });
              </script>

                <div class="rightBlock">
                    <p>Update the event information and then click on "Update" button. Choose "Forget Edition" to remove any modifications done on this event.</p>
                      <input type="submit" value="Update" />
                      <button type="button" onclick="document.location='/src/event-manager.php?eId=<?php echo $eId; ?>&opt=eDel&page=editEvent'">Forget Edition</button>
                </div>

            <?php  } // END if($op == 'upd')  ?>


          </form>
        </div>
    </div><!-- END DIV CONTENT -->
    <div class="footer">
      © Copyright 2023 IEEE – All rights reserved. A not-for-profit organization, IEEE is the world's largest technical professional organization dedicated to advancing technology for the benefit of humanity.
    </div>
  </body>

</html>
