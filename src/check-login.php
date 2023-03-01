<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2023-02 AH
  ### CHECK USER LOGIN AND ROLL

  function checkLogin(string $userID,string $password,string $userRoll){
    $_SESSION['user'] = $userID;
    $_SESSION['userRoll'] = $userRoll;
  }
?>
