<?php
//user.php

include('database_connection.php');

if(!isset($_SESSION["type"]))
{
	header('location:login.php');
}

if($_SESSION["type"] != 'master')
{
	header("location:index.php");
}

include('header.php');


?>

<span id="alert_action" class="mt-5"></span>
<div class="row">
  <div class="col-lg-12">
  
    <div class="card mt-5">
    
      <div class="card-header">
      <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
            <h3>User List</h3>
          </div>
        
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
          
            <button type="button" name="add" id="add_button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#userModal">
              Add
            </button>
       
        </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-12 table table-responsive">
            <table id="user_data" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Name</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- User Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form method="post" id="user_form">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="name">Enter User Name</label>
          <input type="text" name="user_name" id="user_name" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="email">Enter User Email</label>
          <input type="email" name="user_email" id="user_email" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="password">Enter Password</label>
          <input type="password" name="user_password" id="user_password" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="user_id" id="user_id">
        <input type="hidden" name="btn_action" id="btn_action">
        <input type="submit" value="Add" name="action" class="btn btn-info" id="action">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>
<script src="js/user.js"></script>
<?php  include('footer.php'); ?>