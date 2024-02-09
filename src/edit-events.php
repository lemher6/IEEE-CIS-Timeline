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
          <h2>YOUR REQUEST WAITING FOR APPROVAL</h2>
      </div>

      <?php
          ########################################################################
          ###  GETTING HEADER PARAMETERS
          ########################################################################
          if(!empty($_GET['dError'])){
            echo "<p>
                    <br><hr>
                    <span class='alarm'>Sorry, your request couldn't be processed. <br><br>
                    Some data was invalid. Please ensure that you only enter letters, digits, whitespace, and common punctuation marks such as hyphens, apostrophes, commas, periods, exclamation marks, colons, semicolons, and parentheses.
                    <br>Check the field(s): ".$_GET['wD']."
                    <br><br>If you have any questions, please contact the committee or the administrator.</span>
                    <br><hr><br>
                  </p>";
          }else{
            $eId = '';
          }
      ?>

      <div class="editBlock">
          <table style="width:100%">
            <tr>
              <th>No.</th>
              <th>Requested On</th>
              <th>Headline</th>
              <th>Group</th>
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
