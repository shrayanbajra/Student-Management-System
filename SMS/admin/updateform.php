<?php

  //Starting session .. If not logged in then you need to go through login page otherwise addstudent.php is displayed
  session_start();

  //Assigning id to a session id
  if (isset($_SESSION['uid'])) {
    //if session is not destroyed session id is displayed
    //echo $_SESSION['uid'];
  }else {
    //else (i.e. if session is destroyed) no session ID is displayed but it is redirected to the login page for login as you cannot log into dashboard/insertstudent.php without going through the login page
    header('location:../login.php');
  }

?>

<?php include('header.php'); ?>

<!--Dashboard title-->
<?php include('titlehead.php');
      include('../dbcon.php');

      $sid = $_GET['sid'];

      $sql = "SELECT * FROM `student` WHERE `id` = '$sid'";

      $run = mysqli_query($con,$sql);

      $data = mysqli_fetch_assoc($run); ?>

<form action="updatedata.php" method="post" enctype="multipart/form-data">
  <table align = "center" border="1">
    <tr>
      <td> Roll No. </td>
      <td> <input type="text" name="rollno" value="<?php echo $data['rollno']; ?>"> </td>
    </tr>
    <tr>
      <td> Full Name </td>
      <td> <input type="text" name="name" value="<?php echo $data['name']; ?>"> </td>
    </tr>
    <tr>
      <td> City </td>
      <td> <input type="text" name="city" value="<?php echo $data['city']; ?>"> </td>
    </tr>
    <tr>
      <td> Parents' Contact No. </td>
      <td> <input type="text" name="pcont" value="<?php echo $data['pcont']; ?>"> </td>
    </tr>
    <tr>
      <td> Standard </td>
      <td> <input type="number" name="standard" value="<?php echo $data['standard']; ?>"> </td>
    </tr>
    <tr>
      <td> Image </td>
      <td> <input type="file" name="image" required> </td>
    </tr>
    <tr>
      <td colspan="2" align = "center">
        <input type="hidden" name="sid" value="<?php echo $data['id']; ?>">
        <input type="submit" name="submit" value="Submit"> </td>
    </tr>
  </table>
</form>

<?php include('footer.php'); ?>
