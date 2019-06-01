<!--
  Starting session so that if in one tab the user
  is already logged in then in other tab it must
  automatically redirect to admindash.php instead of
  again showing up the login page
-->

<?php
  session_start();
  //kunai ID session ma involve vaye paxi matrai admindash.php ma redirect garney
  if(isset($_SESSION['uid'])){
    header('location:admin/admindash.php');
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Admin Login </title>
  </head>
  <body>

    <h1 align = "center"> Admin Login </h1>
    <form action="login.php" method="post">
      <table align = "center">
        <tr>
          <td> Username </td>
          <td> <input type="text" name="uname" required> </td>
        </tr>
        <tr>
          <td> Password </td>
          <td> <input type="password" name="pass" required> </td>
        </tr>
        <tr>
          <td colspan="2" align = "center"> <input type="submit" name="login" value="Login"> </td>
        </tr>
      </table>
    </form>

  </body>
</html>

<?php
  //Connecting Database
  include('dbcon.php');

  //Verifying username and password
  if(isset($_POST['login'])){
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    //checking username and password
    $qry = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";

    //running query
    $run = mysqli_query($con,$qry);

    //Checking no. of rows .. kati ota row milyo vanera
    $row = mysqli_num_rows($run);

    //No row matching then displaying error
    if ($row < 1) {
      ?>
      <script> alert('Username and Password not matching !!');
      window.open('login.php','_self'); //redirect to login.php , _self -> this same page, itself
      </script>

      <?php
    }else {
      //data vanney variable ma $run ko array form ma data fetch garney
      $data = mysqli_fetch_assoc($run);

      //data bata ako unique key lai $id ma store garney so that we can track that specific account
      $id = $data['id'];

      //Assigning id to a session id
      $_SESSION['uid'] = $id;

      header('location:admin/admindash.php'); //Don't put spaces in location line
    }
  }
?>
