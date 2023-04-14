<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2022-11 AH
  session_start();
  include('./check-login.php');
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

      <h2>Guideline to Contribute to the CIS History Timeline</h2>

        <b>This document provides a guideline on best practices while contributing to the CIS History Timeline (CIS-HT).</b>
        <br><br>
        The purpose of the CIS-HT is to provide a portal where CIS students, researchers, and the public in general can find important past (and future, i.e. soon-to-be-past) 
        events in the History of the CIS and CI in general.  Here, users will be able to upload pictures of attendees and participants in such CIS events; original documents,
         manuscripts, and reports that reflect important milestones in our history and the history of the development of CI and AI in general; videos with interviews of 
         prominent researchers; and so on.  The CIS-HT follows a wikipedia-like model where anyone can contribute. However, ours is a moderated model, meaning: contributions 
         will be submitted and initially hidden from other users. All submissions will then be scrutinized by the CIS History Committee members who will approve or reject 
         the contribution according to the following criteria:
        <br><br>
        <b>1.</b> Photos/Videos must be owned by the authors;
        <br>
        <b>2.</b> Permissions for use of the material must be obtained whenever applicable;
        <br>
        <b>3.</b> Materials/Events should not focus on ‘self-promotion’ or the promotion of any particular group, but of the CIS and its members in general -- e.g. 
                  pictures of attendees in a conference must not focus on one person/group of people;
        <br>          
        <b>4.</b> Documents must have a recognizable and widely accepted historical value to the CIS;
        <br>
        ...
        <br><br>
        Once approved, the contribution will be made publicly visible and the author(s) will be notified. If any contribution violates any of the guidelines, the author of the contribution will be simply informed of the guideline number that was violated. No further explanations will be provided, however one opportunity for an appeal to the decision will be accepted.
        <br><br>
        Indicate in the submission form which criterion is ‘appeable’ -- e.g. #4 would not be appeable. The form should include a justification for the submission.
        <br><br>
        For sake of documenting the reason the committee denied a contribution and avoid having to list every single reason, the form will include a reason for the denial.  
        <br><br>
        Add information on how to submit (directly on the website or by email). 
        <br><br>
        Copyright material: should be mentioned? Should it list the name of the owner? Keep archive of all submission forms, emails, etc… with copyright information.
        <br><br>
        Make website look and feel like a museum 
        <br><br>
        Prepare the form for downloading and online access

        <br><br><hr><br><br>


        <span id="navegation"> </span>
          <h2>How to Navigate The Timeline</h2>
          <img class="helpImg" src="/img/Timeline-navegation.png" width="90%" title="How to navigate the Timeline.">

        <br><br><hr><br><br>

        <span id="creating"> </span>
          <h2>How To Create a New Event</h2>
          <ul class="helpItem">
            <li>Click on the "Create Event" menu button.</li>
            <img class="helpImg" src="/img/CreateEvent.png" width="550px" title="Create Option">
            <li>Field the event information <a href="#Enfio"><i style="font-size:24px; color:#20b2e2" class="fa">&#xf059;</i></a>. Every event must have at least a title and a start date.</li>
            <li>Include the comments/reason about the new event at the end of form and click on the "Create" button to submit the form.</li>
            <li>You can update the new event later after creating it. The new event will move to production when the Historical Committe aprove it. </li>
          </ul>

        <br><br><hr><br><br>


          <span id="Enfio"> </span>
          <h2>The Event Information</h2>
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
          <h2>How To Update an Event</h2>
          <ul class="helpItem">
            <li>Click on the "Launch Timeline" menu button.</li>
            <img class="helpImg" src="/img/LaunchTimeline.png" width="550px" title="Launch Timeline">
            <li>Look for the event you need to update in the Production Timeline. When the event to be updated is displayed on your screen, Click on the menu option "Update This" to open the updating page.</li>
            <img class="helpImg" src="/img/UpdateEvent.png" width="550px" title="Update This Event">
            <li>A new page will be loaded with the event's information.
              Update the event's information, and include some comments or reason about the updates for the committee. Click on "Update" to save your changes.
              You can continue editing the event again until the Historical Committee approve or reject your request.</li>
              <li>You can see and edit your updates and removals with the menu option "Waiting Approval."</li>
          </ul>

        <br><br><hr><br><br>

        <span id="removing"> </span>
          <h2>How To Remove an Event</h2>
          <ul class="helpItem">
            <li>Click on the "Launch Timeline" menu button.</li>
            <img class="helpImg" src="/img/LaunchTimeline.png" width="550px" title="Launch Timeline">
            <li>Look for the event you want to remove in the Production Timeline. When the event to be removed is displayed on your screen, Click on the menu option "Update This" to open the updating page.</li>
            <img class="helpImg" src="/img/RemoveEvent.png" width="550px" title="Remove This Event">
            <li>Include your comments or reason why the event should be removed for the committee. Click on "Yes" to request the removal.</li>
            <li>You can see and edit your updates and removals with the menu option "Waiting Approval."</li>
          </ul>

        <br><br><hr><br><br>

        <span id="approving"> </span>
          <h2>How To Approve a Request</h2>
          <ul class="helpItem">
            <img class="helpImg" src="/img/ApproveEvent.png" width="550px" title="Approve Request">
          </ul>        

      </div>


    </div><!-- END DIV CONTENT -->
    <div class="footer">
      © Copyright 2023 IEEE – All rights reserved. A not-for-profit organization, IEEE is the world's largest technical professional organization dedicated to advancing technology for the benefit of humanity.
    </div>

  </body>

</html>
