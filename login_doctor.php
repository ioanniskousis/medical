<?php

$userName = $_POST[userName];
$password = $_POST[password];

include("../base/connect.php");
$sql = "SELECT * FROM doctors WHERE userName='".$userName."' AND userPassword='".$password."'";
$result = mysql_query($sql, $conn) or die(mysql_error());
if ($newArray = mysql_fetch_array($result)) {
  $counter = $newArray['counter'];
  session_start();
  $_SESSION[doctorcounter] = $counter;
  
  header("Location:doctor.php");
} else {
  header("Location:login_as_doctor.html");
  
}


?>