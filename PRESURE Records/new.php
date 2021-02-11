<?php
  session_start();
  if (strlen($_SESSION[patientcounter])==0) {
    header("Location:https://vipetbook.com/med/login_as_patient.html");
    exit();
  }

$date = $_POST[date];
$time = $_POST[time];

$upper = $_POST[upper];
$lower = $_POST[lower];
$bits = $_POST[bits];


include("../base/connect.php");
include("../base/max_counter.php");

$recordCounter = maxCounter("presures", "counter", $conn) + 1;
$sql = "INSERT INTO presures SET counter = ".$recordCounter.", patientCounter = ".$_SESSION[patientcounter].", recordTime = '".$date." ".$time."', upper = ".$upper.", lower = ".$lower.", bits = ".$bits.";" ;
$result = mysql_query($sql, $conn) or die(mysql_error());

header("Location:va.php?add=".$recordCounter);
exit();

// echo '
// <script>
//   alert("'.$sql.'");
// </script>
// ';

?>