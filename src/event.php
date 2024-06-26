<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2022-11 AH
  session_start();
  include('./check-login.php');
  
  include('./header.php');
  
  include ('./menu.php'); 

  include_once('./sanitize.php'); 
?>

   
    <div class="content">

        <?php        
            ########################################################################
            ###  GETTING HEADER PARAMETERS
            ########################################################################
            if(isset($_POST['eId'])){
              $eId = $_POST['eId'];
            }else{
              $eId = '';
            }

            if(isset($_POST['opt'])){
              $opt = $_POST['opt'];
            }else{
              $opt = '';
            }

            if(isset($_POST['status'])){
              $status = $_POST['status'];
            }else{
              $status = '';
            }

            if($opt == 'new'){
              $title = "CREATE A NEW EVENT";
            }elseif($opt == 'dlt'){
              $title = "REMOVE AN EVENT";
            }else{
              $title = "UPDATE AN EVENT";
            }

        ?>

            <div class="pageTitle">
              <h2><?php echo $title; ?></h2>
            </div>


            <div class="formBlock">

        
              <p>
                Please follow the <b>guidelines to contribute to the CIS History Timeline</b>
                <button type="button" class="qButton" onclick="window.open('/src/guidelines.php', '_blank');">?</button>
              </p>
              <br>
              <?php if($opt != 'new' || $status == 'edited'){ // DISPLAYS TIMELINE IF IT IS NOT A NEW EVENT ?>
                <div id="timeline-embed" style="border: 1px solid #ccc; width:97%; height:450px;">
                  <div id="timeline"></div>
                </div>
              <?php } // END display the div ?>

              <form method="post" action="./event-manager.php">

                <?php

                  include ("./event-manager.php");
                  displayEvent($eId,$opt,$status);

                  ### GETTING THE COUNTER PARAMETER AFTER CALLING THE displayEvent FUNCTION BECAUSE THAT FUNCTION COULD UPDATE THE PARAMETER
                  if(isset($_POST['counter'])){
                    $counter = $_POST['counter'];
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
                      <input type="submit" id="eventNEW" value="Create" />
                    </div>

                <?php  } // END if($op == 'new')  ?>


                <?php
                  ########################################################################
                  ### DELETING AN EVENT
                  ########################################################################
                  if($opt == 'dlt' && $status == ''){
                ?>

                    <script>
                    $(document).ready(function() {
                        var embed = document.getElementById('timeline-embed');
                        window.timeline = new TL.Timeline('timeline-embed', '/json/timeline.json', {
                            hash_bookmark: false, /* If set to true, TimelineJS will update the browser URL each time a slide advances, so that people can link directly to specific slides. */
                            font: "fjalla-average",
                            timenav_height: 90,
                            scale_factor: 1, /* How many screen widths wide the timeline should be at first presentation. */
                            initial_zoom: 1, /* The position in the zoom_sequence series used to scale the Timeline when it is first created. Takes precedence over scale_factor. */
                            zoom_sequence: [0.5, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89], /* Array of values for TimeNav zoom levels. Each value is a scale_factor, which means that at any given level, the full timeline would require that many screens to display all events. */
                            start_at_slide: <?php echo $counter; ?>
                        });
                    });
                    </script>

                    <div class="rightBlock">
                      <p>Do you want to delete this event?</p>
                      <input type="submit" id="eventDLT" value="Yes" />
                      <button type="button" id="dltCancel" onclick="document.location='/src/edit-events.php'">Cancel</button>
                    </div>
                <?php  } // END if($op == 'dlt')  ?>


                <?php
                  ########################################################################
                  ### CREATING OR UPDATING AN EVENT
                  ########################################################################
                  if($opt == 'upd' && $status == ''){
                ?>

                <script>
                  $(document).ready(function() {
                      var embed = document.getElementById('timeline-embed');
                      window.timeline = new TL.Timeline('timeline-embed', '/json/timeline.json', {
                          hash_bookmark: true, /* If set to true, TimelineJS will update the browser URL each time a slide advances, so that people can link directly to specific slides. */
                          font: "fjalla-average",
                          timenav_height: 90,
                          initial_zoom: 1, /* The position in the zoom_sequence series used to scale the Timeline when it is first created. Takes precedence over scale_factor. */
                          start_at_slide: <?php echo $counter; ?>
                      });
                  });
                </script>

                  <div class="rightBlock">
                      <p>Update the event information and then click on "Update" button.</p>
                        <input type="submit" id="eventUPD" value="Update" />
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
                      window.timeline = new TL.Timeline('timeline-embed', '/json/<?php echo $eId; ?>.json', {
                          hash_bookmark: true, /* If set to true, TimelineJS will update the browser URL each time a slide advances, so that people can link directly to specific slides. */
                          font: "fjalla-average",
                          timenav_height: 90,
                          scale_factor: 1, /* How many screen widths wide the timeline should be at first presentation. */
                          initial_zoom: 1, /* The position in the zoom_sequence series used to scale the Timeline when it is first created. Takes precedence over scale_factor. */
                          zoom_sequence: [0.5, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89], /* Array of values for TimeNav zoom levels. Each value is a scale_factor, which means that at any given level, the full timeline would require that many screens to display all events. */
                          start_at_slide: <?php echo $counter; ?>
                      });
                  });
                  </script>

                    <div class="rightBlock">
                        <p>Update the event information and then click on "Update" button. Choose "Forget Edition" to remove any modifications done on this event.</p>
                          <input type="submit" id="eventEDIT" value="Update" />
                          <button type="button" id="editCancel" onclick="document.location='/src/edit-events.php'">Cancel</button>
                    </div>

                <?php  } // END if($op == 'upd')  ?>
                
              </form>
            </div>

    </div><!-- END DIV CONTENT -->
    
    <?php include ("./footer.php"); ?>
