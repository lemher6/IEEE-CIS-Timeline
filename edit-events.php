<!DOCTYPE html>
<html>

  <head>
    <title>IEEE-CIS TIMELINE HOME</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
  </head>

  <style>
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
    <h2>EDIT TIMELINE EVENTS</h2>

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
          new RecursiveArrayIterator(json_decode(file_get_contents("./timeline.json"), TRUE)),
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
