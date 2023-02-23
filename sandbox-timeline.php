<!DOCTYPE html>

<html lang="en">

    <head>
        <title>IEEE-CIS TIMELINE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link title="timeline-styles" rel="stylesheet" href="/css/timeline.css">
        <script src="/js/timeline-min.js"></script>

        <style>
          html, body {
              height: 700px;
              margin: auto;
          }

      </style>

    </head>

    <body>
      <div class="pageTitle">
        <h1>SANDBOX TIMELINE</h1>
      </div>

      <?php include ("./menu.php"); ?>

      <div id="timeline-embed" style="width:auto; height:100%;">
            <div id="timeline"></div>
      </div>


      <script>
       $(document).ready(function() {
           var embed = document.getElementById('timeline-embed');
           embed.style.height = getComputedStyle(document.body).height;
           window.timeline = new TL.Timeline('timeline-embed', './editions.json', {
               hash_bookmark: false, /* If set to true, TimelineJS will update the browser URL each time a slide advances, so that people can link directly to specific slides. */
               font: "fjalla-average",
               scale_factor: 1, /* How many screen widths wide the timeline should be at first presentation. */
               initial_zoom: 1, /* The position in the zoom_sequence series used to scale the Timeline when it is first created. Takes precedence over scale_factor. */
               zoom_sequence: [0.5, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89], /* Array of values for TimeNav zoom levels. Each value is a scale_factor, which means that at any given level, the full timeline would require that many screens to display all events. */
               start_at_end: true
          });
           window.addEventListener('resize', function() {
               var embed = document.getElementById('timeline-embed');
               embed.style.height = getComputedStyle(document.body).height;
               timeline.updateDisplay();
           })
       });
      </script>
    </body>

</html>
