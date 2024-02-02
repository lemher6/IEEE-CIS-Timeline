<?php
  ### IEEE-CIS TIMELINE PROJECT
  ### 2022-11 AH
  ### V1.1: A new line was added to the Timeline-min.js file. document.getElementById("eId").value=this.data.unique_id): So the unique_id is set to the update event menu option.
  ### V.2.1 2024-01-02 AH Changing the javascript Timeline-min.js file element id. That element was split into two different form in order to make a POST form instead of GET.
  ###                     document.getElementById("eIdEdit").value=this.data.unique_id,document.getElementById("eIdDlt").value=this.data.unique_id
  
  session_start();
  include('./check-login.php');
  
  include('./header.php');

  include ('./menu.php'); 
?>

 
    
      <div class="timeline-content">

        <div id="timeline-embed">
              <div id="timeline"></div>
        </div>


        <script>
         $(document).ready(function() {
             var embed = document.getElementById('timeline-embed');
             embed.style.height = getComputedStyle(document.body).height;
             window.timeline = new TL.Timeline('timeline-embed', '/json/timeline.json', {
                 hash_bookmark: true, /* If set to true, TimelineJS will update the browser URL each time a slide advances, so that people can link directly to specific slides. */
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
        
      </div>
      <!-- END DIV CONTENT -->
    

      </body>

</html>