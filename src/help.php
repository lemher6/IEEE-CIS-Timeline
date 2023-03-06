<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2022-11 AH
  session_start();
  include('./check-login.php');
  checkLogin('Ana','123','Admin');
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
      .helpImg{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      }
      img{
        margin: 1em;
      }

      @media only screen and (min-width: 768px) {
      /* ==== For desktop: ===== */
          .content{
            width: 80%;
          }
      }
    </style>
  </head>

  <body>
    <div class="content">

      <div class="pageTitle">
        <h1>IEEE-CIS HISTORICAL TIMELINE - HELP</h1>
      </div>

      <?php include ("../src/menu.php"); ?>

      <div class="leftBlock">


        <span id="navegation"> </span>
          <h3>How To Navegate In The Timeline</h3>
          <img class="helpImg" src="/img/Timeline-navegation.png" width="90%" title="Timeline">

        <br><br><hr><br><br>

        <span id="creating"> </span>
          <h3>How To Create a New Event</h3>
          <ul class="helpItem">
            <li>Click on the "Create Event" menu button.</li>
            <img class="helpImg" src="/img/CreateEvent.png" width="800px" title="Create Option">
            <li>Field the event information <a href="#Egroup"><i style="font-size:24px; color:#20b2e2" class="fa">&#xf059;</i></a>. Every event must have at least a title and a start date.</li>
            <li>Include the comments/reason about the new event at the end of form and click on the "Create" button to submit the form.</li>
            <li>You can update the new event later after creating it. The new event will move to production when the Historical Committe aprove it. </li>
          </ul>

        <br><br><hr><br><br>


          <h3>The Event Information</h3>
          <ol class="helpItem">
            <span id="Egroup"> </span>
            <li><b>Event Group:</b> By default will be set CIS group, but you can select any of the options (FUZZI,EC,NNs).</li>
              <img class="helpImg" src="/img/EventGroup.png" width="800px" title="Event Group">
            <span id="Ecolor"> </span>
            <li><b>Slide Background Color:</b> Each event has a slide in the timeline and you can choose a different background color for it. Click on the color box to display the browser's color box tool.</li>
              <img class="helpImg" src="/img/EventColor.png" width="800px" title="Event Color">
            <span id="Eheadline"> </span>
            <li><b>Event Headline:</b> The headline will be displayed below the dates in a large font size. It also will be display in the navegation bar. This field is required.</li>
              <img class="helpImg" src="/img/EventTexting.png" width="800px" title="Event Headline">
            <span id="Edetails"> </span>
            <li><b>Event Detail 1:</b> The first detail will be placed in a different line below the title in a small letter.</li>
              <img class="helpImg" src="/img/EventDetails.png" width="800px" title="Event Headline">
            <li><b>Event Detail 2:</b> The second detail will be placed in a below the first detail in the same small letter.</li>
            <li><b>Event Detail 3:</b> The third detail will be placed in the next line.</li>
            <li><b>Event Detail 4:</b> This detail will be placed in the next line.</li>
            <li><b>Event Detail 5:</b> This detail will be placed in the next line.</li>
            <span id="Edates"> </span>
            <li><b>Start Date:</b> Every event must have a sart and end date. You can type in the month, day, and year when the event starts, or you can click on the calendar icon at the end of the line to display the browser's calendar tool.</li>
              <img class="helpImg" src="/img/EventDates.png" width="800px" title="Event Start and End Dates">
            <li><b>End Date:</b> Input the month, day, and year when the event ends.</li>
            <span id="Emedia"> </span>
            <li><b>Media URL:</b> This Timeline can pull in media from a variety of sources and has built-in support for Images, Twitter, Instagram, Flickr, Google Maps, DropBox, DocumentCloud, Wikipedia, SoundCloud, Storify, iframes, and the major video sites (YouTube, Vimeo, etc.) Include the URL where the media file is located for example(https://cis.ieee.org/images/IEEE_CIS_logo.jpg)</li>
              <img class="helpImg" src="/img/EventMedia.png" width="800px" title="Event Media">
            <li><b>Media Link:</b> A linked site could be added to your media if it is an image. It will be open in a new page in the browser. Include the URL location of the site you want to link for example(https://cis.ieee.org/publications)</li>
            <li>Include the comments/reason about the new event at the end of form and click on the "Create" button to submit the form.</li>
              <img class="helpImg" src="/img/EventComments.png" width="800px" title="Event Media">
          </ol>


        <br><br><hr><br><br>

        <span id="updating"> </span>
          <h3>How To Update an Event</h3>
          <img class="helpImg" src="/img/UpdateEvent.png" width="800px" title="Update Event">

        <br><br><hr><br><br>

        <span id="removing"> </span>
          <h3>How To Remove an Event</h3>
          <img class="helpImg" src="/img/UpdateEvent.png" width="800px" title="Remove Event">

        <br><br><hr><br><br>

        <span id="approving"> </span>
          <h3>How To Approve a Request</h3>
          <img class="helpImg" src="/img/ApproveEvent.png" width="800px" title="Approve Request">


        <br><br><hr><br><br>

        <span id="sandbox"> </span>
          <h3>The Sandbox Timeline</h3>
          <img class="helpImg" src="/img/SandboxView.png" width="800px" title="Sandbox Timeline">

      </div>


    </div><!-- END DIV CONTENT -->
    <div class="footer">
      © Copyright 2023 IEEE – All rights reserved. A not-for-profit organization, IEEE is the world's largest technical professional organization dedicated to advancing technology for the benefit of humanity.
    </div>

  </body>

</html>
