<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2024-03-14 AH
  ### LOGOUT MEMBER, UNSET SESSION VARIABLES

  session_start();


    ## SET PUBLIC USER AS DEFAULT
      $_SESSION['tL_user_FN'] = '';
      $_SESSION['tL_user_LN'] = '';
      $_SESSION['tL_user_ID'] = '';
      $_SESSION['tL_user_ORG'] = '';
      $_SESSION['tL_userRoll'] = '';

    ## Unset app session variables.
        unset($_SESSION['tL_user_FN']);
        unset($_SESSION['tL_user_LN']);
        unset($_SESSION['tL_user_ID']);
        unset($_SESSION['tL_user_ORG']);
        unset($_SESSION['tL_userRoll']);

    ## Unset all of the session variables.
        $_SESSION = array();

    ## Destroy session.
        session_unset();
        session_destroy();

    header('Location: https://services10qa.ieee.org/ext/ieeeresponsivelogout');

?>