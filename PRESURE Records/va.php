<?php

$allow_addition = $_GET[add];

include("../base/connect.php");

echo '
  <!DOCTYPE html>
  <html lang="gr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Μετρήσεις Πίεσης</title>
    <style>
      html {
        font-family: Arial, Helvetica, sans-serif;
        padding: 0;
      }
      
      body {
        width: calc(100% - 20px);
        max-width: 800px;
        margin: auto;
        background-color: #eee;
        height: 90vh;
      }

      table {
        font-size: 12px;
        border-collapse: collapse;
        width: 100%;
      }
      
      tr {
        border-bottom: 1px solid black;
      }
      
      th {
        font-weight: 700;
      }

      td, th {
        padding: 10px;
      }
      
      .tdHeader {
        border-bottom: 2px solid black;
        font-weight: bold;
        font-size: 14px;
        text-align: center;
      }
      
      .clickable {
        cursor: pointer;
        font-size: large;
        color: rgb(58, 115, 201);
      }
      
      .clickable:hover {
        background-color: cornflowerblue;
      }
    
      .add {
        display: block;
        width: 100%;
        height: 100%;
        text-decoration: none;
        color: rgb(58, 115, 201);
        font-weight: bold;
      }

      .alRight {
        text-align: right;
      }

      .alCenter {
        text-align: center;
      }
    </style>
  </head>
  <body>
';

echo '<table>';
echo '<tr>';
echo '<td class="tdHeader" colspan="4">';
echo 'Μετρήσεις Πίεσης';
echo '</td>';
echo '<td class="tdHeader clickable alCenter">';
if ($allow_addition) {
  echo '<a class="add" href="new.html">';
  echo '+';
  echo '</a>';
}
echo '</td>';
echo '</tr>';

echo '<tr>';

echo '<th>';
echo 'Ημερομηνία';
echo '</td>';

echo '<th class="alRight">';
echo 'Ώρα';
echo '</td>';

echo '<th class="alRight">';
echo 'Συστολική';
echo '</td>';

echo '<th class="alRight">';
echo 'Διαστολική';
echo '</td>';

echo '<th class="alRight">';
echo 'Σφυγμοί';
echo '</td>';

echo '</tr>';

$sql = "SELECT * FROM presures ORDER BY recordTime";
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

  echo '<tr>';
  echo '<td>';
  echo $formatedDate;
  echo '</td>';
  echo '<td class="alRight">';
  echo $timeFormated;
  echo '</td>';
  echo '<td class="alRight">';
  echo $newArray['upper'];
  echo '</td>';
  echo '<td class="alRight">';
  echo $newArray['lower'];
  echo '</td>';
  echo '<td class="alRight">';
  echo $newArray['bits'];
  echo '</td>';
  echo '</tr>';
}

if ($allow_addition) {
  // echo '<tr>';
  // echo '<td class="clickable" colspan="5">';
  // echo '<a class="add" href="new.html">';
  // echo 'Προσθήκη νέας μέτρησης';
  // echo '</a>';
  // echo '</td>';
  // echo '</tr>';
}

echo '</table>';
echo '
  </body>
  </html>
';

?>
