<?php 
  include('includes/init.inc.php'); // include the DOCTYPE and opening tags
?>
<title>RPI Events</title>

<?php 
  include('includes/head.inc.php'); // include global css, javascript, end the head and open the body
?>

<!-- <script type="text/javascript" src="lab4.js"></script> -->
</head>

<?php 
  include('includes/nav.inc.php'); // include global css, javascript, end the head and open the body
?>

  <div id="my-events" class="container-fluid text-center event-table page">
    <h2>My Events</h2>
    <a class="btn btn-primary" href="create.php">Create</a>
    <!-- <button type="button" class="btn btn-primary">Create</button> -->
    <!-- <h4>Events Created by You</h4> -->
    <br><br><br>
    <div class="row">
      <div class="col-sm-4">
        <h4>Event 1</h4>
        <p>Where: Student Union 3602</p>
        <p>When: Tues, Nov 9</p>
        <button type="button" class="btn btn-info">Edit</button>
        <button type="button" class="btn" data-toggle="modal" data-target="#eventModal1">View</button>
      </div>
      <div class="col-sm-4">
        <h4>Event 2</h4>
        <p>Where: Student Union 3602</p>
        <p>When: Tues, Nov 9</p>
        <button type="button" class="btn btn-info">Edit</button>
        <button type="button" class="btn" data-toggle="modal" data-target="#eventModal1">View</button>
      </div>
      <div class="col-sm-4">
        <h4>Event 3</h4>
        <p>Where: Student Union 3602</p>
        <p>When: Tues, Nov 15</p>
        <button type="button" class="btn btn-info">Edit</button>
        <button type="button" class="btn" data-toggle="modal" data-target="#eventModal1">View</button>
      </div>
    </div>
    <br><br>
    <div class="row">
      <div class="col-sm-4">
        <h4>Event 4</h4>
        <p>Where: Student Union 3602</p>
        <p>When: Tues, Nov 23</p>
        <button type="button" class="btn btn-info">Edit</button>
        <button type="button" class="btn" data-toggle="modal" data-target="#eventModal1">View</button>
      </div>
      <div class="col-sm-4">
        <h4>Event 5</h4>
        <p>Where: Student Union 3602</p>
        <p>When: Tues, Dec 3</p>
        <button type="button" class="btn btn-info">Edit</button>
        <button type="button" class="btn" data-toggle="modal" data-target="#eventModal1">View</button>
      </div>
      <div class="col-sm-4">
        <h4>Event 6</h4>
        <p>Where: Student Union 3602</p>
        <p>When: Tues, Dec 3</p>
        <button type="button" class="btn btn-info">Edit</button>
        <button type="button" class="btn" data-toggle="modal" data-target="#eventModal1">View</button>
      </div>
    </div>
    <br><br>
    <div class="row">
      <div class="col-sm-4">
        <h4>Event 4</h4>
        <p>Where: Student Union 3602</p>
        <p>When: Tues, Dec 5</p>
        <button type="button" class="btn btn-info">Edit</button>
        <button type="button" class="btn" data-toggle="modal" data-target="#eventModal1">View</button>
      </div>
      <div class="col-sm-4">
        <h4>Event 5</h4>
        <p>Where: Student Union 3602</p>
        <p>When: Tues, Dec 8</p>
        <button type="button" class="btn btn-info">Edit</button>
        <button type="button" class="btn" data-toggle="modal" data-target="#eventModal1">View</button>
      </div>
      <div class="col-sm-4">
        <h4>Event 6</h4>
        <p>Where: Student Union 3602</p>
        <p>When: Tues, Dec 9</p>
        <button type="button" class="btn btn-info">Edit</button>
        <button type="button" class="btn" data-toggle="modal" data-target="#eventModal1">View</button>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="eventModal1" class="modal fade" role="dialog">
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
          <button type="button" class="btn btn-danger">Delete</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</body>
