<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2023-02 AH
  ### CHECK USER LOGIN AND ROLL
  ### ==========================================================================
  ### Data Consumer: Production Timeline Viewer.
  ### Editor: View Production, Create, Update and Remove.
  ### Approver: View Sandbox and Production, Create, Updadte, Remove, and Approve.
  ### Administrator: Everything.
  ### ==========================================================================

  $approvalRolls = array('Committe','Admin'); // Rolls that are allowed to approve and view edited events.

  ### If session variables are not set the user must login.
  if(!isset($_SESSION['userRoll'])){
    #checkLogin('Ana','123','Admin');
    checkLogin('Ana','123','CIS');
  }

  ### CHECKS THE PASSWORD AND SET SESSION VARIABLES
  function checkLogin(string $userID,string $password,string $userRoll){
    $_SESSION['user'] = $userID;
    $_SESSION['userRoll'] = $userRoll;

  }
?>
