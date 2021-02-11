<?php
  session_start();
  if (strlen($_SESSION[doctorcounter])==0) {
    header("Location:https://vipetbook.com/med/login_as_doctor.html");
    exit();
  }
  include("../base/connect.php");

  $sql = "SELECT * FROM doctors WHERE counter=".$_SESSION[doctorcounter];
  $result = mysql_query($sql, $conn) or die(mysql_error());
  if ($newArray = mysql_fetch_array($result)) {
    $doctorName = $newArray['doctorName'];
  }

  include('topDoctor.php');
  echo '  <div class="main">';
  echo '    <div class="formHeader">';
  echo $doctorName;
  echo '    </div>';
  echo '    <div class="patientsHeader">';
  echo '      Κατάλογων θεραπευομένων';
  echo '      <div id="joinPatient">';

  echo '      </div>';
  echo '    </div>';
  echo '    <div class="patientsTable">';
  
  $sql = "SELECT patientName, patientCounter  FROM doctorPatients LEFT JOIN patients ON doctorPatients.patientCounter = patients.counter WHERE doctorCounter=".$_SESSION[doctorcounter];
  $result = mysql_query($sql, $conn) or die(mysql_error());
  while ($newArray = mysql_fetch_array($result)) {
    $patientName = $newArray['patientName'];
    $patientCounter = $newArray['patientCounter'];

    echo '      <div class="doctorPatientItem">';
    echo '        <a href="pressureRecords.php?patient='.$patientCounter.'">'.$patientName.'</a>';
    echo '      </div>';
  }

  echo '    </div>';
  echo '  </div>';
  echo '  <div id="back-layer">';
  echo '    <div class="selectPatientContainer">';
  echo '      <label for="patientCode">Κωδικός Θεραπευομένου</label>';
  echo '      <input id="patientCode" name="patientCode">';
  echo '      <input type="button" value="Συνέχεια" id="submitRequest">';
  echo '      <input type="button" value="Άκυρο" id="cancelSelectPatient">';
  echo '    </div>';
  echo '  </div>';
  include('bottom.php');
?>