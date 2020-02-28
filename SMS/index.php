<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Student Management System</title>
  <link rel="stylesheet" href="css/index_style.css">
</head>

<body>

  <!-- Admin login button and Title of project -->
  <h3 align="right" style="margin-right:20px;"><a href="login.php">Admin Login</a></h3>
  <h1 align="center">Welcome to Student Management System</h1>

  <!-- Form for selecting standard and roll no. for displaying student data -->
  <form class="post" action="index.php" method="post">
    <table style="width:50%;" align="center" border="1" cellpadding="5px;">
      <tr>
        <td colspan="2" align="center">Student Information</td>
      </tr>
      <tr>
        <td align="center">Choose Standard</td>
        <td>
          <select name="std" required>
            <option value="1">1st</option>
            <option value="2">2nd</option>
            <option value="3">3rd</option>
            <option value="4">4th</option>
            <option value="5">5th</option>
            <option value="6">6th</option>
            <option value="7">7th</option>
            <option value="8">8th</option>
            <option value="9">9th</option>
            <option value="10">10th</option>
          </select>
        </td>
      </tr>
      <tr>
        <td align="center">Enter Roll no.</td>
        <td> <input type="text" name="rollno" required> </td>
      </tr>
      <tr>
        <td colspan="2" align="center"> <input type="submit" name="submit" value="Show Info"> </td>
      </tr>
    </table>
  </form>

</body>

</html>

<?php

if (isset($_POST['submit'])) {
  $standard = $_POST['std'];
  $rollno = $_POST['rollno'];

  include('dbcon.php');
  include('function.php');

  showdetails($standard, $rollno);
}
?>