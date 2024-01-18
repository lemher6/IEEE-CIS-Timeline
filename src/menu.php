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

  <div class="bar">
    <!--<button onclick="document.location='timeline-google-sheet.html'">Launch Timeline <br> using Google Sheets</button>-->
    <button onclick="document.location='/index.php'">Home Page</button>
    <button onclick="document.location='/src/timeline-launch.php'"  style="display:<?php echo $displayLaunch; ?>;" >Launch Timeline</button> <!-- Using JSON file -->

    
    <form name="editEventForm" id="editEventForm" method="post" style="display:<?php echo $displayOpt; ?>;" action="/src/event.php">
        <input type="hidden" name="opt"  id="opt"  value="" />
        <input type="hidden" name="eId"  id="eId"  value="" />
        <input type="hidden" name="page" value="listEvents" />
        <input type="hidden" name="counter" value="0" />
        <?php
          ### ONLY LOGGED MEMBERS CAN SEE THESE OPTIONS
          if($_SESSION['tL_userRoll'] != 'Public'){
        ?>
        <input type="submit" name="optUpd" onclick="setOpt('upd')" value="Update This" />
        <input type="submit" name="optDel" onclick="setOpt('del')" value="Remove This" />
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


    <script>
      function setOpt(opt){
        oFormObjectE = document.forms['editEventForm'];
        oFormObjectE.elements["opt"].value = opt; /* opt = 'upd' , 'del' */
        oFormObjectC = document.forms['createEventForm'];
        oFormObjectC.elements["opt"].value = opt; /* opt = 'upd' , 'del' */
      }
    </script>
    

    <?php
      ### ONLY LOGGED MEMBERS CAN SEE THESE OPTIONS
      if($_SESSION['tL_userRoll'] != 'Public'){
    ?>
    <button onclick="document.location='/src/edit-events.php'">Waiting Approval</button>
    <?php
      } ### END ONLY LOGGED MEMBERS CAN SEE THESE OPTIONS
    ?>

    <?php
      ### ONLY COMMITTE AND ADMIN USERS CAN SEE THESE OPTIONS
      if(isset($_SESSION['tL_userRoll']) && in_array($_SESSION['tL_userRoll'],$approvalRolls)){
    ?>
      <button onclick="document.location='/src/approve.php'">Approve Updates</button>
      <!-- <button onclick="document.location='/src/sandbox-timeline.php'">Sandbox View</button> -->
    <?php
      } // END if tL_userRoll
    ?>

    <button onclick="document.location='/src/help.php'" style="padding: 10px 10px !important;"><i class="fa fa-info-circle" style="font-size:27px;"></i></button>

  </div>
  <br>
  <br>
<!-- END TIMELINE MENU OPTION  -->