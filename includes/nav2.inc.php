
  	<nav class="navbar navbar-default navbar-fixed-top">
	    <div class="container">
	      <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span> 
	        </button>
	        <a class="navbar-brand" href="index.php">RPI Events</a>
	      </div>
	      <div class="collapse navbar-collapse" id="myNavbar">
	        <ul class="nav navbar-nav navbar-right">
	          <li><a href="index.php">HOME</a></li>

	          <?php
				if(isset($_SESSION['status']) && $_SESSION['status'] == 'authorized') {
					$query = $dbcon->query("SELECT * FROM `users` WHERE userID = " . $_SESSION['userID']);
					$user = $query->fetch(PDO::FETCH_ASSOC);
					echo "<li><a href=\"profile.php\">PROFILE</a></li>"; 
	          		echo "<li><a href=\"my_events.php\">MY EVENTS</a></li>";
	          		echo "<li><a href=\"saved.php\">SAVED</a></li>";
					echo "<li><a href = \"index.php?status=logout\">LOGOUT</a></li>"; 
					echo "<li id=\"welcome\">Welcome, " . $user['firstName'] . "</li>";
				}
				else{
					echo "<li><a href = \"login.php\">LOGIN</a></li>"; 
				}
			  ?>
	        </ul>
	      </div>
	    </div>
	  </nav>

