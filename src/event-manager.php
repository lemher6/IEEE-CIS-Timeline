<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2022-11 AH
  ### MANAGE EVENTS --> RETRIVE, CREATE, UPDATE OR DELETE TIMELINE EVENTS
  ###
  ### ****************************************************************************
  ### FUNTIONS:
  #### compare_start_date($a, $b) // Comparison function by start_date
  #### printAllEvent() // LISTS ALL SANDBOX EVENTS BASIC INFORMATON SORT BY EVENT START DATE
  #### displayEvent(string $eId, string $satus) // DISPLAYS EVENT INFORMATON (IMAGE/FORM) BY EVENT ID
  #### listEditions() // LISTS ALL EDITIED EVENTS BASIC INFORMATON
  #### editEvent() // CREATE A NEW EVENT INSTANCE IN THE FILE EDITIONS FOR LATER APPROVAL
  #### displayForApproval() // LIST EDITIONS AND ALLOW THE USER TO APPROVE OR REJECT CHANGES
  ### updateProdTimeline() // AFTER APPROVAL THE PRODUCTION TIMELINE JSON FILE IS UPDATED WITH THE NEW INFO.
  ### ****************************************************************************


  if(session_id() == ''){
    session_start();
    include('./check-login.php');
  }

  if(isset($_POST['opt']) && $_POST['page'] == 'editEvent'){
    editEvent();
  }

  if(isset($_POST['eId']) && $_POST['page'] == 'approveEvent'){
    updateProdTimeline();
  }

  // Comparison function by start_date. Return in descendent order
  function compare_start_date($a, $b)
  {
      $date1 = new DateTime($a['start_date']['year'] . '-' . $a['start_date']['month'] . '-' . $a['start_date']['day']);
      $date2 = new DateTime($b['start_date']['year'] . '-' . $b['start_date']['month'] . '-' . $b['start_date']['day']);
      return $date2 <=> $date1;
  }

  // Comparison function by start_date. Return in ascendent order
  function compare_start_date_ASCENDENT($a, $b)
  {
      $date1 = new DateTime($a['start_date']['year'] . '-' . $a['start_date']['month'] . '-' . $a['start_date']['day']);
      $date2 = new DateTime($b['start_date']['year'] . '-' . $b['start_date']['month'] . '-' . $b['start_date']['day']);
      return $date1 <=> $date2;
  }


  ### ****************************************************************************
  ### LISTS ALL EDITIED EVENTS BASIC INFORMATON
  ### ****************************************************************************
  function listEditions(){

    $editedEvents = array(); // for the unique_id of edited events

    $data = file_get_contents('../json/editions.json'); // Read the EDITIONS JSON file
    if(!$data){
      echo "ERROR:20230301081411. Editions file is empty. Please contact your administrator.";
    }else{
      $data = json_decode($data, true); // Decode the JSON data into a PHP array

      $counter = 1;
      foreach ($data['events'] as $event) {
            if($event['change']['user'] == ($_SESSION['tL_user_LN'].'-'.$_SESSION['tL_user_ID']) || in_array($_SESSION['tL_userRoll'],$GLOBALS['approvalRolls'])){

                array_push($editedEvents, $event['unique_id']);

                if($event['change']['action'] == 'dlt'){
                  $action = 'For removal';
                }elseif($event['change']['action'] == 'new'){
                  $action = 'Creating';
                }else{
                  $action = 'Updateding';
                }
                $opt = $event['change']['action'];

                echo "\n\t<tr>\n";
                echo "\t\t<td>";
                echo $counter;
                echo "</td>\n";
                echo "\t\t<td>";
                echo $event['change']['date'];
                echo "</td>\n";
                echo "\t\t<td style='text-align:left;'>";
                echo $event['text']['headline'];
                echo "</td>\n";
                echo "\t\t<td style='text-align:left;'>";
                echo $event['group'];
                echo "</td>\n";
                echo "\t\t<td style='text-align:left; title='On ". $event['change']['date'] ." By ". $event['change']['user'] ."'>";
                echo $action;
                echo "</td>\n";
                echo "\t\t<td  style=\"text-align:left;\">";
                
                echo "<form method='post' style='display:inline-block' action='/src/event.php'>
                        <input type='hidden' name='eId' value='". $event['unique_id'] ."' />
                        <input type='hidden' name='status' value='edited' />
                        <input type='hidden' name='opt' value='$opt' />
                        <input type='hidden' name='page' value='listEvents' />
                        <input type='submit' name='uptRequest' value='Update Request' />
                      </form>";
                
                echo "&nbsp; &nbsp;";
                echo "<form method='post' style='display:inline-block' action='/src/event-manager.php'>
                        <input type='hidden' name='eId' value='". $event['unique_id'] ."' />
                        <input type='hidden' name='opt' value='eDel' />
                        <input type='hidden' name='page' value='editEvent' />
                        <input type='submit' name='forgetRequest' value='Forget Request' />
                      </form>";

                echo "</td>\n";
                echo "</tr>\n";
                $counter++;
            } // END if(user)
        } // END foreach
      } // END if($data)

      $GLOBALS['editedIds'] = $editedEvents;

  }


  ##############################################################################
  ### LISTS ALL EVENTS BASIC INFORMATON SORT BY EVENT START DATE
  ##############################################################################
  function printAllEvent(){

    $json = file_get_contents('../json/timeline.json'); // Read the SANDBOX JSON file
    if($json === FALSE){
      echo "No timeline events found.";
    }else{
      $data = json_decode($json, true); // Decode the JSON data into a PHP array

      // Sort the events array
      usort($data['events'], 'compare_start_date');

      // Search for the event object
      $counter = 1;
      $counterDisplay = 1;
      $tdClass = "class='borderLine'";
      foreach ($data['events'] as $event) {


          if($counterDisplay > 1){ // making a break line between the edited events and the production events
            $tdClass = '';
          }
          // If the event has been updated it is not displayed here as it is already displayed.
          if(!in_array($event['unique_id'], $GLOBALS['editedIds'])){

              echo "\n\t<tr>\n";
              echo "\t\t<td $tdClass>";
              echo $counterDisplay;
              echo "</td>\n";
              echo "\t\t<td $tdClass>";
              echo $event['start_date']['year'] ."-". $event['start_date']['month'] ."-". $event['start_date']['day'];
              echo "</td>\n";
              echo "\t\t<td $tdClass>";
              echo $event['end_date']['year'] ."-". $event['end_date']['month'] ."-". $event['end_date']['day'];
              echo "</td>\n";
              echo "\t\t<td $tdClass style='text-align:left;'>";
              echo $event['text']['headline'];
              echo "</td>\n";
              echo "\t\t<td $tdClass style='text-align:left;'>";
              echo $event['group'];
              echo "</td>\n";
              echo "\t\t<td style='text-align:left' $tdClass>";
              echo "Approved";
              echo "</td>\n";
              echo "\t\t<td $tdClass style=\"text-align:left;\">";
              #echo "<button onclick=\"document.location='/src/event.php?eId=". $event['unique_id'] ."&opt=upd&page=listEvents&counter=$counter'\">Update</button>";

              echo "<form method='post' style='display:inline-block' action='/src/event.php'>
                        <input type='hidden' name='eId' value='". $event['unique_id'] ."' />
                        <input type='hidden' name='opt' value='upd' />
                        <input type='hidden' name='page' value='listEvents' />
                        <input type='hidden' name='counter' value='$counter' />
                        <input type='submit' name='uptEvent' value='Update' />
                      </form>";

              echo "&nbsp; &nbsp;";
              #echo "<button onclick=\"document.location='/src/event.php?eId=". $event['unique_id']. "&opt=del&page=listEvents&counter=$counter'\">Remove</button>";
              echo "<form method='post' style='display:inline-block' action='/src/event.php'>
                        <input type='hidden' name='eId' value='". $event['unique_id'] ."' />
                        <input type='hidden' name='opt' value='dlt' />
                        <input type='hidden' name='page' value='listEvents' />
                        <input type='hidden' name='counter' value='$counter' />
                        <input type='submit' name='dltEvent' value='Remove' />
                      </form>";

              echo "</td>\n";
              echo "</tr>\n";
              $counterDisplay++;
          } // END if(!in_array($event['unique_id'], $iseditedIds))
        $counter++;
      } // END foreach
    } // END if
  }


  ##############################################################################
  ### DISPLAYS EVENT INFORMATON (IMAGE/FORM) BY EVENT ID
  ##############################################################################
  function displayEvent(string $eId, string $opt, string $status){

      $isEvent = $isBackground = $media = $counter = 0;
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
          $json = file_get_contents('../json/editions.json');
        }else{
          $json = file_get_contents('../json/timeline.json');
        }

        if($json === FALSE){
          echo "ERROR:20230301083301. File is empty. Please contact your administrator.";
        }else{

          $data = json_decode($json, true); // Decode the JSON data into a PHP array

          // Sort the events array
          usort($data['events'], 'compare_start_date_ASCENDENT');

          // Search for the event object
          foreach ($data['events'] as $event) {
              $counter++;
              if ($event['unique_id'] == $eId) {
                $_POST['counter'] = $counter;
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
          } // END if data in file
        } // END if($eId != '')


        if($opt == 'new'){
          $author = $_SESSION['tL_user_LN'].'-'.$_SESSION['tL_user_ID'];
          $created_on = date("Y-m-d H:i");
          $last_modification = date("Y-m-d H:i");
        }


          ### CREATE AND HTML FORM FOR THE EVENT INFORMATION
          ### FOR DELETING THE EVENT FORM IS HIDDEN
          if($opt != 'dlt'){
            echo "<div>";
          }else{
            echo "<div style='display:none'>";
          }
            echo "<input type='hidden' name='author' value='$author' />";
            echo "<input type='hidden' name='created_on' value='$created_on' />";
            echo "<input type='hidden' name='last_modification' value='$last_modification' />";

            echo "<div class='iBlock'>";
            echo "<label for='group'>Event Group:</label>
                    <button type='button' class='qButton' onclick='window.open(\"/src/help.php#Egroup\", \"_blank\");'>?</button>
                    <select name='group'>
                      <option value='CIS' $groupCIS>CIS</option>
                      <option value='Fuzzy' $groupFuzzy>Fuzzy</option>
                      <option value='EC' $groupEC>EC</option>
                      <option value='NNs' $groupNNs>NNs</option>
                    </select>";

            echo "<label for='color'>Slide Background Color:</label>
                    <button type='button' class='qButton' onclick='window.open(\"/src/help.php#Ecolor\", \"_blank\");'>?</button>
                    <input type='color' name='color' value='$color' /><br><br>";
            #echo "<label for='backgroundURL'>Slide background URL:</label><input type='text' name='backgroundURL' value='$backgroundURL' /><br>";
            echo "</div>";

            echo "<div class='iBlock'>";
            echo "<h2>Event Information</h2>";
            echo "<label for='headline'>Event Headline: *</label>
                    <button type='button' class='qButton' onclick='window.open(\"/src/help.php#Eheadline\", \"_blank\");'>?</button>
                    <input type='text' name='headline' value='$headline' required /><br>";
            echo "<label for='text0'>Event Detail 1:</label>
                    <button type='button' class='qButton' onclick='window.open(\"/src/help.php#Edetails\", \"_blank\");'>?</button>
                    <input type='text' name='text0' value='$detail[0]' /><br>";
            echo "<label for='text1'>Event Detail 2:</label><input type='text' name='text1' value='$detail[1]' /><br>";
            echo "<label for='text2'>Event Detail 3:</label><input type='text' name='text2' value='$detail[2]' /><br>";
            echo "<label for='text3'>Event Detail 4:</label><input type='text' name='text3' value='$detail[3]' /><br>";
            echo "<label for='text4'>Event Detail 5:</label><input type='text' name='text4' value='$detail[4]' /><br>";
            echo "</div>";

            echo "<div class='iBlock'>";
            echo "<h2>Events Dates</h2>";
            echo "<p></p>";
            echo "<label for='start_date'>Start Date: <b>*</b></label>
                    <button type='button' class='qButton' onclick='window.open(\"/src/help.php#Edates\", \"_blank\");'>?</button>
                    <input type='date' class='dateInput' name='start_date' value='$start_date' required/><br>";
            echo "<label for='end_date'>End Date:</label>
                    <input type='date' class='dateInput' name='end_date' value='$end_date'/><br>";
            echo "</div>";

            echo "<div class='iBlock'>";
            echo "<h2>Media</h2>";
            echo "<label for='mediaURL'>Media URL:</label>
                    <button type='button' class='qButton' onclick='window.open(\"/src/help.php#Emedia\", \"_blank\");'>?</button>
                    The media could be an Image, YouTube, Vimeo, Google Maps and more.
                    <input type='text' name='mediaURL' value='$mediaURL' /><br>";
            echo "<label for='mediaLINK'>Media Link:</label>
                     <input type='text' name='mediaLINK' value='$mediaLINK' /><br>";
            echo "<label for='caption'>Media Caption:</label>
                    <input type='text' name='caption' value='$caption' /><br>";
            echo "<label for='credit'>Media Credit:</label>
                    <input type='text' name='credit' value='$credit' /><br>";
            echo "</div>";

            echo "</div> <!-- END DIV FOR DISPLAYING FORM -->";

            echo "<div class='iBlock'>";
            echo "<label for='comment'>Comments:</label>
                    Please include some comments about your updates for the approval committee.
                    <textarea name='comment'>$editComment</textarea>";
            echo "</div>";

  } ###  END function displayEvent



  ##############################################################################
  ### CREATE A NEW EVENT INSTANCE IN THE FILE EDITIONS FOR LATER APPROVAL
  ### 1. CREATE A NEW ID FOR THE NEW EVENTS
  ### 2. CREATE AN ARRAY AND A JSON FILE WITH THE NEW REQUESTS INFO 
  ### 3. IF THE OPTION IS 'eDel = FORGOT REQUEST' THE OLD REQUEST FILE IS RENAMED
  ### 4. ADD THE OLD REQUSTS TO THE ARRAY WITH THE NEW REQUEST.
  ### 5. UPDATE THE editions.json FILE
  ### 6. OPEN THE PAGE edit-events.php TO DISPLAY AGAIN THE NEW WAITING FOR APPROVAL LIST
  ##############################################################################
  function editEvent(){

    ## for a new event the unique_id must be created
    if ($_POST['eId'] == '') {
      $_POST['eId'] = 'CIS'.date("Ymdhis");
    }

    # if the forget edition option was chosen the array is not included in the new editions.json file
    if($_POST['opt'] != 'eDel'){

        $changes = Array (
                  "unique_id" => $_POST['eId'],
                  "author" => $_POST['author'],
                  "created_on" => $_POST['created_on'],
                  "last_modification" => $_POST['last_modification'],
                  "group" => $_POST['group'],
                  "text" => Array (
                      "headline" => $_POST['headline'],
                      "text" => $_POST['text0'].'<br>'.$_POST['text1'].'<br>'.$_POST['text2'].'<br>'.$_POST['text3'].'<br>'.$_POST['text4'],
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
                  "background" => Array (
                    "color" => $_POST['color'],
                    "opacity" => 50,
                    "url" => NULL
                  ),
                  "change" => Array (
                      "user" => $_SESSION['tL_user_LN'].'-'.$_SESSION['tL_user_ID'],
                      "date" => date("Y-m-d H:i"),
                      "action" => $_POST['opt'],
                      "comment" => $_POST['comment']
                  ),
              );

            $events = array($changes);

            ### create a JSON file just for this edition ***************************
            $singleEventEdited = array("events" => $events);

            // encode array to json
            $json = json_encode($singleEventEdited,JSON_PRETTY_PRINT);
            $filename = '../json/'.$_POST['eId'].'.json';
            // Write the contents to the file,
            // using the FILE_APPEND flag to append the content to the end of the file
            // and the LOCK_EX flag to prevent anyone else writing to the file at the same time
            $bytes = file_put_contents($filename,$json, LOCK_EX);
            ### ********************************************************************
            
        } // END if($_POST['opt'] != 'eDel')
        else{ // If forgot request
          
          ## rename file so the old request is forgot
          $fileName = '../json/'.$_POST['eId'].'.json';
          $nowDate = date("ymdHi");
          $fileRename = '../json/'.$_POST['eId'].'-f'.$nowDate.'.json';          
          rename ($fileName,$fileRename);

          $events = array(); // not include any new records
          
        }

 

      ## Updates the editions file
      $edit_json = file_get_contents('../json/editions.json');
      if($edit_json){
        // Decode the JSON data into a PHP array
        $edit_data = json_decode($edit_json, true);

        foreach ($edit_data['events'] as $event) {
          if($event['unique_id'] != $_POST['eId']){ // avoiding duplicagtions if an edited event is re-edited
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
      $bytes = file_put_contents('../json/editions.json',$json, LOCK_EX);
      header("Location: /src/edit-events.php");

  }


  ### ****************************************************************************
  ### LIST EDITIONS AND ALLOW THE USER TO APPROVE OR DENY CHANGES
  ### ****************************************************************************
    function displayForApproval(){
      if($_SESSION['tL_userRoll'] != 'Committee'){
        echo "You can approve or reject a request that is pending approval only if you are a member of the timeline committee.";
      }else{

      $editedEvents = array(); // for the unique_id of edited events

      $data = file_get_contents('../json/editions.json'); // Read the EDITIONS JSON file
      if(!$data){
        echo "ERROR:20230301081520. Editions file is empty. Please contact your administrator.";
      }else{
        $data = json_decode($data, true);// Decode the JSON data into a PHP array

        foreach ($data['events'] as $event) {

                  array_push($editedEvents, $event['unique_id']);

                  if($event['change']['action'] == 'dlt'){
                    $action = 'Removed';
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

                  echo "<div class='aBlock'>";

                  if($opt != 'new'){
                    echo "<br><b>Event created on</b>: $created_on &nbsp;&nbsp; <b>by</b>: $author<br>";
                  }

                  if($created_on != $last_modification){
                    echo "<b>Last modification</b>: $last_modification<br>";
                  }

                  echo "<br><div id='$unique_id' style='width:100%; height:450px;' padding: 0 10px 0 10px;></div><br>";

                  echo "<script>
                   $(document).ready(function() {
                       var embed = document.getElementById('$unique_id');
                       window.timeline = new TL.Timeline('$unique_id', '../json/$unique_id.json', {
                           hash_bookmark: false,
                           font: 'fjalla-average',
                           scale_factor: 1,
                           initial_zoom: 1,
                           zoom_sequence: [0.5, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89],
                           timenav_height: 50,
                           start_at_end: true
                      });

                   });
                  </script>";

                  
                  echo "<b>Request</b>: $action<br>";
                  echo "<b>Requested on</b>: $change_date<br>";
                  echo "<b>Requested by</b>: $editUser<br>";
                  echo "<b>Request's comments:</b> $editComment <br><br><hr>";
                  

                  

                  echo "<form method='post' action='/src/event-manager.php'>";
                  echo "<label for='comment'>Approval or rejection reasons and/or comments:</label>
                          <textarea name='comment' placeholder='Enter here the approval or rejection reasons and/or additional comments.' required></textarea>";
                  echo "<div class='rightBlock'>";
                  echo "<input type='hidden' name='eId' value='$unique_id' >";
                  echo "<input type='hidden' name='opt' value='$opt' >";
                  echo "<input type='hidden' name='page' value='approveEvent' />";
                  echo "<input type='submit' name='submit' value='Approve' >";
                  echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                  echo "<input type='submit' name='submit' value='Reject' >";
                  echo "</form>";
                  
                  echo "</div>";

                  echo "</div>\n";

          } // END foreach
        } // END if($data)
        if(count($editedEvents) == 0){
          echo "<div style='text-align:center'><h2>No pending request found!</h2></div>";
        }
        $GLOBALS['editedIds'] = $editedEvents;
      } // END if($_SESSION['tL_userRoll'] == 'Admin')
    }


  ### ****************************************************************************
  ### AFTER APPROVAL OR DENY OPTION
  ### 1. GETS THE EVENT DATA FROM THE EDITIONS FILE. UPDATES LAST MODIFICATON DATE AND ADDS DECISION INFORMATION.
  ### 2. ADDS THE DECISION TO THE DECISION LOG FILE.
  ### 3. RECREATES THE EDITIONS JSON FILE WITHOUT THE (APPROVED OR DENIED) EVENT.
  ### 4. IF APPROVE => IF OPTION IS NOT DELETE EVENT => A NEW TIMELINE JSON FILE IS CREATED WITH THE UPDATED EVENT + OLDER EVENTS.
  ### 5. A CONFIRMATION EMAIL IS SENT.
  ### ****************************************************************************
    function updateProdTimeline(){

      // First checks user roll
      if($_SESSION['tL_userRoll'] != 'Committee'){
        echo "You can approve or reject a request that is pending approval only if you are a member of the timeline committee. ";
      }else{
        if(isset($_POST['eId'])){

          $eId = $_POST['eId'];
          $eHeadline = ''; // saves the event's information for the confirmation
          $eDesicionComment = $_POST['comment']; // saves the event's information for the confirmation
          $editedEvent = ''; // the edited event approved or denied
          $events = array(); // array for the approved event + production events
          $editions = array(); // array for the edited events - (approved/denied) event

          ### ===========================================================================================================
          ### 1. GETS THE EVENT DATA FROM THE EDITIONS FILE. UPDATES LAST MODIFICATON DATE AND ADDS DECISION INFORMATION.
          ### ===========================================================================================================
          $data = file_get_contents('../json/editions.json'); // Read the EDITIONS JSON file
          if(!$data){
            echo "No requests found.";
          }else{
            $data = json_decode($data, true); // Decode the JSON data into a PHP array

            foreach ($data['events'] as $event) {
                if($event['unique_id'] == $_POST['eId']){
                    $eHeadline = $event['text']['headline'];
                    $event['last_modification'] = date("Y-m-d H:i");
                    ### adding the edited event to  decision log ===================
                    $event['desicion'] =  Array (
                                                  "user" => $_SESSION['tL_user_LN'].'-'.$_SESSION['tL_user_ID'],
                                                  "date" => date("Y-m-d H:i"),
                                                  "action" => $_POST['submit'],
                                                  "comment" => $_POST['comment']
                                                  );

                    $editedEvent = $event; // save the appreved or denied event in the variable for later.

                    ### ===========================================================================================================
                    ### 2. ADDS THE DECISION TO THE DECISION LOG FILE.
                    ### ===========================================================================================================
                    $json = json_encode($event,JSON_PRETTY_PRINT); // encode array to json
                    $bytes = file_put_contents('../json/timeline-decisions-log.json', $json, FILE_APPEND | LOCK_EX); // Write the contents to the file, using the FILE_APPEND flag to append the content to the end of the file, and the LOCK_EX flag to prevent anyone else writing to the file at the same time

                  }else{
                    ### add other edited events to the editions array=================
                    array_push($editions, $event);
                  }
                } // END foreach


                ### ===========================================================================================================
                ### 3. RECREATES THE EDITIONS JSON FILE WITHOUT THE (APPROVED OR DENIED) EVENT.
                ### ===========================================================================================================
                $timelineChanges = array("events" => $editions);
                $json = json_encode($timelineChanges,JSON_PRETTY_PRINT); // encode array to json
                $bytes = file_put_contents('../json/editions.json',$json, LOCK_EX); // Write the contents to the file, and the LOCK_EX flag to prevent anyone else writing to the file at the same time


                ### ===========================================================================================================
                ### 4. IF APPROVE => IF OPTION IS NOT DELETE EVENT => A NEW TIMELINE JSON FILE IS CREATED WITH THE UPDATED EVENT + OLDER EVENTS.
                ### ===========================================================================================================
                if($_POST['submit'] == 'Approve'){
                  ### Creates the title of the new Timeline JSON file

                  if($_POST['opt'] != 'dlt'){
                    array_push($events, $event); // adds the approved event to the array $events so it is included into the new file
                  }

                  ### adding old production events to the new file =============
                  $dataT = file_get_contents('../json/timeline.json'); // Read the production timeline JSON file
                  if(!$dataT){
                    echo "ERROR:20230301081310. Timeline file is empty. Please contact your administrator.";
                  }else{
                      $dataT = json_decode($dataT, true); // Decode the JSON data into a PHP array
                      foreach ($dataT['events'] as $timelineE) {
                        // In case the event already exist in production, the old version it is not included.
                        if($timelineE['unique_id'] != $_POST['eId']){
                          array_push($events, $timelineE);
                        } // END if($event['unique_id'] != $_POST['eId'])
                      } // END foreach
                  }// END sif($dataT)



                  // adds the title to the new timeline and the events
                  $newRecords = Array(
                              "title" => Array(
                                  "text"=> Array(
                                    "headline" => "IEEE-CIS HISTORICAL TIMELINE",
                                    "text" => "Welcome to the Institute of Electrical and Electronics Engineers (IEEE) Computational Intelligence Society (CIS) Historical Timeline!"
                                  ),
                                    "media" => Array(
                                        "url"=> "https://cis.ieee.org/images/files/Branding/logos/color/IEEE_CIS_logo_RGB_72ppi.jpg",
                                        "credit" => "<a href='https://cis.ieee.org/'>cis.ieee.org</a>"
                                  ),
                                  "unique_id" => "TITLE-001"
                                ),
                              "events" => $events);

                  ### Creates a new timeline json file with the edition approved + old records.
                  ### ========================================================================
                  $json = json_encode($newRecords,JSON_PRETTY_PRINT); // encode array to json
                  $bytes = file_put_contents("../json/timeline-update.json",$json, LOCK_EX); // Write the contents to the file, and the LOCK_EX flag to prevent anyone else writing to the file at the same time


                    // Rename the production timeline json file.
                    $filename = '../json/timeline_BAK_'.date("m").'.json';
                    rename("../json/timeline.json",$filename);
                    // Rename the new json file so it is the production file.
                    rename("../json/timeline-update.json","../json/timeline.json");

                    $message = 'The requested modification for the IEEE CIS Historical Timeline Event "'. $eHeadline .'" has been approved with the next comments:
                                <br><br>'.$eDesicionComment.'<br><br>
                                <a href="/index.php" target="_blank">Open the IEEE CIS Historical Timeline</a>';

                }else{
                  $message = 'The requested modification for the IEEE CIS Historical Timeline Event "'. $eHeadline .'" has been denied for the next reasons:
                                <br><br>'.$eDesicionComment.'<br><br>
                                <a href="/index.php" target="_blank">Open the IEEE CIS Historical Timeline</a>';
                }

                // Deletes the single event edited json file
                unlink("../json/$eId.json");

            header("Location: /src/approve.php");

            } // END if($data)
        } // END if(eId)
      } // if user is not timeline committee.
  }


?>
