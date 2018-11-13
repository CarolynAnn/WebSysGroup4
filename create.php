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
  include('includes/nav2.inc.php'); // include global css, javascript, end the head and open the body
?>
<?php
  
  // Handle event creation
  if (isset($_POST['createSubmit'])) {

    $title = isset( $_POST['title'] ) ? make_safe($_POST['title']) : '';
    $start = isset( $_POST['start-time'] ) ? make_safe($_POST['start-time']) : '';
    $end = isset( $_POST['end-time'] ) ? make_safe($_POST['end-time']) : '';
    $date = isset( $_POST['date'] ) ? make_safe($_POST['date']) : '';
    $loc = isset( $_POST['location'] ) ? make_safe($_POST['location']) : '';
    $desc = isset( $_POST['description'] ) ? make_safe($_POST['description']) : '';
    if (!$title || !$start || !$end || !$date || !$loc || !$desc){
      echo "<script>alert('Empty field');</script>";
    }else{
       echo "<script>alert('success');</script>";
       $dbcon->exec("INSERT INTO `events` (`title`, `date`, `start`, `end`, `location`, `description`, `owner`) VALUES ('$title', '$date', '$start', '$end', '$loc', '$desc', " . $_SESSION['userID'] . ")");
       
       header('Location: my_events.php');
    }

  }

?>

  <div class="container-fluid bg-grey form">
    <h2 class="text-center">Create</h2>
    <form name="create" method="POST" action="">
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="title" class="form-control" id="title" name="title">
      </div>
      <div class="form-group">
        <label for="start-time">Start Time <em>(Last Value for AM/PM)</em>:</label>
        <input type="time" class="form-control" id="start-time" name="start-time">
      </div>
      <div class="form-group">
        <label for="end-time">End Time <em>(Last Value for AM/PM)</em>:</label>
        <input type="time" class="form-control" id="end-time" name="end-time">
      </div>
      <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" class="form-control" id="date" name="date">
      </div>
      <div class="form-group">
        <label for="loc">Location:</label>
        <input type="location" class="form-control" id="location" name="location">
      </div>
      <div class="form-group">
        <label for="desc">Description:</label>
        <textarea class="form-control" id="description" name="description" placeholder="Description" rows="5"></textarea>
      </div>

      <button type="submit" class="btn btn-default" name="createSubmit">Submit</button>
    </form>
  </div>

</body>




