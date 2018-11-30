<?php
  include('includes/init.inc.php'); // include the DOCTYPE and opening tags
?>
<title>RPI Events</title>

<?php
  include('includes/head.inc.php'); // include global css, javascript, end the head and open the body
?>

<script type="text/javascript" src="resources/scripts/saved_events.js"></script>
</head>

<?php
  include('includes/nav2.inc.php'); // include global css, javascript, end the head and open the body
?>

<?php

    if ( isset($_POST['RemoveEvent']) ) {
      if( $_POST['RemoveEvent'] != "-1" ) {
        $EID = $_POST['RemoveEvent'];
        $UID = $_SESSION['userID'];
        $dbcon->exec("DELETE FROM `attendants` WHERE `eid` = '$EID' AND `uid` = '$UID'");
        $_POST['delete'] = "-1";
      }
    }
?>


  <div id="saved-events" class="container-fluid text-center event-table page">
    <h2>Events Saved by You</h2>
    <br><br><br>
    <h4 id="loading-saved-events">Loading...</h4>
  </div>

  <!-- Modal -->
  <div id="eventModal-SavedEvents" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 id="event-modal-title1" class="modal-title">Event Title</h4>
        </div>
        <div id="event-modal-body2" class="modal-body">
          <div class="row">
            <div class="col-sm-2" style="text-align: right;">
              <p><em>Date:</em></p>
            </div>
            <div class="col-sm-10" style="text-align: left;">
              <p id="event-modal-date2"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2" style="text-align: right;">
              <p><em>Start Time:</em></p>
            </div>
            <div class="col-sm-10" style="text-align: left;">
              <p id="event-modal-start2"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2" style="text-align: right;">
              <p><em>End Time:</em></p>
            </div>
            <div class="col-sm-10" style="text-align: left;">
              <p id="event-modal-end2"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2" style="text-align: right;">
              <p><em>Location:</em></p>
            </div>
            <div class="col-sm-10" style="text-align: left;">
              <p id="event-modal-loc2"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2" style="text-align: right;">
              <p><em>Owner:</em></p>
            </div>
            <div class="col-sm-10" style="text-align: left;">
              <p id="event-modal-owner2"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2" style="text-align: right;">
              <p><em>Description:</em></p>
            </div>
            <div class="col-sm-10" style="text-align: left;">
              <p id="event-modal-desc2"></p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</body>
