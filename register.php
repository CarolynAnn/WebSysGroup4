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

	<div id="create">
		<h1>Registration</h1>
		<form name="registration" action="" method="POST">
			<table id="registration">
				<tr>
					<td><input type="text" name="firstName" placeholder="First Name"></td>
				</tr>
				<tr>
					<td><input type="text" name="lastName" placeholder="Last Name"></td>
				</tr>
				<tr>
					<td><input type="email" name="email" placeholder="Email Address"></td>
				</tr>
				<tr>
					<td><input type="password" name="password" placeholder="Password"></td>
				</tr>
				<tr>
					<td><input type="password" name="passwordc" placeholder="Confirm Password"></td>
				</tr>
				<tr>
					<td><input type="submit" name="registerSubmit" value="Register" class="submit"></td>
				</tr>
			</table>
		</form>
	</div>
		
