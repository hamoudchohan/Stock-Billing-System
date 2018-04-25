<?php

include('database_connection.php');

if(isset($_SESSION['type'])){

  header("location:index.php");

}

$message = '';

if(isset($_POST["login"])){
  $query = "
    SELECT * FROM user_details WHERE user_email = :user_email
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
    array(
      'user_email' => $_POST["user_email"]
    )
    );

    $count = $statement->rowCount();
   
    if($count > 0){
      
      $result  = $statement->fetchAll();
      
      foreach($result as $row){
        if(password_verify($_POST["user_password"],$row['user_password'])){

          if($row['user_status'] == 'Active'){

            $_SESSION['type'] = $row['user_type'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['user_name'];

            header("location:index.php");


          } else {

            $message = "<label>Your Account is disabled.</label>";

          }

        } else {

          $message = "<label>Wrong password</label>";

        }
      }
    } else {
     
      $message = "<label>Wrong Email Address</label>";
   
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>System | Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h2 class="text-center">Stock & Billing System</h2>
    <br>
    <div class="card">
      <div class="card-header bg-info text-white">Login</div>
      <div class="card-body">
        <form action="" method="POST">
          <?= $message; ?>
          <div class="form-group">
            <label for="user_email">User Email</label>
            <input type="text" name="user_email" id="user_email" class="form-control" required>
          </div>
           <div class="form-group">
            <label for="user_password">Password</label>
            <input type="password" name="user_password" id="user_password" class="form-control" required>
          </div>
          <div class="forn-group">
            <input type="submit" value="Login" name="login" class="btn btn-info">
          </div>
        </form>
      </div>
    </div>
  </div>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>