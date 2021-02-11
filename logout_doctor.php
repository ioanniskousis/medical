<?php
  session_start();
  unset($_SESSION[doctorcounter]);
  header("Location:https://vipetbook.com/med/login_as_doctor.html");
  exit();
?>