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
      <br>
      <p>
        Your requests will be scrutinized by the CIS History Committee members, who will approve or reject the contributions according to the criteria indicated in the 
        <a href='/src/guidelines.php' target='_blank'>guidelines</a>. <br>
        Meanwhile, you can modify your requests using the 'Update Request' button or eliminate them using the 'Forget Request' button.
      </p>
      <br>

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
