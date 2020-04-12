<?php
  // Connecting to database
  $con = mysqli_connect('localhost','root','','sms1');

  if ($con == false) {
    echo "Failure while connecting to database";
  }
?>
