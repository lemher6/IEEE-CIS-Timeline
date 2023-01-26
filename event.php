<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2022-11 AH
?>

<!DOCTYPE html>
<html>

  <head>
    <title>IEEE-CIS TIMELINE HOME</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="./css/style.css">

    <style>
      body{
        margin: auto;
        padding: 1em;
      }
      .iBlock{
        text-align:left;
        border-radius: 5px;
        background-color: #f9f9f9;
        padding: 1em;
        border: #dddcdc 1px solid;
      }
      .eventView{
        border: 1px solid gray;
        display: block;
        width: 80%;
        margin: auto;
        padding: 1em;
        height: 250px;
      }
      .floatLeft{
        float: left;
        text-align: right;
        width: 40%;
        padding-right: 1em;
      }
      .floatRight{
        float: right;
        text-align: left;
        width: 50%;
        padding-left: 1em;
        vertical-align: middle;
      }
      .dates{
        font-size: 0.7em;
      }
      .title{
        font-size: 2.3em;
        font-weight: bold;
      }
      .details{
        font-size: 0.8em;
      }

      @media only screen and (min-width: 768px) {
      /* ==== For desktop: ===== */
          body{
            width: 80%;
          }
          .rightBlock{
            padding:10px 30px;
            width: 90%;
          }
          .formBlock{
              width: 80%;
              margin: auto;
          }
          .iBlock{
            margin: 2em;
          }

      }
    </style>
  </head>

  <body>
      <div class="pageTitle">
        <h1>TIMELINE EVENT</h1>
      </div>

      <?php include ("./menu.php"); ?>

      <?php
        ########################################################################
        ### IF AN EVENT ID IS PASSED
        ########################################################################
        if(isset($_GET['eId'])){
          $eId = $_GET['eId'];
        }else{
          $eId = '';
        }

        if(isset($_GET['opt'])){
          $opt = $_GET['opt'];
        }else{
          $opt = '';
        }

        include ("./event-manager.php");
        displayEvent($eId,$opt);
        ?>

      <div class="formBlock">
        <form method="post" action="event-manager.php">
          <input type="hidden" name="eId" value="<?php echo $eId; ?>" />



        <?php
          ########################################################################
          ### CREATING OR UPDATING AN EVENT
          ########################################################################
          if($opt == 'new'){
        ?>
            <div class="rightBlock">
              <p>Complete the event information and then click on submit button.</p>
              <input type="hidden" name="opt" value="new" />
              <input type="submit" value="Submit" />
            </div>

        <?php  } // END if($op == 'new')  ?>


        <?php
              ########################################################################
              ### DELETING AN EVENT
              ########################################################################
              if($opt == 'del'){
        ?>
                <div class="rightBlock">
                  <p>Do you want to delete this event?</p>
                  <input type="hidden" name="opt" value="del" />
                  <input type="submit" value="Yes" />
                  <button type="button" onclick="document.location='edit-events.php'">Cancel</button>
                </div>
              <?php  } // END if($op == 'del')  ?>


              <?php
                ########################################################################
                ### CREATING OR UPDATING AN EVENT
                ########################################################################
                if($opt == 'upd'){
              ?>
                  <div class="rightBlock">
                      <p>Update the event information and then click on submit button.</p>
                        <input type="hidden" name="opt" value="upt" />
                        <input type="submit" value="Submit" />
                  </div>

              <?php  } // END if($op == 'upd')  ?>


      </form>
    </div>

  </body>

</html>
