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
  include('titlehead.php');
  include('../dbcon.php');

  $sid = $_GET['sid'];

  $sql = "SELECT * FROM `student` WHERE `id`='$sid'";
  $run = mysqli_query($con,$sql);

  $data = mysqli_fetch_assoc($run);
?>

<!-- Update Form -->
<!-- enctype="multipart/form-data" is used for storing images -->
<!-- Form for updating student details -->
<form action="updatedata.php" method="post" enctype="multipart/form-data">

  <table border="1" align="center" width="30%" style="margin-top:20px;">
    <tr>
      <th>Roll No.</th>
      <td> <input type="text" name="rollno" value=<?php echo $data['rollno']; ?> required> </td>
    </tr>
    <tr>
      <th>Full Name</th>
      <td> <input type="text" name="name" value=<?php echo $data['name']; ?> required> </td>
    </tr>
    <tr>
      <th>City</th>
      <td> <input type="text" name="city" value=<?php echo $data['city']; ?> required> </td>
    </tr>
    <tr>
      <th>Parents Contact No.</th>
      <td> <input type="text" name="pcon" value=<?php echo $data['pcont']; ?> required> </td>
    </tr>
    <tr>
      <th>Standard</th>
      <td> <input type="number" name="std" value=<?php echo $data['standard']; ?> required> </td>
    </tr>
    <tr>
      <th>Image</th>
      <td> <input type="file" name="simg" required> </td>
    </tr>

    <tr>

      <td colspan="2" align="center">
        <input type="hidden" name="sid" value="<?php echo $data['id']; ?>">
        <input type="submit" name="submit" value="Submit"> </td>
    </tr>

  </table>

</form>
