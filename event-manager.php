<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2022-11 AH
  ### MANAGE EVENTS --> RETRIVE, CREATE, UPDATE OR DELETE TIMELINE EVENTS


  // Define the comparison function
  function compare_start_date($a, $b)
  {
      $date1 = new DateTime($a['start_date']['year'] . '-' . $a['start_date']['month'] . '-' . $a['start_date']['day']);
      $date2 = new DateTime($b['start_date']['year'] . '-' . $b['start_date']['month'] . '-' . $b['start_date']['day']);
      return $date2 <=> $date1;
  }



  ##############################################################################
  ### LISTS ALL SANDBOX EVENTS BASIC INFORMATON SORT BY EVENT START DATE
  ##############################################################################
  function printAllEvent(){
      // Read the JSON file
      $json = file_get_contents('./sandbox-timeline.json');

      // Decode the JSON data into a PHP array
      $data = json_decode($json, true);

      // Sort the events array
      usort($data['events'], 'compare_start_date');

      // Search for the event object
      foreach ($data['events'] as $event) {
              #print_r($event);
              echo "\n\t<tr>\n";
              echo "\t\t<td>";
              echo $event['start_date']['year'] ."/". $event['start_date']['month'] ."/". $event['start_date']['day'];
              echo "</td>\n";
              echo "\t\t<td>";
              echo $event['end_date']['year'] ."/". $event['end_date']['month'] ."/". $event['end_date']['day'];
              echo "</td>\n";
              echo "\t\t<td>";
              echo $event['text']['headline'];
              echo "</td>\n";
              echo "\t\t<td>";
              echo $event['group'];
              echo "</td>\n";
              echo "\t\t<td  style=\"text-align:center;\"> <button onclick=\"document.location='event.php?eId=";
              echo $event['unique_id'];
              echo "&opt=upd'\">Update</button>";
              echo "&nbsp; &nbsp;<button onclick=\"document.location='event.php?eId=";
              echo $event['unique_id'];
              echo "&opt=del'\">Delete</button>";
              echo "</td>\n";
              echo "</tr>\n";
      }

  } // END function printAllEvent()



  function printAnEvent(){
      // Read the JSON file
      $json = file_get_contents('./sandbox-timeline.json');

      // Decode the JSON data into a PHP array
      $data = json_decode($json, true);

      // Search for the event object
      foreach ($data['events'] as $event) {
          if ($event['unique_id'] == 'EC20160724-001') {
              // Do something with the object
              print_r($event);
          }
      }

  }



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
      $groupIJCNN = $groupFUZZ = $groupWCCI = $groupCEC = $groupSSCI = '';

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

              if($key == 'year'){ $start_date = $val.'-'; }
              if($key == 'month'){ $start_date .= $val.'-'; }
              if($key == 'day'){ $start_date .= $val; }

              if($key == 'year'){ $end_date = $val.'-'; }
              if($key == 'month'){ $end_date .= $val.'-'; }
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

                  ### REMOVES THE BOLD TAG
                  $eventDetails = str_replace("<b>","",$text);
                  $eventDetails = str_replace("</b>","",$eventDetails);
                  ### SPLIT THE TEXT INTO LINES
                  $detail = explode("<br>", $eventDetails);

                  ### CHECK WHICH GROUP SHOULD BY SELECTED
                  if($group == 'EC'){
                    $groupEC = 'selected';
                    $groupFuzzy = $groupNNs = '';
                  }elseif($group == 'Fuzzy'){
                    $groupFuzzy = 'selected';
                    $groupNNs = $groupEC = '';
                  }elseif($group == 'NNs'){
                    $groupNNs = 'selected';
                    $groupFuzzy = $groupEC = '';
                  }

                  if($color == ""){
                    $color = "#ffffff";
                  }

                  echo "<div id='eventView' class='eventView' style='background-color:$color;'>
                          <div class='floatLeft'>
                              <a href='$mediaLINK' target='_blank'>
                                <img alt='$caption' title='$caption' src='$mediaURL' width='200px' height:auto;>
                              </a>
                              $credit
                          </div>
                              <div class='floatRight'>
                                  <br>
                                  <span class='dates'>$start_date - $end_date</span><br>
                                  <span class='title'>$headline</span><br>
                                  <span class='details'>
                        ";

                  foreach ($detail as $key => $value) {
                    if ($key == 0) {
                      echo "<b>$value</b><br>";
                    }else{
                      echo "$value<br>";
                    }
                  }

                  echo "</span>
                              </div>
                        </div>
                        <br>";

                  echo "<div class='iBlock'>";
                  echo "<h2>Slide Background Color</h2>";
                  echo "<p>Each event has a slide in the timeline and you can choose a different background color for it.
                            The text color will be set to white automatically if the background color is dark. </p>";
                  echo "<label for='color'>Slide Background Color:</label> <input type='color' name='color' value='$color' /><br><br>";
                  #echo "<label for='backgroundURL'>Slide background URL:</label><input type='text' name='backgroundURL' value='$backgroundURL' /><br>";
                  echo "</div>";

                  echo "<div class='iBlock'>";
                  echo "<h2>Events Dates</h2>";
                  echo "<p>Every event must have a sart and end date.</p>";
                  echo "<label for='start_date'>Start Date:</label><input type='date' class='dateInput' name='start_date' value='$start_date' require/><br>";
                  echo "<label for='end_date'>End Date:</label><input type='date' class='dateInput' name='end_date' value='$end_date' require/><br>";
                  echo "</div>";

                  echo "<div class='iBlock'>";
                  echo "<h2>Media</h2>";
                  echo "<p>You can pull in media from a variety of sources: Twitter, Flickr, YouTube, Vimeo, Vine, Dailymotion,
                        Google Maps, Wikipedia, SoundCloud, Document Cloud or an Image. The media link will be open in a new page
                        and the media credit will be appered at the bottom of the media box.</p>";
                  echo "<label for='mediaURL'>Media URL:</label><input type='text' name='mediaURL' value='$mediaURL' /><br>";
                  echo "<label for='mediaLINK'>Media Link:</label><input type='text' name='mediaLINK' value='$mediaLINK' /><br>";
                  echo "<label for='caption'>Media Caption:</label><input type='text' name='caption' value='$caption' /><br>";
                  echo "<label for='credit'>Media Credit:</label><input type='text' name='credit' value='$credit' /><br>";
                  echo "</div>";

                  echo "<div class='iBlock'>";
                  echo "<h2>Event Information</h2>";
                  echo "<p>The title will be displayed after the date and each detail will be placed in a different line below the title.</p>";
                  echo "<label for='headline'>Event Title:</label><input type='text' name='headline' value='$headline' /><br>";

                  foreach ($detail as $key => $value) {
                    $detailNumber = 1 + $key ;
                    echo "<label for='text$key'>Event Details $detailNumber:</label><input type='text' name='text$key' value='$value' /><br>";
                  }
                  echo "</div>";

                  echo "<div class='iBlock'>";
                  echo "<label for='group'>Event Group:</label>
                          <select name='group'>
                            <option value='Fuzzy' $groupFuzzy>Fuzzy</option>
                            <option value='EC' $groupEC>EC</option>
                            <option value='NNs' $groupNNs>NNs</option>
                          </select>";
                  echo "</div>";

                } // if($unique_id == $eId)
              } // if($key == 'unique_id')

            } // if($isEvent == 1)
        } // END else
      } // END foreach

  } ###  END function displayEvent

?>
