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

      <div class="pageTitle">
          <h2>YOUR REQUEST WAITING FOR APPROVAL</h2>
      </div>

      <?php
            $eId = '';
      ?>

      <div class="editBlock">
          <table style="width:100%">
            <tr>
              <th>No.</th>
              <th>Requested On</th>
              <th>Headline</th>
              <th>Request Status</th>
              <th style="text-align:center;">Actions</th>
            </tr>
            <tr>

          <?php
            include ("./event-manager.php");
            listEditions();
            #printAllEvent();
          ?>
            </tr>
          </table>
      </div>
      
    </div><!-- END DIV CONTENT -->
    
    <?php include ("./footer.php"); ?>
