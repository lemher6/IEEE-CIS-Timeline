<!-- TIMELINE USER ROLL  -->
  <div class="userInfoBlock">
    <?php
      ### DISPLAY USER'S ROLL
      if(isset($_SESSION['tL_userRoll'])){
        echo $_SESSION['tL_userRoll'];
      }
    ?>
  </div>
<!-- END TIMELINE USER ROLL  -->



<!-- TIMELINE MENU OPTION  -->
<?php
  ### IF THE TIMELINE IS LAUNCH THE MENU OPTION IS CHANGED TO UPDATE EVENT
  $filename = baseName($_SERVER['REQUEST_URI']);
  if($filename == 'timeline-launch.php'){
    $displayOpt = 'inline-block';
    $displayLaunch = 'none';
  }else{
    $displayOpt = 'none';
    $displayLaunch = 'inline-block';
  }
?>

  <button type="button" class="menuIcon" onclick="menuIcon()">&#9776;</button> <!-- MOBILE ICON -->
  <div class="bar" id="menuBar">

    

    <!--<button onclick="document.location='timeline-google-sheet.html'">Launch Timeline <br> using Google Sheets</button>-->
    <button type="button"  onclick="document.location='/index.php'">Home Page</button>
    <button type="button"  onclick="document.location='/src/timeline-launch.php'"  style="display:<?php echo $displayLaunch; ?>;" >Launch Timeline</button> <!-- Using JSON file -->

    
    

    <form name="editEventForm" id="editEventForm" method="post" style="display:<?php echo $displayOpt; ?>;" action="/src/event.php">
        <input type="hidden" name="opt"  id="opt"  value="upd" />
        <input type="hidden" name="eId"  id="eId"  value="" />
        <input type="hidden" name="page" value="listEvents" />
        <input type="hidden" name="counter" value="0" />
        <?php
          ### ONLY LOGGED MEMBERS CAN SEE THESE OPTIONS
          if($_SESSION['tL_userRoll'] != 'Public'){
        ?>
        <input type="submit" name="optUpd" value="Update This" />
        <?php
          } ### END ONLY LOGGED MEMBERS CAN SEE THESE OPTIONS
        ?>
    </form>


    <form name="deleteEventForm" id="editEventForm" method="post" style="display:<?php echo $displayOpt; ?>;" action="/src/event.php">
        <input type="hidden" name="opt"  id="opt"  value="dlt" />
        <input type="hidden" name="eId"  id="eId"  value="" />
        <input type="hidden" name="page" value="listEvents" />
        <input type="hidden" name="counter" value="0" />
        <?php
          ### ONLY LOGGED MEMBERS CAN SEE THESE OPTIONS
          if($_SESSION['tL_userRoll'] != 'Public'){
        ?>
        <input type="submit" name="optDel" value="Remove This" />
        <?php
          } ### END ONLY LOGGED MEMBERS CAN SEE THESE OPTIONS
        ?>
    </form>

    

    <form name="createEventForm" method="post" style="display:inline-block" action="/src/event.php">
        <input type="hidden" name="opt"  id="opt"  value="new" />
        <input type="hidden" name="page" value="listEvents" />
        <?php
          ### ONLY LOGGED MEMBERS CAN SEE THESE OPTIONS
          if($_SESSION['tL_userRoll'] != 'Public'){
        ?>
        <input type="submit" name="optCreate" value="Create Event" />
        <?php
          } ### END ONLY LOGGED MEMBERS CAN SEE THESE OPTIONS
        ?>
    </form>
    


    <?php
      ### ONLY LOGGED MEMBERS CAN SEE THESE OPTIONS
      if($_SESSION['tL_userRoll'] != 'Public'){
    ?>
    <button type="button"  onclick="document.location='/src/edit-events.php'">Waiting Approval</button>
    <?php
      } ### END ONLY LOGGED MEMBERS CAN SEE THESE OPTIONS
    ?>

    <?php
      ### ONLY COMMITTE AND ADMIN USERS CAN SEE THESE OPTIONS
      if(isset($_SESSION['tL_userRoll']) && in_array($_SESSION['tL_userRoll'],$approvalRolls)){
    ?>
      <button type="button"  onclick="document.location='/src/approve.php'">Approve Updates</button>
      <!-- <button onclick="document.location='/src/sandbox-timeline.php'">Sandbox View</button> -->
    <?php
      } // END if tL_userRoll
    ?>

    <button type="button" onclick="document.location='/src/help.php'" style="padding: 11px 10px;"><span class="iButton">i</span></button>

  </div>
  
<!-- END TIMELINE MENU OPTION  -->