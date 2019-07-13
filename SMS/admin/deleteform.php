<?php

// Connecting database
include('../dbcon.php');

// Taking data from form and storing it in variables
$id = $_REQUEST['sid'];

$qry = "DELETE FROM `student` WHERE `id`='$id'";
$run = mysqli_query($con,$qry);

if ($run == true) {
  ?>
    <script>
      alert('Data Deleted Successfully');
      window.open('deletestudent.php','_self');
    </script>
  <?php
}

?>
