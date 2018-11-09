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


  <div class="jumbotron text-center">
    <h1>RPI Events</h1> 
    <p>Bringing the community together by sharing events</p> 
    <form class="form-inline">
      <div class="input-group">
        <input type="email" class="form-control" size="50" placeholder="Search" required>
        <div class="input-group-btn">
          <button type="button" class="btn btn-danger">Search</button>
        </div>
      </div>
    </form>
  </div>

  <div class="container-fluid text-center event-table" id="event-holder">
    <h2>Events</h2>
    <br>
    <div class="col-sm-4">
      <h4>Event 5</h4>
      <p>Where: Student Union 3602</p>
      <p>When: Tues, Dec 3</p>
      <button type="button" class="btn btn-info">Save</button>
      <button type="button" class="btn" data-toggle="modal" data-target="#eventModal1">View</button>
    </div>
    <div class="col-sm-4">
      <h4>Event 5</h4>
      <p>Where: Student Union 3602</p>
      <p>When: Tues, Dec 3</p>
      <button type="button" class="btn btn-info">Save</button>
      <button type="button" class="btn" data-toggle="modal" data-target="#eventModal1">View</button>
    </div>
    <div class="col-sm-4">
      <h4>Event 5</h4>
      <p>Where: Student Union 3602</p>
      <p>When: Tues, Dec 3</p>
      <button type="button" class="btn btn-info">Save</button>
      <button type="button" class="btn" data-toggle="modal" data-target="#eventModal1">View</button>
    </div>
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
          <button type="button" class="btn btn-success">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

</body>
