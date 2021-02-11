<?php

$fullName = $_POST[fullName];
$newUserName = $_POST[newUserName];

$newUserPassword = $_POST[newUserPassword];

include("../base/connect.php");
include("../base/max_counter.php");

$recordCounter = maxCounter("doctors", "counter", $conn) + 1;
$sql = "INSERT INTO doctors SET counter = ".$recordCounter.", doctorName = '".$fullName."', userName = '".$newUserName."', userPassword = '".$newUserPassword."';" ;
$result = mysql_query($sql, $conn) or die(mysql_error());

session_start();
$_SESSION[doctorcounter] = $recordCounter;

header("Location:doctor.php");

?>