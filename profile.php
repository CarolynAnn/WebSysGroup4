<?php 
  include('includes/init.inc.php'); // include the DOCTYPE and opening tags
?>
<title>RPI Events</title>

<?php 
  include('includes/head.inc.php'); // include global css, javascript, end the head and open the body
?>

<?php 
  include('includes/nav2.inc.php'); // include navigation bar
?>

<!-- My Profile Page -->

<div id="my-profile" class="container-fluid text-center page">
	<h2>My Profile</h2>
	<br>
	<div class="row">
		<div class="col-sm-6" style="text-align: right;">
			<p><em>Name:</em></p>
		</div>
		<div class="col-sm-4" style="text-align: left;">
			<?php
				if(isset($_SESSION['status']) && $_SESSION['status'] == 'authorized'){
					
					// load user name
					$userID = $_SESSION['userID']; 
					$query = $dbcon->query("SELECT firstName, lastName FROM users WHERE userID = $userID");
					$name = $query->fetch(PDO::FETCH_ASSOC);
					echo "<p id=\"profile-name\">" . $name['firstName'] . ' ' . $name['lastName'] . "</p>";

				}
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6" style="text-align: right;">
			<p><em>Email:</em></p>
		</div>
		<div class="col-sm-4" style="text-align: left;">
			<?php
				if(isset($_SESSION['status']) && $_SESSION['status'] == 'authorized'){
					
					// load user name
					$userID = $_SESSION['userID']; 
					$query = $dbcon->query("SELECT email FROM users WHERE userID = $userID");
					$name = $query->fetch(PDO::FETCH_ASSOC);
					echo "<p id=\"profile-email\">" . $name['email'] . "</p>";

				}
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6" style="text-align: right;">
			<p><em>Password:</em></p>
		</div>
		<div class="col-sm-4" style="text-align: left;">
			<p id="profile-pwd"><em>Hidden</em></p>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-12">
			<button type="button" class="btn" data-toggle="modal" data-target="#profileModal">Edit</button>
		</div>
	</div>	
	<div id="editError"></div> 
</div>

  <!-- "Edit" Modal -->
  <div id="profileModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Profile</h4>
        </div>
        <div class="modal-body">
          <div>
          	<?php

          		// grab the user information to prepopulate the form
          		$userID = $_SESSION['userID']; 
				$query = $dbcon->query("SELECT * FROM users WHERE userID = $userID");
				$user = $query->fetch(PDO::FETCH_ASSOC); 
				$first = $user['firstName'];
				$last = $user['lastName'];
				$email = $user['email'];

          	?>
            <form action="" method="POST">
              <div class="form-group">
                <label for="name">First Name:</label>
                <input type="name" class="form-control" id="login-fname" name="firstName" value="<?php echo $first;?>"/>
              </div>
              <div class="form-group">
                <label for="name">Last Name:</label>
                <input type="name" class="form-control" id="login-lname" name="lastName" value="<?php echo $last;?>"/>
              </div>
              <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="login-email" name="email" value="<?php echo $email;?>"/>
              </div>
              <div class="form-group">
                <label for="pwd">Old Password:</label>
                <input type="password" class="form-control" id="login-opwd" name="opassword">
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="login-npwd" name="npassword">
              </div>
              <div class="form-group">
                <label for="cpwd">Confirm Password:</label>
                <input type="password" class="form-control" id="login-cpwd" name="passwordc">
              </div>
              <form action="" method="POST">
	              <button type="submit" class="btn btn-default" name="editProfile">Save Changes</button>
	          </form>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>

</body>
