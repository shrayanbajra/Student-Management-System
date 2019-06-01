<?php

include('../dbcon.php');

$rollno = $_POST['rollno'];
$name = $_POST['name'];
$city = $_POST['city'];
$pcon = $_POST['pcont'];
$std = $_POST['standard'];
$id = $_POST['sid'];
$imagename = $_FILES['image']['name'];
$tempname = $_FILES['image']['tmp_name'];

//Uploading file in the server
//only storing name at first
//move_uploaded_file(source,destination);
move_uploaded_file($tempname,"../dataimg/$imagename");

$qry = "UPDATE `student` SET `rollno` = '$rollno', `name` = '$name', `city` = '$city', `pcont` = '$pcon', `standard` = '$std', `image` = '$imagename' WHERE `student`.`id` = $id";

$run = mysqli_query($con,$qry);

if ($run == true) {
  ?>
    <script>
      alert('Data Upadated Successfully');
      window.open('updateform.php?sid=<?php echo $id; ?>','_self');
    </script>
    <?php
}
?>
