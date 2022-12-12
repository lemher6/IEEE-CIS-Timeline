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

    <table style="width:100%">
      <tr>

    <?php

      $jsonIterator = new RecursiveIteratorIterator(
          new RecursiveArrayIterator(json_decode(file_get_contents("./timeline.json"), TRUE)),
          RecursiveIteratorIterator::SELF_FIRST);

      foreach ($jsonIterator as $key => $val) {
          if(is_array($val)) {
              echo "\n";
          } else {
                if($key == 'start_date'){ echo "\t<tr>\n"; }
                if($key == 'year'){ echo "\t\t<td>$val\n"; }
                if($key == 'month'){ echo "-$val-"; }
                if($key == 'day'){ echo "$val</td>\n"; }
                if($key == 'headline'){ echo "\t\t<td>$val</td>\n"; }
                if($key == 'group'){ echo "\t\t<td>$val</td></tr>\n"; }
          }
      }

    ?>
      </tr>
    </table>

  </body>

</html>
