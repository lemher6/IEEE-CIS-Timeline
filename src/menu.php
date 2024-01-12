
<!-- TIMELINE PRODUCTION MENU OPTION  -->
<?php
### IF THE TIMELINE IS LAUNCH THE MENU OPTION IS CHANGED TO UPDATE EVENT
$filename = baseName($_SERVER['REQUEST_URI']);
if($filename == 'timeline-Launch.php'){
  $displayOpt = 'inline-block';
  $displayLaunch = 'none';
}else{
  $displayOpt = 'none';
  $displayLaunch = 'inline-block';
}
?>

<div class="userInfoBlock">
  <?php
    if(isset($_SESSION['tL_userRoll'])){
      echo $_SESSION['tL_userRoll'];
    }
  ?>
</div>

<div class="bar">
  <!--<button onclick="document.location='timeline-google-sheet.html'">Launch Timeline <br> using Google Sheets</button>-->
  <button onclick="document.location='/index.php'">Home Page</button>
  <button onclick="document.location='/src/timeline-launch.php'"  style="display:<?php echo $displayLaunch; ?>;" >Launch Timeline</button> <!-- Using JSON file -->

  <form name="editEventForm" method="post" style="display:<?php echo $displayOpt; ?>;" action="./event.php">
      <input type="hidden" name="opt"  id="opt"  value="" />
      <input type="hidden" name="eId"  id="eId"  value="" />
      <input type="hidden" name="page" value="listEvents" />
      <input type="hidden" name="counter" value="0" />
      <input type="submit" name="optUpd" onclick="setOpt('upd')" value="Update This" />
      <input type="submit" name="optDel" onclick="setOpt('del')" value="Remove This" />
    </form>

      <script>
        function setOpt(opt){
          document.getElementById('opt').value = opt;
        }
      </script>

  <form name="createEventForm" method="post" style="display:inline-block" action="./event.php">
      <input type="hidden" name="opt"  id="opt"  value="new" />
      <input type="hidden" name="page" value="listEvents" />
      <input type="submit" name="optCreate" value="Create Event" />
  </form>
  <button onclick="document.location='/src/edit-events.php'">Waiting Approval</button>

  <?php
    ### ONLY COMMITTE AND ADMIN USERS CAN SEE THESE OPTIONS
    if(isset($_SESSION['tL_userRoll']) && in_array($_SESSION['userRoll'],$approvalRolls)){
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
