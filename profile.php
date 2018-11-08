<?php 
  include('includes/init.inc.php'); // include the DOCTYPE and opening tags
?>
<title>RPI Events</title>

<?php 
  include('includes/head.inc.php'); // include global css, javascript, end the head and open the body
?>

<?php 
  include('includes/nav.inc.php'); // include global css, javascript, end the head and open the body
?>

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
			<a class="btn btn-primary" href="editProf.php">Edit</a>
		</div>
	</div>	
</div>

</body>
