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
<?php include('titlehead.php'); ?>

  <form action="addstudent.php" method="post" enctype="multipart/form-data">
    <table align = "center" border="1">
      <tr>
        <td> Roll No. </td>
        <td> <input type="text" name="rollno" placeholder="Enter Your Roll no." required> </td>
      </tr>
      <tr>
        <td> Full Name </td>
        <td> <input type="text" name="name" placeholder="Enter Full Name" required> </td>
      </tr>
      <tr>
        <td> City </td>
        <td> <input type="text" name="city" placeholder="Enter City" required> </td>
      </tr>
      <tr>
        <td> Parents' Contact No. </td>
        <td> <input type="text" name="pcont" placeholder="Enter Contact no." required> </td>
      </tr>
      <tr>
        <td> Standard </td>
        <td> <input type="number" name="standard" placeholder="Enter Standard" required> </td>
      </tr>
      <tr>
        <td> Image </td>
        <td> <input type="file" name="image" required> </td>
      </tr>
      <tr>
        <td colspan="2" align = "center"> <input type="submit" name="submit" value="Submit"> </td>
      </tr>
    </table>
  </form>

<?php include('footer.php'); ?>

<?php

  if (isset($_POST['submit'])) {
    include('../dbcon.php');

    $rollno = $_POST['rollno'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $pcon = $_POST['pcont'];
    $std = $_POST['standard'];
    $imagename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];

    //Uploading file in the server
    //only storing name at first
    //move_uploaded_file(source,destination);
    move_uploaded_file($tempname,"../dataimg/$imagename");

    $qry = "INSERT INTO `student`(`rollno`, `name`, `city`, `pcont`, `standard`,`image`) VALUES ('$rollno','$name','$city','$pcon','$std','$imagename')";

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
