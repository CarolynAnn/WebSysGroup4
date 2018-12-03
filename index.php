<?php
  include('includes/init.inc.php'); // include the DOCTYPE and opening tags
?>
<title>RPI Events</title>

<?php
  include('includes/head.inc.php'); // include global css, javascript, end the head and open the body
?>

<script type="text/javascript" src="resources/scripts/index.js"></script>


<?php
  include('includes/nav.inc.php'); // include global css, javascript, end the head and open the body
?>

<?php

  // Handle event creation

  if (isset($_SESSION['userID'])) {
    $UID = $_SESSION['userID'];
    if (isset($_POST['EVENT_ID'])) {
      $EvID= isset( $_POST['EVENT_ID'] ) ? make_safe($_POST['EVENT_ID']) : '';
      $query = $dbcon->query("SELECT * FROM `users` WHERE `userID` = $UID");
      $user = $query->fetch(PDO::FETCH_ASSOC);
      $firstName = $user['firstName'];
      $lastName = $user['lastName'];
      $query = $dbcon->query("SELECT * FROM `attendants` WHERE `eid` = '$EvID' AND `uid`='$UID' ");
      if($query->rowCount() == 0) {
        $dbcon->exec("INSERT IGNORE INTO `attendants` (`eid`,`uid`) VALUES ('$EvID','$UID')");
      }
    }
  }


?>

  <div class="jumbotron text-center">
    <h1>RPI Events</h1>
    <p>Bringing the community together through shared events</p>
    <form class="form-inline">
      <div class="input-group">
        <form  method="get" action ="/index.php" id="search-form">
          <div class="btn-group">
          <select name="search-category" class="form-control">
            <option value="show-all">Search All</option>
            <option value="title">Title</option>
            <option value="date">Date (mm-dd)</option>
            <option value="start">Start Time</option>
            <option value="end">End Time</option>
            <option value="location">Location</option>
          </select>
          <input name ="search-bar" id="search-bar" type="text" class="form-control" size="50" placeholder="Search" required>
          <input name="search" id="search" value="Search" type="submit" onclick="isEmpty()" class="btn btn-danger">
          </div>
        </form> 
      </div>
    </form>
  </div>

  <div class="container-fluid text-center event-table" id="event-holder">
    <h2>Events</h2>
    <br>
    <h4 id="loading-home">Loading...</h4>
  </div>

  <!-- Modal -->
  <div id="eventModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 id="event-modal-title" class="modal-title">Event Title</h4>
        </div>
        <div id="event-modal-body" class="modal-body">
          <div class="row">
            <div class="col-sm-2" style="text-align: right;">
              <p><em>Date:</em></p>
            </div>
            <div class="col-sm-10" style="text-align: left;">
              <p id="event-modal-date"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2" style="text-align: right;">
              <p><em>Start Time:</em></p>
            </div>
            <div class="col-sm-10" style="text-align: left;">
              <p id="event-modal-start"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2" style="text-align: right;">
              <p><em>End Time:</em></p>
            </div>
            <div class="col-sm-10" style="text-align: left;">
              <p id="event-modal-end"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2" style="text-align: right;">
              <p><em>Location:</em></p>
            </div>
            <div class="col-sm-10" style="text-align: left;">
              <p id="event-modal-loc"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2" style="text-align: right;">
              <p><em>Owner:</em></p>
            </div>
            <div class="col-sm-10" style="text-align: left;">
              <p id="event-modal-owner"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2" style="text-align: right;">
              <p><em>Description:</em></p>
            </div>
            <div class="col-sm-10" style="text-align: left;">
              <p id="event-modal-desc"></p>
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
