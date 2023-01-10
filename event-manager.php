<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2022-11 AH
  ### MANAGE EVENTS --> RETRIVE, CREATE, UPDATE OR DELETE TIMELINE EVENTS
?>

<?php



  ##############################################################################
  ### LISTS EVENT'S BASIC INFORMATION
  ##############################################################################
  function listBasicEvents(){

    ### READS SANDBOX JSON TIMELINE FILE
    $jsonIterator = new RecursiveIteratorIterator(
      new RecursiveArrayIterator(json_decode(file_get_contents("./sandbox-timeline.json"), TRUE)),
      RecursiveIteratorIterator::SELF_FIRST);

      $isEvent = 0;
      foreach ($jsonIterator as $key => $val) {
          if(is_array($val)) {
              if($key == 'events'){
                $isEvent = 1;
              }
              echo "\n";
          } else {
              if($isEvent == 1){

                if($key == 'start_date'){ echo "\t<tr>\n"; }
                if($key == 'year'){ echo "\t\t<td>$val\n"; }
                if($key == 'month'){ echo "-$val-"; }
                if($key == 'day'){ echo "$val</td>\n"; }
                if($key == 'headline'){ echo "\t\t<td>$val</td>\n"; }
                if($key == 'unique_id'){
                  echo "\t\t<td style=\"text-align:center;\">$val</td>\n";
                  echo "\t\t<td  style=\"text-align:center;\">
                              <button onclick=\"document.location='event.php?eve=$val&opt=upd'\">Update</button>
                              &nbsp; &nbsp;
                              <button onclick=\"document.location='event.php?eve=$val&opt=del'\">Delete</button>
                            </td></tr>\n";
                }
              }
          } // END else
      }
  } ### END function listBasicEvents




  ##############################################################################
  ### DISPLAYS EVENT INFORMATON
  ##############################################################################
  function displayEvent(){

    ### READS SANDBOX JSON TIMELINE FILE
    $jsonIterator = new RecursiveIteratorIterator(
      new RecursiveArrayIterator(json_decode(file_get_contents("./sandbox-timeline.json"), TRUE)),
      RecursiveIteratorIterator::SELF_FIRST);

      $isEvent = 0;
      foreach ($jsonIterator as $key => $val) {
          if(is_array($val)) {
              if($key == 'events'){
                $isEvent = 1;
              }
              echo "\n";
          } else {
              if($isEvent == 1){

                if($key == 'start_date'){ echo "\t<tr>\n"; }
                if($key == 'year'){ echo "\t\t<td>$val\n"; }
                if($key == 'month'){ echo "-$val-"; }
                if($key == 'day'){ echo "$val</td>\n"; }
                if($key == 'headline'){ echo "\t\t<td>$val</td>\n"; }
                if($key == 'unique_id'){
                  echo "\t\t<td style=\"text-align:center;\">$val</td>\n";
                  echo "\t\t<td  style=\"text-align:center;\">
                              <button onclick=\"document.location='event.php?eve=$val&opt=upd'\">Update</button>
                              &nbsp; &nbsp;
                              <button onclick=\"document.location='event.php?eve=$val&opt=del'\">Delete</button>
                            </td></tr>\n";
                }
              }
          } // END else
      }

  } ###  END function displayEvent

?>
