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
  // Handle event editing
  if (isset($_POST['createSubmit'])) {
    //store $_POST data into more usable form.
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

    //error checking below
    if (!$title || !$start || !$end || !$date || !$loc || !$desc){
      echo "<script>alert('Empty field');</script>";
    }else{
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
          echo "<script>alert('success');</script>";
          $EvID = $_GET['id'];
          $dbcon->exec("UPDATE `events` SET `title`='$title',`date`='$date',`start`='$start',`end`='$end', `location`='$loc', `description`='$desc', `owner`='$email' WHERE `id` = '$EvID'");
          header('Location: my_events.php');
      }
     }
    }
  }

?>

<!-- Edit Your Event Page -->

  <div class="container-fluid bg-grey form">
    <h2 class="text-center">Edit Event</h2>
    <?php
      //Code below preloads the data event into the page so you dont have to
      //Change everything.
    	$eventID = $_GET['id'];
    	global $dbcon;
    	$query = $dbcon->query("SELECT * FROM `events` WHERE `id` = '$eventID;'");
  		$event = $query->fetch(PDO::FETCH_ASSOC);
  		$title = $event['title'];
  		$start = $event['start'];
  		$end = $event['end'];
  		$date = $event['date'];
  		$loc = $event['location'];
  		$desc = $event['description'];
    ?>
    <form name="create" method="POST" action="">
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="title" class="form-control" id="title" name="title" value ="<?php echo $title; ?>">
      </div>
      <div class="form-group">
        <label for="start-time">Start Time <em>(Last Value for AM/PM)</em>:</label>
        <input type="time" class="form-control" id="start-time" name="start-time" value ="<?php echo $start; ?>">
      </div>
      <div class="form-group">
        <label for="end-time">End Time <em>(Last Value for AM/PM)</em>:</label>
        <input type="time" class="form-control" id="end-time" name="end-time" value ="<?php echo $end; ?>">
      </div>
      <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" class="form-control" id="date" name="date" value ="<?php echo $date; ?>">
      </div>
      <div class="form-group">
        <label for="loc">Location:</label>
        <input type="location" class="form-control" id="location" name="location" value ="<?php echo $loc; ?>">
      </div>
      <div class="form-group">
        <label for="desc">Description:</label>
        <textarea class="form-control" id="description" name="description"  rows="5"> <?php echo $desc; ?> </textarea>
      </div>

      <button type="submit" class="btn btn-default" name="createSubmit">Change</button>
    </form>
  </div>

</body>
