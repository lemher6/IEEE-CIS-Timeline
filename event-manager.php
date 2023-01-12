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
                if($key == 'month'){ echo "/ $val / "; }
                if($key == 'day'){ echo "$val</td>\n"; }
                if($key == 'headline'){ echo "\t\t<td>$val</td>\n"; }
                if($key == 'group'){ echo "\t\t<td>$val</td>\n"; }
                if($key == 'unique_id'){
                  echo "\t\t<td  style=\"text-align:center;\">
                              <button onclick=\"document.location='event.php?eId=$val&opt=upd'\">Update</button>
                              &nbsp; &nbsp;
                              <button onclick=\"document.location='event.php?eId=$val&opt=del'\">Delete</button>
                            </td></tr>\n";
                }
              }
          } // END else
      }
  } ### END function listBasicEvents




  ##############################################################################
  ### DISPLAYS EVENT INFORMATON BY EVENT ID
  ##############################################################################
  function displayEvent(string $eId){

    ### READS SANDBOX JSON TIMELINE FILE
    $jsonIterator = new RecursiveIteratorIterator(
      new RecursiveArrayIterator(json_decode(file_get_contents("./sandbox-timeline.json"), TRUE)),
      RecursiveIteratorIterator::SELF_FIRST);

      $isEvent = $isBackground = $media = 0;
      $color = $opacity = $backgroundURL = '';
      $start_date = $end_date = '';
      $caption =  $credit = $mediaURL = $mediaLINK = '';
      $headline = $text = $group = '';

      foreach ($jsonIterator as $key => $val) {
        if(is_array($val)) {
            if($key == 'events'){
              $isEvent = 1;
            }
            echo "\n";
        } else {
            if($isEvent == 1){

              if($key == 'background'){
                $isBackground = 1;
                $color = $opacity = $backgroundURL = '';
                $start_date = $end_date = '';
                $caption =  $credit = $mediaURL = $mediaLINK = '';
                $headline = $text = $group = '';
              }

              if($key == 'color'){ $color = $val; }
              if($key == 'opacity'){ $opacity = $val; }
              if($key == 'url' && $isBackground == '1'){ $backgroundURL = $val; }

              if($key == 'start_date'){
                $isBackground = 0;
                $start_date = '';
              }

              if($key == 'year'){ $start_date = $val.'/'; }
              if($key == 'month'){ $start_date .= $val.'/'; }
              if($key == 'day'){ $start_date .= $val; }

              if($key == 'year'){ $end_date = $val.'/'; }
              if($key == 'month'){ $end_date .= $val.'/'; }
              if($key == 'day'){ $end_date .= $val; }

              if($key == 'caption'){ $caption = ''; }
              if($key == 'credit'){ $credit = $val; }
              if($key == 'url' && $isBackground == 0){ $mediaURL = $val; }
              if($key == 'link' && $isBackground == 0){ $mediaLINK = $val; }

              if($key == 'headline'){ $headline = $val; }
              if($key == 'text'){ $text = $val; }
              if($key == 'group'){ $group = $val; }

              if($key == 'unique_id'){
                $unique_id = $val;
                if($unique_id == $eId){

                  echo "<label for='headline'>Event Title:</label><input type='text' name='headline' value='$headline' /><br>";
                  echo "<label for='text'>Event Details:</label><input type='text' name='text' value='$text' /><br>";
                  echo "<label for='group'>Event Group:</label><input type='text' name='group' value='$group' /><br>";
                  echo "<label for='start_date'>Start Date:</label><input type='text' name='start_date' value='$start_date' /><br>";
                  echo "<label for='end_date'>End Date:</label><input type='text' name='end_date' value='$end_date' /><br>";

                  echo "<label for='color'>Slide Background Color:</label><input type='text' name='color' value='$color' /><br>";
                  echo "<label for='backgroundURL'>Slide background URL:</label><input type='text' name='backgroundURL' value='$backgroundURL' /><br>";

                  echo "<label for='mediaURL'>Image URL:</label><input type='text' name='mediaURL' value='$mediaURL' /><br>";
                  echo "<label for='mediaLINK'>Image Link:</label><input type='text' name='mediaLINK' value='$mediaLINK' /><br>";
                  echo "<label for='caption'>Image Caption:</label><input type='text' name='caption' value='$caption' /><br>";
                  echo "<label for='credit'>Image Credit:</label><input type='text' name='credit' value='$credit' /><br>";

                } // if($unique_id == $eId)
              } // if($key == 'unique_id')

            } // if($isEvent == 1)
        } // END else
      } // END foreach

  } ###  END function displayEvent

?>
