<?php
session_start();

// Checking if admin has session or not (logged in)
// If already logged in then redirect to dashboard
// Else open login.php for logging in
if (isset($_SESSION['uid'])) {
  header('location:admin/admindash.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="css/login_style.css">
</head>

<body>

  <div style="float:left; margin-left: 150px; margin-top: 100px; color: #fff; font-size:20px;">
    <i class="fas fa-home"> <a href="index.php"> Home </a> </i>
  </div>

  <form action="login.php" method="post">

    <div class="login-box">
      <h1>Admin Login</h1>
      <div class="textbox">
        <i class="fas fa-user"></i>
        <input type="text" name="uname" placeholder="Username" required>
      </div>

      <div class="textbox">
        <i class="fas fa-lock"></i>
        <input type="password" name="pass" placeholder="Password" required>
      </div>

      <input type="submit" name="login" class="btn" value="Sign in">
    </div>

  </form>

</body>

</html>

<?php

// Connecting with database
include('dbcon.php');

// Using isset for checking if the submit button is pressed or not
if (isset($_POST['login'])) {
  $username = $_POST['uname'];
  $password = $_POST['pass'];

  // Query
  $qry = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";

  // Firing query $qry with database specified in $con
  $run = mysqli_query($con, $qry);

  // Outputs how many matching rows are there
  $row = mysqli_num_rows($run);

  // If matching rows is 0 or no match then redirecting login page
  if ($row < 1) {
?>

    <script>
      alert('Username or Password not match!!');
      window.open('login.php', '_self');
    </script>

<?php
  } else {
    // If there are matching data then data are retrieved in associative array
    $data = mysqli_fetch_assoc($run);

    // ID from matched row is retrieved and stored in $id for tracking the session of admin
    $id = $data['id'];

    // Starting session
    session_start();

    // Setting session id
    $_SESSION['uid'] = $id;

    // Redirecting to admin dashboard page
    header('location:admin/admindash.php');
  }
}

?>