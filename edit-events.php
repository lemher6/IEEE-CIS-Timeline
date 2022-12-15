<!DOCTYPE html>
<html>

  <head>
    <title>IEEE-CIS TIMELINE HOME</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
  </head>

  <style>
    body{
      margin: auto;
      padding: 20px;
      width: 80%;
    }
    .iblock{
        padding: 1em;
    }
    .info{
        padding: 1em;
        float: left;
    }
    .text{
        padding: 1em;
    }

  </style>


  <body>
    <div class="logo">
      <img src="https://cis.ieee.org/images/files/template/cis-logo.png" alt="(IEEE) Computational Intelligence Society">
    </div>
    <div class="bar">
      <h1>EDIT TIMELINE EVENTS</h1>
      <!--<button onclick="document.location='timeline-google-sheet.html'">Launch Timeline <br> using Google Sheets</button>-->
      <button onclick="document.location='index.html'">Home Page</button>
      <button onclick="document.location='edit-events.php'">Edit Events</button>
      <button onclick="document.location='sandbox-timeline.html'">Launch Sandbox Timeline</button> <!-- Using JSON file -->
      <button onclick="document.location='approve.html'">Approve Changes</button>
      <button onclick="document.location='timeline-Launch.html'">Launch Production Timeline</button> <!-- Using JSON file -->
    </div>
    <br><br>

    <div style="text-align:right; padding:10px 30px;">
      <button onclick=\"document.location='event.html?opt=new'\">Create a New Event</button>
    </div>

    <table style="width:100%">
      <tr>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Headline</th>
        <th style="text-align:center;">Group</th>
        <th style="text-align:center;">Options</th>
      </tr>
      <tr>

    <?php

      $isEvent = 0;

      $jsonIterator = new RecursiveIteratorIterator(
          new RecursiveArrayIterator(json_decode(file_get_contents("./sandbox-timeline.json"), TRUE)),
          RecursiveIteratorIterator::SELF_FIRST);

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
                if($key == 'group'){
                  echo "\t\t<td style=\"text-align:center;\">$val</td>\n";
                  echo "\t\t<td  style=\"text-align:center;\">
                              <button onclick=\"document.location='event.html?opt=upd'\">Update</button>
                              &nbsp; &nbsp;
                              <button onclick=\"document.location='event.html?opt=del'\">Delete</button>
                            </td></tr>\n";
                }
              }
          }
      }

    ?>
      </tr>
    </table>

  </body>

</html>
