<?php 
  include('includes/init.inc.php'); // include the DOCTYPE and opening tags
?>
<title>RPI Events</title>

<?php 
  include('includes/head.inc.php'); // include global css, javascript, end the head and open the body
?>

  <div class="form">
    <form action="/action_page.php">
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
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
            <form action="/action_page.php">
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="name" class="form-control" id="name">
              </div>
              <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>

</body>