<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2022-11 AH
  session_start();
?>

<!DOCTYPE html>
<html>

  <head>
    <title>IEEE-CIS HISTORICAL TIMELINE - HELP</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
      body{
        margin: auto;
        padding: 20px;
        width: 80%;
      }
      .helpImg{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      }
      img{
        margin: 1em;
      }
    </style>
  </head>

  <body>
    <div class="pageTitle">
      <h1>IEEE-CIS HISTORICAL TIMELINE - HELP</h1>
    </div>

    <?php include ("../src/menu.php"); ?>

    <div class="leftBlock">


      <a href="#navegation"> </a>
        <h3>How To Navegate In The Timeline</h3>
        <img class="helpImg" src="/img/Timeline-navegation.png" width="90%" title="Timeline">

      <br><hr><br>

      <a href="#creating"> </a>
        <h3>How To Create a New Event</h3>
        <ul class="helpItem">
          <li>Click on the "Create Event" menu button.</li>
          <img class="helpImg" src="/img/CreateEvent.png" width="800px" title="Timeline">
          <li>Field the event information. Every event must have at least a title and a start date.</li>
          <li>Include the comments/reason about the new event at the end of form and click on the "Create" button to submit the form.</li>
          <li>You can update the new event later after creating it. The new event will move to production when the Historical Committe aprove it. </li>
        </ul>

      <br><hr><br>

      <a href="#Fields"> </a>
        <h3>The Event Information</h3>
        <ol class="helpItem">
          <li><b>Event Group:</b> By default will be set CIS group, but you can select any of the options (FUZZI,EC,NNs).</li>
            <img class="helpImg" src="/img/EventGroup.png" width="800px" title="Timeline">
          <li><b>Slide Background Color:</b> Each event has a slide in the timeline and you can choose a different background color for it.</li>
            <img class="helpImg" src="/img/EventColor.png" width="800px" title="Timeline">
          <li><b>Event Headline:</b> The headline will be displayed below the dates in a large font size. It also will be display in the navegation bar. This field is required.</li>
          <li><b>Event Detail 1:</b> The first detail will be placed in a different line below the title in a small letter.</li>
          <li><b>Event Detail 2:</b> The second detail will be placed in a below the first detail in the same small letter.</li>
          <li><b>Event Detail 3:</b> The third detail will be placed in the next line.</li>
          <li><b>Event Detail 4:</b> This detail will be placed in the next line.</li>
          <li><b>Event Detail 5:</b> This detail will be placed in the next line.</li>
          <li>Include the comments/reason about the new event at the end of form and click on the "Create" button to submit the form.</li>
        </ol>


      <br><hr><br>

      <a href="#updating"> </a>
        <h3>How To Update an Event</h3>
        <img class="helpImg" src="/img/UpdateEvent.png" width="800px" title="Timeline">

      <br><hr><br>

      <a href="#removing"> </a>
        <h3>How To Remove an Event</h3>
        <img class="helpImg" src="/img/UpdateEvent.png" width="800px" title="Timeline">

      <br><hr><br>

      <a href="#approving"> </a>
        <h3>How To Approve a Request</h3>
        <img class="helpImg" src="/img/ApproveEvent.png" width="800px" title="Timeline">


      <br><hr><br>

      <a href="#sandbox"> </a>
        <h3>The Sandbox Timeline</h3>
        <img class="helpImg" src="/img/SandboxView.png" width="800px" title="Timeline">

    </div>



    <div class="footer">
      © Copyright 2023 IEEE – All rights reserved. A not-for-profit organization, IEEE is the world's largest technical professional organization dedicated to advancing technology for the benefit of humanity.
    </div>

  </body>

</html>
