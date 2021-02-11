<?php
echo '
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medical Survey</title>

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap");

    html {
      margin: 0;
      padding: 0;
    }

    body {
      font-family: "Source Sans Pro", sans-serif;
      margin: 0;
      padding: 0;
      height: 100vh;
      box-sizing: border-box;
    }

    .topbar {
      background-color: #047;
      height: 60px;
      color: #eee;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    h1, h2 {
      margin: 0;
    }

    .bodyFrame {
      width: 100%;
      max-width: 800px;
      height: calc(100% - 60px);
      margin: auto;
      background-color: rgba(0, 40, 70, 0.5);
      display: flex;
      justify-content: start;
      align-items: center;
      flex-direction: column;
      box-sizing: border-box;
    }

    a {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 100%;
      cursor: pointer;
      color: #047;
      text-decoration: none;
      font-size: medium;
      font-weight: 700;
    }

    // a:hover {
    //   color: #eee;
    //   background-color: #047;
    // }

    .main {
      width: 100%;
      max-width: 600px;
      height: 100%;
      background-color: white;
      box-sizing: border-box;
    }

    .formHeader {
      color: #047;
      border-bottom: 2px solid rgba(0, 40, 70, 0.5);
      box-sizing: border-box;
      height: 60px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: large;
      font-weight: 600;
      position: relative;
    }

    .tableHeader {
      color: #047;
      border-bottom: 2px solid rgba(0, 40, 70, 0.5);
      box-sizing: border-box;
      height: 40px;
      display: flex;
      justify-content: flex-start;
      align-items: center;
      font-size: medium;
      font-weight: 600;
      position: relative;
      padding: 0 20px;
    }

    .cFlex {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .home,
    arrow-back {
      position: absolute;
      top: 0;
      left: 0;
      padding: 10px;
      box-sizing: border-box;
      width: 60px;
      height: 60px;
    }

    .logout {
      position: absolute;
      top: 0;
      right: 0;
      padding: 10px;
      box-sizing: border-box;
      width: 60px;
      height: 60px;
    }

    .home a,
    .logout a
     {
      background-color: transparent;
    }

    .home a img,
    .logout a img,
    .arrow-back {
      width: 60%;
      height: 60%;
    }
    
    .patientCode {
      width: 100px;
      height: 60px;
      color: #047;
      position: absolute;
      top: 0;
      right: 0;
    }

    .patient-body {
      width: 100%;
      height: calc(100% - 100px);
      padding: 0 4px 10px 4px;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: center;
      box-sizing: border-box;
      overflow-y: auto;
    }

    .patient-body-item {
      background-color: #eee;
      height: 60px;
      width: 100%;
      margin-bottom: 10px;
      position: relative;
      display: flex;
      justify-content: flex-start;
      align-items: center;
    }

    .patient-body-item-label {
      padding-left: 20px;
      font-size: large;
      font-weight: 600;
      color: #047;
    }

    .newRecord {
      position: absolute;
      top: 0;
      right: 0;
      width: 60px;
      height: 60px;
      background-image: url("images/plus-5-64.png");
      background-repeat: no-repeat;
      background-size: 40% 40%;
      background-position: center center;
    }

    table {
      font-size: medium;
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
    
    .alLeft {
      text-align: left;
    }

    .alRight {
      text-align: right;
    }

    .alCenter {
      text-align: center;
    }
  </style>
  <script>
    function wload() {

    }

  </script>
</head>
<body onload="wload();">
  <div class="topbar">
    <div class="home">
      <a href="https://vipetbook.com/med">
        <img src="images/home-7-64.png">
      </a>
    </div>
    <div class="logout">
      <a href="https://vipetbook.com/med/logout_patient.php">
        <img src="images/account-logout-64.png">
      </a>
    </div>
    <h1>Medical Survey</h1>
  </div>
  <div class="bodyFrame">
';

?>