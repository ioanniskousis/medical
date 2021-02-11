<?php
  session_start();
  if (strlen($_SESSION[patientcounter])==0) {
    header("Location:https://vipetbook.com/med/login_as_patient.html");
    exit();
  }
  include("../base/connect.php");

  $sql = "SELECT * FROM patients WHERE counter=".$_SESSION[patientcounter];
  $result = mysql_query($sql, $conn) or die(mysql_error());
  if ($newArray = mysql_fetch_array($result)) {
    $patientName = $newArray['patientName'];
    $counter = $newArray['counter'];
    $code = $newArray['code'];
    $code_str = substr('000'.$code, -4);
  }

  include('topPatient.php');
  echo '  <div class="main">';
  echo '    <div class="formHeader">';
  echo $patientName;
  echo '      <div class="patientCode cFlex">';
  echo $counter.$code_str;
  echo '      </div>';
  echo '    </div>';
  echo '    <div class="patient-body">';
  
  echo '      <div class="patient-body-item">';
  echo '        <div class="patient-body-item-label">';
  echo '          <a href="pressureRecords.php">Εγγραφές Πίεσης</a>';
  echo '        </div>';
  echo '        <div class="newRecord">';
  echo '          <a href="newPressure.html"></a>';
  echo '        </div>';
  echo '      </div>';

  echo '      <div class="patient-body-item">';
  echo '      </div>';
  
  echo '    </div>';
  echo '  </div>';

  include('bottom.php');
  ?>