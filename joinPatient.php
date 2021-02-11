<?php

session_start();
$patientCode = $_GET[patientCode];
$code = $patientCode % 10000;
$patientCounter = ($patientCode - $code) / 10000;

include("../base/connect.php");
include("../base/max_counter.php");

$sql = "SELECT * FROM patients WHERE counter = ".$patientCounter.';';
$result = mysql_query($sql, $conn) or die(mysql_error());
if ($newArray = mysql_fetch_array($result)) {
  if ($code == $newArray['code']) {
    $recordCounter = maxCounter("doctorPatients", "counter", $conn) + 1;
    $sql = "INSERT INTO doctorPatients SET counter = ".$recordCounter.", doctorCounter = ".$_SESSION[doctorcounter].", patientCounter = ".$patientCounter.";" ;
    // echo $sql;
    // exit();
    mysql_query($sql, $conn) or die(mysql_error());

    echo '{patientName=>"'.$newArray['patientName'].'", patientCounter=>'.$patientCounter.'}';
    exit();
  }
}
// .'/'.$code.' => '.$_SESSION[doctorcounter]
echo 'unknown';
exit();



?>