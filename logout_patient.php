<?php
  session_start();
  unset($_SESSION[patientcounter]);
  header("Location:https://vipetbook.com/med/login_as_patient.html");
  exit();
?>