<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2023-12 AH
  ### CHECK USER HEADER PARAMETER, SET USER VARIABLES AND SET ROLL
  ### ==========================================================================
  ### ROLL DEFINITION:
  ### Public: Production Timeline Viewer.
  ### IEEE: View Production, Create, Update and Remove.
  ### Committee: View Sandbox and Production, Create, Updadte, Remove, and Approve.
  ### Admin: Everything.
  ### ==========================================================================

  $committeeIDs = array('00930628'); // User IDs in the committee can approve and view edited events.
  $adminIDs = array('999999'); // Admin User are able to update committee members.
  $approvalRolls = array('Committee','Admin'); // This array is NOT used in the event-manager module. This is just for reference.


  ### User NOT Set 
  if(!isset($_SESSION['tL_user_ID']))
  {    

    ## READ HEADERS AND SET SESSION VARIABLES IF A IEEE USER IS LOGGED
    foreach (getallheaders() as $name => $value) 
    {

      if($name == 'AM_SSO_FN')
      {
        $_SESSION['tL_user_FN'] = $value;
      }
      if($name == 'AM_SSO_LN')
      {
        $_SESSION['tL_user_LN'] = $value;
      }
      if($name == 'AM_SSO_ID')
      {
        $_SESSION['tL_user_ID'] = $value;
      }
      if($name == 'AM_SSO_ORG')
      {
        $_SESSION['tL_user_ORG'] = $value;
      }

    } # END FOREACH 


    # SET ROLL
    ### If heather variables are set 
    if(isset($_SESSION['tL_user_ID']) && $_SESSION['tL_user_ID'] != '' && isset($_SESSION['tL_user_LN']))
    {      
      $_SESSION['tL_userRoll'] = 'IEEE';  ## Set roll session variables as default IEEE.
      if(in_array($_SESSION['tL_user_ID'], $committeeIDs))
      {
        $_SESSION['tL_userRoll'] = 'Committee'; ## Set roll session variables as COMMITTEE IF ID IS IN THAT ARRAY.
      }
      if(in_array($_SESSION['tL_user_ID'], $adminIDs))
      {
        $_SESSION['tL_userRoll'] = 'Admin'; ## Set roll session variables as ADMIN IF ID IS IN THAT ARRAY.
      }
    } 
    else{
      ## SET PUBLIC USER AS DEFAULT
      $_SESSION['tL_user_FN'] = '';
      $_SESSION['tL_user_LN'] = 'Public';
      $_SESSION['tL_user_ID'] = '9999';
      $_SESSION['tL_user_ORG'] = '';
      $_SESSION['tL_userRoll'] = 'Public';
    } # END ELSE HEADERS PARAMETERS GOT
    
  } # END IF User NOT Set  
    
?>