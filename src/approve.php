<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2022-11 AH
  session_start();
  include('./check-login.php');
  
  include('./header.php');

  include ('./menu.php'); 
?>
    

    <div class="content">
  

     <div class="pageTitle">
        <h2>APPROVE UPDATES</h2>
      </div>

      <div class="leftBlock">

        <div class="flex-container">
          <div>
            <br>
            <img src="/img/icon-shield.gif" alt="Committee Member" style="width:68px;height:58px;">
            <br>
            <br>Only timeline committee members can approve or reject requests.<br><br>
          </div>
          <div>
            <br>
            <img src="/img/icon-reader.gif" alt="Approval Steps" style="width:68px;height:66px;">
            <br><br>
            1. Review request. <br>
            2. Inpupt your reasons or comments.<br>
            3. Click on the <b>"Approve"</b> or <b>"Reject"</b> button.
            <br><br>
          </div>
          <div>
            <br>
            <img src="/img/icon-export.gif" alt="What Next?" style="width:68px;height:58px;">
            <br>
            <br>
            After approval, the event will be moved from the waiting list to the production timeline.
            <br><br>
          </div>
        </div>




        <?php
          if(isset($_GET['msg'])){
            echo '<div class="iBlock" style="text-align:center">'.$_GET['msg'].'</div>';
          }
          include ("./event-manager.php");
          displayForApproval();
        ?>

      </div>

        <br>
        <br>
    </div>
    <!-- END DIV CONTENT -->
    
    <?php include ("./footer.php"); ?>