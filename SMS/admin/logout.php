<?php

  //If you want to use anything related to session we must first use session_start()
  session_start();
  session_destroy();

  //Directing to login page after destroying session
  header('location:../login.php');

?>
