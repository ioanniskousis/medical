<?php
session_start();
$noPatient = (strlen($_SESSION[patientcounter])==0);
$noDoctor = (strlen($_SESSION[doctorcounter])==0);
$unauhorised = $noPatient && $noDoctor;

if ($unauhorised) {
  header("Location:https://vipetbook.com/med/login_as_patient.html");
  exit();
}

$patientcounter = $_SESSION[patientcounter];
if ($noPatient) {
  $patientcounter = $_GET[patient];
}

$allow_addition = $_GET[add];

include("../base/connect.php");

include('topPatient.php');

$sql = "SELECT * FROM patients WHERE counter=".$patientcounter;
$result = mysql_query($sql, $conn) or die(mysql_error());
if ($newArray = mysql_fetch_array($result)) {
  $patientName = $newArray['patientName'];
}

echo '  <div class="main">';
echo '    <div class="formHeader">';
echo $patientName;
// echo '      <div class="patientCode cFlex">';
// echo $counter.$code_str;
// echo '      </div>';
echo '      <div class="home">';
if ($noPatient) {
  echo '        <a href="https://vipetbook.com/med/doctor.php">';
} else {
  echo '        <a href="https://vipetbook.com/med/patient.php">';
}
echo '          <img src="images/arrow-88-64.png">';
echo '        </a>';
echo '      </div>';
if ($noPatient == false) {
  echo '      <div class="newRecord">';
  echo '        <a href="newPressure.html"></a>';
  echo '      </div>';  
}
echo '    </div>';
echo '    <div class="tableHeader">';
echo 'Μετρήσεις Πίεσης';
echo '    </div>';

echo '    <div class="patient-body">';

echo '      <table>';
// echo '        <tr>';
// echo '          <td class="tdHeader" colspan="4">';
// echo '            Μετρήσεις Πίεσης';
// echo '          </td>';
// echo '          <td class="tdHeader clickable alCenter">';
// if ($allow_addition) {
//   echo '<a class="add" href="new.html">';
//   echo '+';
//   echo '</a>';
// }
// echo '          </td>';
// echo '        </tr>';

echo '        <tr>';

echo '          <th class="alLeft">';
echo '            Ημ/νία';
echo '          </th>';

echo '          <th class="alRight">';
echo '            Ώρα';
echo '          </th>';

echo '          <th class="alRight">';
echo '            Συσ/κή';
echo '          </th>';

echo '          <th class="alRight">';
echo '            Δια/κή';
echo '          </th>';

echo '          <th class="alRight">';
echo '            Σφυγμοί';
echo '          </th>';

echo '        </tr>';

$sql = "SELECT * FROM presures WHERE patientCounter = ".$patientcounter." ORDER BY recordTime";
$result = mysql_query($sql, $conn) or die(mysql_error());
$num_rows = mysql_num_rows($result);

$prevDate = '';

while ($newArray = mysql_fetch_array($result)){
  $date = new DateTime($newArray['recordTime']);
  $formatedDate = $date->format('Y-m-d');
  if ($formatedDate == $prevDate) {
    $formatedDate = '';
  }
  $prevDate = $date->format('Y-m-d');
  $timeFormated = $date->format('H:i');

  echo '        <tr>';
  echo '          <td>';
  echo $formatedDate;
  echo '          </td>';
  echo '          <td class="alRight">';
  echo $timeFormated;
  echo '          </td>';
  echo '          <td class="alRight">';
  echo $newArray['upper'];
  echo '          </td>';
  echo '          <td class="alRight">';
  echo $newArray['lower'];
  echo '          </td>';
  echo '          <td class="alRight">';
  echo $newArray['bits'];
  echo '          </td>';
  echo '        </tr>';
}

echo '        </table>';
echo '      </div>';
echo '    </div>';


include('bottom.php');
?>
