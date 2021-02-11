<?php

$fullName = $_POST[fullName];
$newUserName = $_POST[newUserName];

$newUserPassword = $_POST[newUserPassword];

$code = rand(1, 9999);

include("../base/connect.php");
include("../base/max_counter.php");

$recordCounter = maxCounter("patients", "counter", $conn) + 1;
$sql = "INSERT INTO patients SET counter = ".$recordCounter.", code = ".$code.", patientName = '".$fullName."', userName = '".$newUserName."', userPassword = '".$newUserPassword."';" ;
$result = mysql_query($sql, $conn) or die(mysql_error());

session_start();
$_SESSION[patientcounter] = $recordCounter;

header("Location:patient.php");

?>