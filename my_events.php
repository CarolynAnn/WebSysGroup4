<?php
  include('includes/init.inc.php'); // include the DOCTYPE and opening tags
?>
<title>RPI Events</title>

<?php
  include('includes/head.inc.php'); // include global css, javascript, end the head and open the body
?>

<script type="text/javascript" src="resources/scripts/my_events.js"></script>
</head>

<?php
  include('includes/nav2.inc.php'); // include navigation bar
?>

<?php
    //Check to see if EditEvent $_POST was set
    if ( isset($_POST['EditEvent']) ) {
      //if it is and value is not -1
      if( $_POST['EditEvent'] != "-1" ) {
        //change page to the edit page with Event ID in $_GET format.
        $EID = $_POST['EditEvent'];
        header("Location: EditEvent.php?id=$EID");
        $_POST['EditEvent'] = "-1";
      }
    }
    //If delete is selected
    if ( isset($_POST['delete']) ) {
      //if delete is not -1
      if( $_POST['delete'] != "-1" ) {
        //delete all entries that involve Event ID on the attendants page
        //then delete the event.
        $EID2 = $_POST['delete'];
        $dbcon->exec("DELETE FROM `attendants` WHERE `eid` = '$EID2'");
        $dbcon->exec("DELETE FROM `events` WHERE `id` = '$EID2'");
        $_POST['delete'] = "-1";
      }
    }
?>

  <!-- "My Events" Page -->

  <div id="my-events" class="container-fluid text-center event-table page">
    <h2>My Events</h2>
    <a class="btn btn-primary" href="create.php">Create</a>
    <br><br><br>
    <h4 id="loading-my-events">Loading...</h4>
  </div>

  <!-- Modal -->
  <div id="eventModal-MyEvents" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 id="event-modal-title1" class="modal-title">Event Title</h4>
        </div>
        <div id="event-modal-body1" class="modal-body">
          <div class="row">
            <div class="col-sm-2" style="text-align: right;">
              <p><em>Date:</em></p>
            </div>
            <div class="col-sm-10" style="text-align: left;">
              <p id="event-modal-date1"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2" style="text-align: right;">
              <p><em>Start Time:</em></p>
            </div>
            <div class="col-sm-10" style="text-align: left;">
              <p id="event-modal-start1"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2" style="text-align: right;">
              <p><em>End Time:</em></p>
            </div>
            <div class="col-sm-10" style="text-align: left;">
              <p id="event-modal-end1"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2" style="text-align: right;">
              <p><em>Location:</em></p>
            </div>
            <div class="col-sm-10" style="text-align: left;">
              <p id="event-modal-loc1"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2" style="text-align: right;">
              <p><em>Owner:</em></p>
            </div>
            <div class="col-sm-10" style="text-align: left;">
              <p id="event-modal-owner1"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2" style="text-align: right;">
              <p><em>Description:</em></p>
            </div>
            <div class="col-sm-10" style="text-align: left;">
              <p id="event-modal-desc1"></p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <form method="post">
            <button type="submit" name="delete" id="DeleteButton" class="btn btn-danger">Delete</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
