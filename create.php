<?php 
  include('includes/init.inc.php'); // include the DOCTYPE and opening tags
?>
<title>RoomRez Home</title>

<?php 
  include('includes/head.inc.php'); // include global css, javascript, end the head and open the body
?>

  <div class="container-fluid bg-grey form">
    <h2 class="text-center">CREATE</h2>
    <form action="/action_page.php">
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="title" class="form-control" id="title">
      </div>
      <div class="form-group">
        <label for="start-time">Start Time:</label>
        <input type="time" class="form-control" id="start-time">
      </div>
      <div class="form-group">
        <label for="end-time">End Time:</label>
        <input type="time" class="form-control" id="end-time">
      </div>
      <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" class="form-control" id="date">
      </div>
      <div class="form-group">
        <label for="loc">Location:</label>
        <input type="location" class="form-control" id="location">
      </div>
      <div class="form-group">
        <label for="desc">Description:</label>
        <textarea class="form-control" id="description" name="description" placeholder="Description" rows="5"></textarea>
      </div>

      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>

</body>
