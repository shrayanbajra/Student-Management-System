<?php
  session_start();

  if (isset($_SESSION['uid'])) { // Checking if session id is set
    echo "";
  }else {
    //If session is not stored then redirecting to login.php for loggin in once again
    header('location: ../login.php');
  }

?>

<?php
  include('header.php');
  include('titlehead.php');
?>

<!-- Form to search student details -->
<table align="center">
  <form action="deletestudent.php" method="post">
    <tr>
      <th>Enter Standard</th>
      <td><input type="number" name="standard" placeholder="Enter Standard" required></td>

      <th>Enter Student's Name</th>
      <td><input type="text" name="stuname" placeholder="Enter Student Name" required></td>

      <td colspan="2"> <input type="submit" name="submit" value="Search"> </td>
    </tr>

  </form>
</table>

<table align="center" width="80%" border="1" style="margin-top:10px;">
  <tr style="background-color:#000; color:#fff;">
    <th>No.</th>
    <th>Image</th>
    <th>Name</th>
    <th>Rollno</th>
    <th>Edit</th>
  </tr>

  <?php
    if (isset($_POST['submit'])) {
      //Firstly connceting database to search data
      include('../dbcon.php');

      $standard = $_POST['standard'];
      $name = $_POST['stuname'];

      $sql = "SELECT * FROM `student` WHERE `standard`='$standard' AND `name` LIKE'%$name%'";
      $run = mysqli_query($con,$sql);

      if (mysqli_num_rows($run)<1) {
        echo "<tr><td colspan='5'>No Records Found</td></tr>";
      }else {
        $count = 0;
        while ($data=mysqli_fetch_assoc($run)) {
          $count++;
          ?>
          <tr align="center">
            <td><?php echo $count; ?></td>
            <td> <img src="../dataimg/<?php echo $data['image'];?>" style="max-width:100px;"/> </td>
            <td><?php echo $data['name']; ?></td>
            <td><?php echo $data['rollno']; ?></td>
            <td> <a href="deleteform.php?sid=<?php echo $data['id']; ?>"> Delete  </a> </td>
          </tr>
          <?php
        }
      }
    }
  ?>

</table>
