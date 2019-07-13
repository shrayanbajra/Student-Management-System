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
?>

<!-- enctype="multipart/form-data" is used for storing images -->
<!-- Form for adding student details -->
<form action="addstudent.php" method="post" enctype="multipart/form-data">

  <table border="1" align="center" width="30%" style="margin-top:20px;">
    <tr>
      <th>Roll No.</th>
      <td> <input type="text" name="rollno" placeholder="Enter Roll no." required> </td>
    </tr>
    <tr>
      <th>Full Name</th>
      <td> <input type="text" name="name" placeholder="Enter Full Name" required> </td>
    </tr>
    <tr>
      <th>City</th>
      <td> <input type="text" name="city" placeholder="Enter City" required> </td>
    </tr>
    <tr>
      <th>Parents Contact No.</th>
      <td> <input type="text" name="pcon" placeholder="Enter Contact No." required> </td>
    </tr>
    <tr>
      <th>Standard</th>
      <td> <input type="number" name="std" placeholder="Enter Standard" required> </td>
    </tr>
    <tr>
      <th>Image</th>
      <td> <input type="file" name="simg" required> </td>
    </tr>

    <tr>
      <td colspan="2" align="center"> <input type="submit" name="submit" value="Submit"> </td>
    </tr>

  </table>

</form>

</body>
</html>

<?php
  // if submit is pressed
  if (isset($_POST['submit'])) {
    // Connecting database
    include('../dbcon.php');

    // Taking data from form and storing it in variables
    $rollno = $_POST['rollno'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $pcon = $_POST['pcon'];
    $std = $_POST['std'];
    $imagename = $_FILES['simg']['name'];
    $tempname = $_FILES['simg']['tmp_name'];

    move_uploaded_file($tempname, "../dataimg/$imagename");

    $qry = "INSERT INTO `student`(`rollno`, `name`, `city`, `pcont`, `standard`, `image`) VALUES ('$rollno','$name','$city','$pcon','$std','$imagename') ";
    $run = mysqli_query($con,$qry);

    if ($run == true) {
      ?>
        <script>
          alert('Data Inserted Successfully');
        </script>
      <?php
    }

  }
?>
