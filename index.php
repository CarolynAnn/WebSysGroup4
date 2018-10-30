<?php 
  include('includes/init.inc.php'); // include the DOCTYPE and opening tags
?>
<title>RPI Events</title>

<?php 
  include('includes/head.inc.php'); // include global css, javascript, end the head and open the body
?>
  <div class="jumbotron text-center">
    <h1>rpi events</h1> 
    <p>We specialize in blablabla</p> 
    <form class="form-inline">
      <div class="input-group">
        <input type="email" class="form-control" size="50" placeholder="Search" required>
        <div class="input-group-btn">
          <button type="button" class="btn btn-danger">Search</button>
        </div>
      </div>
    </form>
  </div>

  <div class="container-fluid text-center event-table">
    <h2>Events</h2>
    <br>
    <div class="row">
      <div class="col-sm-4" id="event1">
        <h4>Event 1</h4>
        <p>Where: Student Union 3602</p>
        <p>When: 6-7pm, Tues, Nov 9</p>
        <button type="button" class="btn btn-success">Save</button>
        <button type="button" class="btn" data-toggle="modal" data-target="#eventModal">View</button>
      </div>
      <div class="col-sm-4" id="event2">
        <h4>Event 2</h4>
        <p>Where: Student Union 3602</p>
        <p>When: Tues, Nov 9</p>
        <button type="button" class="btn btn-success">Save</button>
        <button type="button" class="btn" data-toggle="modal" data-target="#eventModal">View</button>
      </div>
      <div class="col-sm-4" id="event3">
        <h4>Event 3</h4>
        <p>Where: Student Union 3602</p>
        <p>When: Tues, Nov 15</p>
        <button type="button" class="btn btn-success">Save</button>
        <button type="button" class="btn" data-toggle="modal" data-target="#eventModal">View</button>
      </div>
    </div>
    <br><br>
    <div class="row">
      <div class="col-sm-4" id="event4">
        <h4>Event 4</h4>
        <p>Where: Student Union 3602</p>
        <p>When: Tues, Nov 23</p>
        <button type="button" class="btn btn-success">Save</button>
        <button type="button" class="btn" data-toggle="modal" data-target="#eventModal">View</button>
      </div>
      <div class="col-sm-4" id="event5">
        <h4>Event 5</h4>
        <p>Where: Student Union 3602</p>
        <p>When: Tues, Dec 3</p>
        <button type="button" class="btn btn-success">Save</button>
        <button type="button" class="btn" data-toggle="modal" data-target="#eventModal">View</button>
      </div>
      <div class="col-sm-4" id="event6">
        <h4>Event 6</h4>
        <p>Where: Student Union 3602</p>
        <p>When: Tues, Dec 3</p>
        <button type="button" class="btn btn-success">Save</button>
        <button type="button" class="btn" data-toggle="modal" data-target="#eventModal">View</button>
      </div>
    </div>
    <br><br>
    <div class="row">
      <div class="col-sm-4" id="event7">
        <h4>Event 7</h4>
        <p>Where: Student Union 3602</p>
        <p>When: Tues, Dec 4</p>
        <button type="button" class="btn btn-success">Save</button>
        <button type="button" class="btn" data-toggle="modal" data-target="#eventModal">View</button>
      </div>
      <div class="col-sm-4" id="event8">
        <h4>Event 8</h4>
        <p>Where: Student Union 3602</p>
        <p>When: Tues, Dec 6</p>
        <button type="button" class="btn btn-success">Save</button>
        <button type="button" class="btn" data-toggle="modal" data-target="#eventModal">View</button>
      </div>
      <div class="col-sm-4" id="event9">
        <h4>Event 9</h4>
        <p>Where: Student Union 3602</p>
        <p>When: Tues, Dec 9</p>
        <button type="button" class="btn btn-success">Save</button>
        <button type="button" class="btn" data-toggle="modal" data-target="#eventModal">View</button>
      </div>
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
          <p><em>Date:</em></p><p id="event-date"></p>
          <p><em>Start Time:</em></p><p id="event-start"></p>
          <p><em>End Time:</em></p><p id="event-end"></p>          
          <p><em>Location:</em></p><p id="event-loc"></p>
          <p><em>Owner:</em></p><p id="event-owner"></p>
          <p><em>Number of Attendees:</em></p><p id="event-attendees"></p>
          <p><em>Description:</em></p><p id="event-desc"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

</body>
