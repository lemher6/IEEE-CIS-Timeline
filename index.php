<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2022-11 AH
  session_start();
  include('./src/check-login.php');

  include('./src/header.php');

  include ('./src/menu.php'); 
?>

 

    <!-- DIV CONTENT -->
    <div class="content">

      <div class="centerBlock">
        <br>
        <p>Welcome to the Institute of Electrical and Electronics Engineers <b>(IEEE)</b> Computational Intelligence Society <b>(CIS)</b> Historical Timeline!</p>
        <br>
        
        <?php
          ### ONLY CIS MEMBERS CAN SEE THESE OPTIONS
          if($_SESSION['tL_userRoll'] != 'Public'){
        ?>
          <p>
            Please follow the <a href="/src/guidelines.php">guidelines</a> to contribute to the CIS History Timeline.
          </p>
        <?php
          } ### END ONLY CIS MEMBERS CAN SEE THESE OPTIONS
        ?>

        <br>        
        <a href="/src/timeline-launch.php">
          <img class="indexImg" src="/img/IEEE-CIS-TIMELINE.JPG" width="90%" title="Launch Production Timeline">
        </a>
      </div>

    </div>
    <!-- END DIV CONTENT -->
    
<?php include ("./src/footer.php"); ?> 
