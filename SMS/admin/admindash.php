<?php

  //Starting session .. If not logged in then you need to go through login page otherwise dashboard is displayed
  session_start();

  //Assigning id to a session id
  if (isset($_SESSION['uid'])) {
    //if session is not destroyed session id is displayed
    //echo $_SESSION['uid'];
  }else {
    //else (i.e. if session is destroyed) no session ID is displayed but it is redirected to the login page for login as you cannot log into dashboard without going through the login page
    header('location:../login.php');
  }

?>

<?php include('header.php'); ?>
  <!--Title-->
  <div class="admintitle" align = "center">
    <h4> <a href="logout.php" style="float: right; margin-right: 30px; color: #fff; font-size:20px;"> LogOut </a> </h4>
    <h1> Welcome to Admin Dashboard </h1>
  </div>

  <!--Dashboard for inserting, updating and deleting student data-->
  <div class="dashboard">
    <table style="width: 50%;" align="center">
      <tr>
        <td>1.</td><td> <a href="addstudent.php"> Insert Student Details </a> </td>
      </tr>
      <tr>
        <td>2.</td><td> <a href="updatestudent.php"> Update Student Details </a> </td>
      </tr>
      <tr>
        <td>3.</td><td> <a href="deletestudent.php"> Delete Student Details </a> </td>
      </tr>
    </table>
  </div>

<?php include('footer.php'); ?>
