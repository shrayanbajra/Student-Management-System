<?php
  //Starting session
  session_start();

  //If session id is set
  if (isset($_SESSION['uid'])) {
    echo "";
  }else {
    //If session is not stored then redireting to login.php for loggin in once again
    header('location: ../login.php');
  }

?>

<?php
  include('header.php');
?>

  <div class="admintitle" align="center">
    <h4> <a href="logout.php" style="float:right; margin-right:30px; color:#fff; font-size:20px;"> Log out </a> </h4>
    <h1>Welcome to Admin Dashboard</h1>
  </div>

  <!-- Admin Dashboard -->
  <div class="dashboard">
    <table style="width:50%;" align="center">

      <!-- Options for admin to add, update and delete -->
      <tr>
        <td>1. </td> <td> <a href="addstudent.php"> Insert Student Detail </a> </td>
      </tr>

      <tr>
        <td>2. </td> <td> <a href="updatestudent.php"> Update Student Detail </a> </td>
      </tr>

      <tr>
        <td>3. </td> <td> <a href="deletestudent.php"> Delete Student Detail </a> </td>
      </tr>

    </table>
  </div>

  </body>
</html>
