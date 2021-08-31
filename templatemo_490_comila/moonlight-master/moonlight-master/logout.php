
<?php
//---------------------------------------------------------- LOG OUT-----------------------------------------------------------------------
session_start();
  session_unset();
  session_destroy();
  echo "<script>alert('Successfully Loged out');</script>";
  echo "<script>location.href='../../homepage.php';</script>";

?>