	  <title>RPI Events</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <link rel = "stylesheet" type = "text/css" href = "resources/style/style.css" />
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	  </head>
	  <body>
  
 <?php

// Handle users logging in
if (isset($_POST['loginSubmit'])) {
    // Get input values from form
    $email = isset( $_POST['email'] ) ? make_safe($_POST['email']) : '';
    $password = isset( $_POST['password'] ) ? make_safe($_POST['password']) : '';

    // Check if fields are filled
    if (!$email || !$password) {
        echo "<script>console.log( 'Both an email and password are required' );</script>";
    } else {
        if (login($email, $password)) {
            echo "<script>console.log( 'Successfully logged in!' );</script>";
            header('Location: index.php');
        }
		else {
            echo "<script>console.log( 'Incorrect email or password' );</script>";
        }
    }
}

//Register a new user
if(isset($_POST['registerSubmit'])) {
    $firstName = isset( $_POST['firstName'] ) ? make_safe($_POST['firstName']) : '';
    $lastName = isset( $_POST['lastName'] ) ? make_safe($_POST['lastName']) : '';
    $email = isset( $_POST['email'] ) ? make_safe($_POST['email']) : '';
	$password = isset( $_POST['password'] ) ? make_safe($_POST['password']) : '';
    $passwordc = isset( $_POST['passwordc'] ) ? make_safe($_POST['passwordc']) : '';

    if (!$firstName || !$lastName || !$email || !$password) {
        echo "<script>alert( 'All fields must be filled in' );</script>";
    }
	else if (user_exists($email)) {
        echo "<script>alert( 'A user with that email already exists' );</script>";
    }
	else if ($password != $passwordc) {
        echo "<script>alert( 'Passwords must match' );</script>";
    }
	else {
        if (create_user($firstName, $lastName, $email, $password)) {
            if (login($email, $password)) {
                $_SESSION["state"] = "new_user";
                header('Location: index.php');
            }
        } else {
            echo "<script>alert( 'Woops! Something seems to have went wrong' );</script>";
        }
    }
}

//Log a User Out
if(isset($_GET['status']) && $_GET['status'] == 'logout') {
	logout();
}

?>


		
