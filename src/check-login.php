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

  function checkLogin(string $userID,string $password,string $userRoll){
    $_SESSION['user'] = $userID;
    $_SESSION['userRoll'] = $userRoll;
  }
?>
