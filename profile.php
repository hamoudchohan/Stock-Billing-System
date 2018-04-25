<?php
  include('database_connection.php');

  if(!isset($_SESSION['type'])){
   header("location:login.php");
  }  

  $query = "
    SELECT * FROM user_details 
    WHERE user_id = '".$_SESSION["user_id"]."'
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();

  $name = '';
  $email = '';
  $user_id = '';

  foreach($result as $row){
    $name = $row['user_name'];
    $email = $row['user_email'];
  }

  include('header.php');

?>

<div class="card mt-5">
  <div class="card-header bg-info text-white">Edit Profile</div>
  <div class="card-body">
    <form action="" method="POST" id="edit_profile_form">
      <span id="message"></span>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="user_name" id="user_name" class="form-control" value="<?= $name; ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="user_email" id="user_email" class="form-control" value="<?= $email; ?>" required>
      </div>
      <hr>
      <label>Leave Password black if you dont want to change!</label>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="user_new_password" id="user_new_password" class="form-control">
      </div>
      <div class="form-group">
        <label for="re-enterPass">Re-enter Password</label>
        <input type="password" name="user_re_enter_password" id="user_re_enter_password" class="form-control">
        <span id="error_password"></span>
      </div>
      <div class="form-group">
        <input type="submit" name="edit_prfile" value="Edit" class="btn btn-info" id="edit_prfile">
      </div>
    </form>
  </div>

</div>
<script src="js/profile.js"></script>

