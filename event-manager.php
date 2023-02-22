<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2022-11 AH
  ### MANAGE EVENTS --> RETRIVE, CREATE, UPDATE OR DELETE TIMELINE EVENTS
  ###
  ### FUNTIONS:
  #### compare_start_date($a, $b) // Comparison function by start_date
  #### printAllEvent() // LISTS ALL SANDBOX EVENTS BASIC INFORMATON SORT BY EVENT START DATE
  #### displayEvent(string $eId, string $satus) // DISPLAYS EVENT INFORMATON (IMAGE/FORM) BY EVENT ID
  #### listEditions() // LISTS ALL EDITIED EVENTS BASIC INFORMATON
  #### editEvent() // CREATE A NEW EVENT INSTANCE IN THE FILE EDITIONS FOR LATER APPROVAL
  #### displayForApproval() // LIST EDITIONS AND ALLOW THE USER TO APPROVE OR DENY CHANGES

  if(session_id() == ''){
    session_start();
    include('./check-login.php');
    checkLogin('Ana','123','Admin');
  }

  if(isset($_REQUEST['opt']) && $_REQUEST['page'] == 'editEvent'){
    editEvent();
  }

  // Comparison function by start_date
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
    // Read the SANDBOX JSON file
    $json = file_get_contents('./sandbox-timeline.json');

    // Decode the JSON data into a PHP array
    $data = json_decode($json, true);

    // Sort the events array
    usort($data['events'], 'compare_start_date');

    // Search for the event object
    foreach ($data['events'] as $event) {

        // If the event has been updated it is not displayed here as it is already displayed.
        if(!in_array($event['unique_id'], $GLOBALS['editedIds'])){
            echo "\n\t<tr>\n";
            echo "\t\t<td>";
            echo $event['start_date']['year'] ."-". $event['start_date']['month'] ."-". $event['start_date']['day'];
            echo "</td>\n";
            echo "\t\t<td>";
            echo $event['end_date']['year'] ."-". $event['end_date']['month'] ."-". $event['end_date']['day'];
            echo "</td>\n";
            echo "\t\t<td>";
            echo $event['text']['headline'];
            echo "</td>\n";
            echo "\t\t<td>";
            echo $event['group'];
            echo "</td>\n";
            echo "\t\t<td  style=\"text-align:center;\"> <button onclick=\"document.location='event.php?eId=";
            echo $event['unique_id'];
            echo "&opt=upd&page=listEvents'\">Update</button>";
            echo "&nbsp; &nbsp;<button onclick=\"document.location='event.php?eId=";
            echo $event['unique_id'];
            echo "&opt=del&page=listEvents'\">Delete</button>";
            echo "</td>\n";
            echo "</tr>\n";
        } // END if(!in_array($event['unique_id'], $iseditedIds))

    } // END foreach
  }



  ##############################################################################
  ### DISPLAYS EVENT INFORMATON (IMAGE/FORM) BY EVENT ID
  ##############################################################################
  function displayEvent(string $eId, string $opt, string $status){

      $isEvent = $isBackground = $media =  0;
      $color = '#ffffff';
      $opacity = '50';
      $backgroundURL = '';
      $start_date = $end_date = '';
      $caption =  $credit = $mediaURL = $mediaLINK = '';
      $headline = $text = $group = '';
      $detail = array('','','','','','');
      $groupCIS = $groupFuzzy = $groupEC = $groupNNs = '';
      $editUser = $editDate = $editAction = $editComment = '';
      $author = $created_on = $last_modification = '';

      if($eId != ''){

        // Read the sandbox JSON file
        if($status == 'edited'){
          $json = file_get_contents('./editions.json');
        }else{
          $json = file_get_contents('./sandbox-timeline.json');
        }

        // Decode the JSON data into a PHP array
        $data = json_decode($json, true);

        // Search for the event object
        foreach ($data['events'] as $event) {
            if ($event['unique_id'] == $eId) {

              $color = $event['background']['color'];
              $opacity = $event['background']['opacity'];
              $backgroundURL = $event['background']['url'];

              $start_date = $event['start_date']['year'] .'-'. $event['start_date']['month'] .'-'. $event['start_date']['day'];
              $end_date = $event['end_date']['year'] .'-'. $event['end_date']['month'] .'-'. $event['end_date']['day'];

              $caption = $event['media']['caption'];
              $credit = $event['media']['credit'];
              $mediaURL = $event['media']['url'];
              $mediaLINK = $event['media']['link'];

              $headline = $event['text']['headline'];
              $text = $event['text']['text'];

              $group = $event['group'];
              $author = $event['author'];
              $created_on = $event['created_on'];
              $last_modification = $event['last_modification'];
              $unique_id = $event['unique_id'];


              ### REMOVES THE BOLD TAG
              $eventDetails = str_replace("<b>","",$text);
              $eventDetails = str_replace("</b>","",$eventDetails);
              ### SPLIT THE TEXT INTO LINES
              $detail = explode("<br>", $eventDetails);


              ### CHECK WHICH GROUP SHOULD BY SELECTED
              if($group == 'CIS'){
                $groupCIS = 'selected';
                $groupFuzzy = $groupEC =$groupNNs = '';
              }elseif($group == 'EC'){
                $groupEC = 'selected';
                $groupFuzzy = $groupCIS = $groupNNs = '';
              }elseif($group == 'Fuzzy'){
                $groupFuzzy = 'selected';
                $groupNNs = $groupCIS = $groupEC = '';
              }elseif($group == 'NNs'){
                $groupNNs = 'selected';
                $groupFuzzy = $groupCIS = $groupEC = '';
              }


              ### FIX COLOR WHEN IT IS DEFAULT NULL
              if($color == ""){
                $color = "#ffffff";
              }

              if(isset($event['change'])){
                $editUser = $event['change']['user'];
                $editDate = $event['change']['date'];
                $editAction = $event['change']['action'];
                $editComment = $event['change']['comment'];
              }

            } // END if $event['unique_id']
          } // END foreach


          ### CREATES EVENT VISUALIZATION
          if($headline != ''){
            echo "<div id='eventView' class='eventView' style='background-color:$color;'>
                    <div class='floatLeft'>
                        <a href='$mediaLINK' target='_blank'>
                          <img alt='$caption' title='$caption' src='$mediaURL' width='200px' height:auto;>
                        </a>
                        <br>
                        $credit
                    </div>
                        <div class='floatRight'>
                            <br>
                            <span class='dates'>$start_date - $end_date</span><br>
                            <span class='title'>$headline</span><br>
                            <span class='details'>
                  ";

              for($x=0; $x<=4; $x++){
                if(!isset($detail[$x])){
                  $detail[$x] = '';
                }
                echo "$detail[$x]<br>";
            }

            echo "</span>
                        </div>
                  </div>
                  <br>";
          } // END if($headline != '')
        } // END if($eId != '')


        if($opt == 'new'){
          $author = $_SESSION['user'];
          $created_on = date("Y-m-d h:i");
          $last_modification = date("Y-m-d h:i");
        }


          ### CREATE AND HTML FORM FOR THE EVENT INFORMATION
          ### FOR DELETING THE FORM IS HIDDEN
          if($opt != 'del'){
            echo "<div>";
          }else{
            echo "<div style='display:none'>";
          }
            echo "<input type='hidden' name='author' value='$author' />";
            echo "<input type='hidden' name='created_on' value='$created_on' />";
            echo "<input type='hidden' name='last_modification' value='$last_modification' />";
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
            echo "<label for='start_date'>Start Date:</label><input type='date' class='dateInput' name='start_date' value='$start_date' required/><br>";
            echo "<label for='end_date'>End Date:</label><input type='date' class='dateInput' name='end_date' value='$end_date'/><br>";
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
            echo "<p>The headline will be displayed after the date and each detail will be placed in a different line below the title.</p>";
            echo "<label for='headline'>Event Headline:</label><input type='text' name='headline' value='$headline' required /><br>";


            echo "<label for='text0'>Event Details 1:</label><input type='text' name='text0' value='$detail[0]' /><br>";
            echo "<label for='text1'>Event Details 2:</label><input type='text' name='text1' value='$detail[1]' /><br>";
            echo "<label for='text2'>Event Details 3:</label><input type='text' name='text2' value='$detail[2]' /><br>";
            echo "<label for='text3'>Event Details 4:</label><input type='text' name='text3' value='$detail[3]' /><br>";
            echo "<label for='text4'>Event Details 5:</label><input type='text' name='text4' value='$detail[4]' /><br>";
            echo "</div>";

            echo "<div class='iBlock'>";
            echo "<label for='group'>Event Group:</label>
                    <select name='group'>
                      <option value='CIS' $groupCIS>CIS</option>
                      <option value='Fuzzy' $groupFuzzy>Fuzzy</option>
                      <option value='EC' $groupEC>EC</option>
                      <option value='NNs' $groupNNs>NNs</option>
                    </select>";
            echo "</div>";


            echo "<div class='iBlock'>";
            echo "<label for='comment'>Comments:</label>
                    <textarea name='comment'>$editComment</textarea>";
            echo "</div>";
            echo "</div>";

  } ###  END function displayEvent





  ### ****************************************************************************
  ### LISTS ALL EDITIED EVENTS BASIC INFORMATON
  ### ****************************************************************************
  function listEditions(){

    $editedEvents = array(); // for the unique_id of edited events

    // Read the EDITIONS JSON file
    $data = file_get_contents('./editions.json');

    if($data){
      // Decode the JSON data into a PHP array
      $data = json_decode($data, true);

      foreach ($data['events'] as $event) {
            if($event['change']['user'] == $_SESSION['user'] || $_SESSION['userRoll'] == 'Admin'){

                array_push($editedEvents, $event['unique_id']);

                if($event['change']['action'] == 'del'){
                  $action = 'Deleted';
                }elseif($event['change']['action'] == 'new'){
                  $action = 'Created';
                }else{
                  $action = 'Updated';
                }
                $action = $event['change']['user'].' '.$action.' on '.$event['change']['date'];
                $opt = $event['change']['action'];

                echo "\n\t<tr>\n";
                echo "\t\t<td>";
                echo $event['start_date']['year'] ."-". $event['start_date']['month'] ."-". $event['start_date']['day'];
                echo "</td>\n";
                echo "\t\t<td>";
                echo $event['end_date']['year'] ."-". $event['end_date']['month'] ."-". $event['end_date']['day'];
                echo "</td>\n";
                echo "\t\t<td>";
                echo $event['text']['headline'];
                echo "</td>\n";
                echo "\t\t<td>";
                echo $event['group'];
                echo "</td>\n";

                echo "\t\t<td  style=\"text-align:center;\">";
                echo "<button onclick=\"document.location='event.php?eId=". $event['unique_id'] ."&status=edited&opt=$opt&page=listEvents'\">$action</button>";

                echo "</td>\n";

                echo "</tr>\n";
            } // END if(user)
        } // END foreach
      } // END if($data)

      $GLOBALS['editedIds'] = $editedEvents;

  }


  ##############################################################################
  ### CREATE A NEW EVENT INSTANCE IN THE FILE EDITIONS FOR LATER APPROVAL
  ##############################################################################
  function editEvent(){

    # for a new event the unique_id must be created
    if ($_REQUEST['eId'] == '') {
      $_REQUEST['eId'] = 'CIS'.date("Ymdhis");
    }

    # if the forget edition option was chosen the array is not included in the new editions.json file
    if($_REQUEST['opt'] != 'eDel'){

        $changes = Array (
                  "change" => Array (
                      "user" => $_SESSION['user'],
                      "date" => date("Y-m-d h:i"),
                      "action" => $_POST['opt'],
                      "comment" => $_POST['comment']
                  ),
                  "background" => Array (
                      "color" => $_POST['color'],
                      "opacity" => 50,
                      "url" => NULL
                  ),
                  "start_date" => Array (
                      "year" => substr($_POST['start_date'],0,4),
                      "month" => substr($_POST['start_date'],5,2),
                      "day" => substr($_POST['start_date'],8,2)
                  ),
                  "end_date" => Array (
                      "year" => substr($_POST['end_date'],0,4),
                      "month" => substr($_POST['end_date'],5,2),
                      "day" => substr($_POST['end_date'],8,2)
                  ),
                  "media" => Array (
                      "caption" => $_POST['caption'],
                      "credit" => $_POST['credit'],
                      "url" => $_POST['mediaURL'],
                      "link" => $_POST['mediaLINK']
                  ),
                  "text" => Array (
                      "headline" => $_POST['headline'],
                      "text" => $_POST['text0'].'<br>'.$_POST['text1'].'<br>'.$_POST['text2'].'<br>'.$_POST['text3'].'<br>'.$_POST['text4'],
                  ),
                  "group" => $_POST['group'],
                  "author" => $_POST['author'],
                  "created_on" => $_POST['created_on'],
                  "last_modification" => $_POST['last_modification'],
                  "unique_id" => $_REQUEST['eId'],
              );

            $events = array($changes);
        } // END if($_REQUEST['opt'] != 'eDel')
        else{
          $events = array();
        }



      $edit_json = file_get_contents('./editions.json');
      if($edit_json){
        // Decode the JSON data into a PHP array
        $edit_data = json_decode($edit_json, true);

        foreach ($edit_data['events'] as $event) {
          if($event['unique_id'] != $_REQUEST['eId']){ // avoiding duplicagtions if an edited event is re-edited
            array_push($events, $event);
          }
        }
      }


      $timelineChanges = array("events" => $events);

      // encode array to json
      $json = json_encode($timelineChanges,JSON_PRETTY_PRINT);
      // Write the contents to the file,
      // using the FILE_APPEND flag to append the content to the end of the file
      // and the LOCK_EX flag to prevent anyone else writing to the file at the same time
      $bytes = file_put_contents('./editions.json',$json, LOCK_EX);
      header("Location: ./edit-events.php");

  }



  ### ****************************************************************************
  ### LIST EDITIONS AND ALLOW THE USER TO APPROVE OR DENY CHANGES
  ### ****************************************************************************
    function displayForApproval(){

      $editedEvents = array(); // for the unique_id of edited events

      // Read the EDITIONS JSON file
      $data = file_get_contents('./editions.json');

      if($data){
        // Decode the JSON data into a PHP array
        $data = json_decode($data, true);

        foreach ($data['events'] as $event) {
              if($_SESSION['userRoll'] == 'Admin'){

                  array_push($editedEvents, $event['unique_id']);

                  if($event['change']['action'] == 'del'){
                    $action = 'Deleted';
                  }elseif($event['change']['action'] == 'new'){
                    $action = 'Created';
                  }else{
                    $action = 'Updated';
                  }
                  $change_date = $event['change']['date'];
                  $opt = $event['change']['action'];

                  $color = $event['background']['color'];
                  $opacity = $event['background']['opacity'];
                  $backgroundURL = $event['background']['url'];

                  $start_date = $event['start_date']['year'] .'-'. $event['start_date']['month'] .'-'. $event['start_date']['day'];
                  $end_date = $event['end_date']['year'] .'-'. $event['end_date']['month'] .'-'. $event['end_date']['day'];

                  $caption = $event['media']['caption'];
                  $credit = $event['media']['credit'];
                  $mediaURL = $event['media']['url'];
                  $mediaLINK = $event['media']['link'];

                  $headline = $event['text']['headline'];
                  $text = $event['text']['text'];

                  $group = $event['group'];
                  $author = $event['author'];
                  $created_on = $event['created_on'];
                  $last_modification = $event['last_modification'];
                  $unique_id = $event['unique_id'];


                  ### CHECK WHICH GROUP SHOULD BY SELECTED
                  if($group == 'CIS'){
                    $groupCIS = 'selected';
                    $groupFuzzy = $groupEC =$groupNNs = '';
                  }elseif($group == 'EC'){
                    $groupEC = 'selected';
                    $groupFuzzy = $groupCIS = $groupNNs = '';
                  }elseif($group == 'Fuzzy'){
                    $groupFuzzy = 'selected';
                    $groupNNs = $groupCIS = $groupEC = '';
                  }elseif($group == 'NNs'){
                    $groupNNs = 'selected';
                    $groupFuzzy = $groupCIS = $groupEC = '';
                  }


                  ### FIX COLOR WHEN IT IS DEFAULT NULL
                  if($color == ""){
                    $color = "#ffffff";
                  }

                  if(isset($event['change'])){
                    $editUser = $event['change']['user'];
                    $editDate = $event['change']['date'];
                    $editAction = $event['change']['action'];
                    $editComment = $event['change']['comment'];
                  }

                  echo "<div class='iBlock'>";

                  echo "<b>$action</b> on $change_date by $editUser";
                  echo "<br><b>Editor's comments:</b> $editComment <br>";
                  if($opt != 'new'){
                    echo "<br>This event was first created on $created_on by $author. ";
                  }

                  if($created_on != $last_modification){
                    echo "Its last modification was done on $last_modification.<br>";
                  }

                  ### CREATES EVENT VISUALIZATION
                  echo "<br>
                        <div id='eventView' class='eventView' style='background-color:$color;'>
                          <div class='floatLeft'>
                              <a href='$mediaLINK' target='_blank'>
                                <img alt='$caption' title='$caption' src='$mediaURL' width='200px' height:auto;>
                              </a>
                              <br>
                              $credit
                          </div>
                          <div class='floatRight'>
                              <br>
                              <span class='dates'>$start_date - $end_date</span><br>
                              <span class='title'>$headline</span><br>
                              <span class='details'>$text</span>
                          </div>
                        </div>
                        <br>";


                  echo "<label for='comment'>Comments:</label>
                          <textarea name='comment' placeholder='Enter here the approval or rejection reasons and/or additional comments.'></textarea>";
                  echo "<div class='rightBlock'>";
                  echo "<input type='hidden' name='eId' value='$unique_id' >";
                  echo "<input type='hidden' name='opt' value='$opt' >";
                  echo "<input type='submit' name='approve' value='Approve' >";
                  echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                  echo "<input type='submit' name='deny' value='Deny' >";
                  echo "</div>";

                  echo "</div>\n";
              } // END if($_SESSION['userRoll'] == 'Admin')
          } // END foreach
        } // END if($data)

        $GLOBALS['editedIds'] = $editedEvents;

    }


  ### ****************************************************************************
  ### AFTER APPROVAL THE PRODUCTION TIMELINE JSON FILE IS UPDATED WITH THE NEW INFO.
  ### ****************************************************************************
    function updateProdTimeline(){
      // Creates a new timeline json file with the updates + old records.
      # for a new event the unique_id must be created
      if ($_REQUEST['eId'] == '') {
        $_REQUEST['eId'] = 'CIS'.date("Ymdhis");
      }

      # if the forget edition option was chosen the array is not included in the new editions.json file
      if($_REQUEST['opt'] != 'eDel'){

          $changes = Array (
                    "change" => Array (
                        "user" => $_SESSION['user'],
                        "date" => date("Y-m-d h:i"),
                        "action" => $_POST['opt'],
                        "comment" => $_POST['comment']
                    ),
                    "background" => Array (
                        "color" => $_POST['color'],
                        "opacity" => 50,
                        "url" => NULL
                    ),
                    "start_date" => Array (
                        "year" => substr($_POST['start_date'],0,4),
                        "month" => substr($_POST['start_date'],5,2),
                        "day" => substr($_POST['start_date'],8,2)
                    ),
                    "end_date" => Array (
                        "year" => substr($_POST['end_date'],0,4),
                        "month" => substr($_POST['end_date'],5,2),
                        "day" => substr($_POST['end_date'],8,2)
                    ),
                    "media" => Array (
                        "caption" => $_POST['caption'],
                        "credit" => $_POST['credit'],
                        "url" => $_POST['mediaURL'],
                        "link" => $_POST['mediaLINK']
                    ),
                    "text" => Array (
                        "headline" => $_POST['headline'],
                        "text" => $_POST['text0'].'<br>'.$_POST['text1'].'<br>'.$_POST['text2'].'<br>'.$_POST['text3'].'<br>'.$_POST['text4'],
                    ),
                    "group" => $_POST['group'],
                    "author" => $_POST['author'],
                    "created_on" => $_POST['created_on'],
                    "last_modification" => $_POST['last_modification'],
                    "unique_id" => $_REQUEST['eId'],
                );

              $events = array($changes);
          } // END if($_REQUEST['opt'] != 'eDel')
          else{
            $events = array();
          }



        $edit_json = file_get_contents('./timeline.json');
        if($edit_json){
          // Decode the JSON data into a PHP array
          $edit_data = json_decode($edit_json, true);

          foreach ($edit_data['events'] as $event) {
            if($event['unique_id'] != $_REQUEST['eId']){ // avoiding duplicagtions if an edited event is re-edited
              array_push($events, $event);
            }
          }
        }


        $timelineChanges = array("events" => $events);

        // encode array to json
        $json = json_encode($timelineChanges,JSON_PRETTY_PRINT);
        // Write the contents to the file,
        // using the FILE_APPEND flag to append the content to the end of the file
        // and the LOCK_EX flag to prevent anyone else writing to the file at the same time
        $bytes = file_put_contents('./timeline-upd.json',$json, LOCK_EX);
        header("Location: ./approve.php");

      // Rename the production timeline json file.
      // Rename the new json file so it is the production file.
    }
?>
