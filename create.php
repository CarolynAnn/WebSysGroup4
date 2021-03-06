<?php
  include('includes/init.inc.php'); // include the DOCTYPE and opening tags
?>
<title>RPI Events</title>

<?php
  include('includes/head.inc.php'); // include global css, javascript, end the head and open the body
?>

</head>

<?php
  include('includes/nav2.inc.php'); // include navigation bar
?>
<?php

  // Handle event creation
  if (isset($_POST['createSubmit'])) {

    // grab all content from form
    $title = isset( $_POST['title'] ) ? make_safe($_POST['title']) : '';
    $start = isset( $_POST['start-time'] ) ? make_safe($_POST['start-time']) : '';
    $end = isset( $_POST['end-time'] ) ? make_safe($_POST['end-time']) : '';
    $date = isset( $_POST['date'] ) ? make_safe($_POST['date']) : '';
    $loc = isset( $_POST['location'] ) ? make_safe($_POST['location']) : '';
    $desc = isset( $_POST['description'] ) ? make_safe($_POST['description']) : '';
    $userID = $_SESSION['userID'];
    $query = $dbcon->query("SELECT * FROM `users` WHERE `userID` = $userID");
    $user = $query->fetch(PDO::FETCH_ASSOC);
    $email = $user['email'];

    // make sure all form entries are filled in 
    if (!$title || !$start || !$end || !$date || !$loc || !$desc){
      echo "<script>alert('Empty field');</script>";
    }else{

      // validate date and time
      if($date < date("Y-m-d")){
         echo "<script>alert('The date you entered already passed!');</script>";
      }
      else if ($date == date("Y-m-d")) {
        if($start <= date('H:i')){
           echo "<script>alert('The start time you entered already passed!');</script>";
        }
        else if($end <= $start){
          echo "<script>alert('The end time occurs before the start time!');</script>";
        }
      }
      else {
        if($end <= $start){
          echo "<script>alert('The end time occurs before the start time!');</script>";
        }
        else {

          // insert successful event into database
          echo "<script>alert('success');</script>";
          $dbcon->exec("INSERT INTO `events` (`title`, `date`, `start`, `end`, `location`, `description`, `owner`) VALUES ('$title', '$date', '$start', '$end', '$loc', '$desc', '$email')");
          header('Location: my_events.php');
      }
     }
    }

  }

?>

  <!-- Create Event Page -->

  <!-- Form for creating an event -->
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
