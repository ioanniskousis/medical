<?php
  $counter = $_POST[counter];
  $date = $_POST[date];
  $time = $_POST[time];

  include("../base/connect.php");

  $sql = "UPDATE presures SET recordTime = '".$date." ".$time."' WHERE counter = ".$counter.";" ;
  $result = mysql_query($sql, $conn) or die(mysql_error());

  echo '
  <script>
    alert("'.$counter.' '.$date.' '.$time.'")
  </script>
  ';
?>