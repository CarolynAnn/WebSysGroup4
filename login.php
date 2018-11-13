<?php 
  include('includes/init.inc.php'); // include the DOCTYPE and opening tags
?>
<title>RPI Events</title>

<?php 
  include('includes/head.inc.php'); // include global css, javascript, end the head and open the body
?>

<?php 
  include('includes/nav2.inc.php'); // include global css, javascript, end the head and open the body
?>

  <div class="form">
    <form name="login" action="" method="POST">
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="password">
      </div>
      <button type="submit" class="btn btn-primary" name="loginSubmit">Log In</button>
    </form>
      <br>
      <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#accountModal">Create Account</button>
  </div>


  <!-- Modal -->
  <div id="accountModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Account</h4>
        </div>
        <div class="modal-body">
          <div>
            <form action="" method="POST">
              <div class="form-group">
                <label for="name">First Name:</label>
                <input type="name" class="form-control" id="login-fname" name="firstName">
              </div>
              <div class="form-group">
                <label for="name">Last Name:</label>
                <input type="name" class="form-control" id="login-lname" name="lastName">
              </div>
              <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="login-email" name="email">
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="login-pwd" name="password">
              </div>
              <div class="form-group">
                <label for="cpwd">Confirm Password:</label>
                <input type="password" class="form-control" id="login-cpwd" name="passwordc">
              </div>
              <button type="submit" class="btn btn-default" name="registerSubmit">Submit</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>

</body>