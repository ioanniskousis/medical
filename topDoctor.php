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

    .loginButton {
      width: 300px;
      height: 60px;
      margin-bottom: 10px;
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

    a:hover {
      color: #eee;
      background-color: #047;
    }

    .main {
      width: 100%;
      max-width: 600px;
      height: 100%;
      background-color: whiteSmoke;
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
    }

    .patientsHeader {
      padding: 10px;
      color: #047;
      font-size: medium;
      font-weight: 600;
      height: 40px;
      box-sizing: border-box;
      position: relative;
      border-bottom: 1px solid #047;
    }

    #joinPatient {
      position: absolute;
      background-color: whiteSmoke;
      top: 0;
      right: 0;
      width: 39px;
      height: 39px;
      cursor: pointer;
      background-image: url("images/plus-5-64.png");
      background-size: 50% 50%;
      background-repeat: no-repeat;
      background-position: center center;
    }

    .patientsTable {
      width: 100%;
      height: calc(100% - 100px);
      // background-color: tomato;
      box-sizing: border-box;
    }

    .cFlex {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    form {
      width: 100%;
      max-width: 400px;
      height: calc(100% - 60px);
      box-sizing: border-box;
      margin: 0 auto;
      padding: 10px 30px;
      box-sizing: border-box;
    }

    label, input {
      display: block;
      width: 100%;
      font-weight: 600;
    }

    label {
      margin: 20px 0 4px 0;
      color: #047;
    }

    input {
      padding: 10px;
      border: 1px solid #047;
      border-radius: 2px;
      box-sizing: border-box;
    }

    input[type="submit"],
    input[type="button"] {
      margin-top: 30px;
      background-color: #047;
      color: white;
      cursor: pointer;
      height: 40px;
    }

    input[type="submit"]:hover,
    input[type="button"]:hover {
      color: #047;
      background-color: white;
    }

    .home {
      position: absolute;
      /* background-color: tomato; */
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
    .logout a img {
      width: 60%;
      height: 60%;
    }
    
    .newUser {
      width: 100%;
      height: 60px;
      background-color: rgba(70, 90, 0, 0.5);
      color: white;
      margin-top: 40px;
      border-radius: 4px;
      border: 1px solid rgba(70, 90, 0, 0.8);
      overflow: hidden;
      box-sizing: border-box;
    }

    #back-layer {
      visibility: hidden;
      display: none;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 40, 70, 0.5);
      justify-content: center;
      align-items: center;
    }

    .selectPatientContainer {
      width: 300px;
      height: 220px;
      background-color: rgba(0, 40, 70, 0.99);
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: flex-start;
      box-sizing: border-box;
      padding: 0 20px
    }
    .selectPatientContainer label {
      color: white;
    }
    .selectPatientContainer * {
      display: block;
      // margin: 10px;
    }

    #cancelSelectPatient {
      margin-top: 10px;
    }

    .doctorPatientItem {
      background-color: #eee;
      height: 40px;
      width: 100%;
      margin-bottom: 2px;
      box-sizing: border-box;
    }

    .doctorPatientItem a {
      justify-content: flex-start;
      padding: 0 20px;
      box-sizing: border-box;
    }
  </style>
  <script>
    let responseReceived = false;

    function wload() {
      const cancelSelectPatient = document.getElementById("cancelSelectPatient");
      cancelSelectPatient.addEventListener("click", cancelSelectPatient_Click);

      const submitRequest = document.getElementById("submitRequest");
      submitRequest.addEventListener("click", submitRequest_Click);

      const joinPatient = document.getElementById("joinPatient");
      joinPatient.addEventListener("click", joinPatient_Click);
    }
    function submitRequest_Click() {
      const patientCode = document.getElementById("patientCode").value;
      if (patientCode.length == 0) { return; }
 
      const Http = new XMLHttpRequest();
      const url="https://vipetbook.com/med/joinPatient.php?patientCode=" + patientCode;
      Http.open("GET", url);
      Http.send();

      Http.onreadystatechange = (e) => {
        if (!responseReceived) {
          if (Http.responseText) {
            responseReceived = true;
            alert(Http.responseText);
            cancelSelectPatient_Click();
          }
        }
        return true;
      }
    }
    function joinPatient_Click() {
      responseReceived = false;
      document.getElementById("patientCode").value = "";
      const backLayer = document.getElementById("back-layer");
      backLayer.style.visibility = "visible";
      backLayer.style.display = "flex";
      document.getElementById("patientCode").focus();
    }
    function cancelSelectPatient_Click() {
      const backLayer = document.getElementById("back-layer");
      backLayer.style.visibility = "hidden";
      backLayer.style.display = "none";
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
      <a href="https://vipetbook.com/med/logout_doctor.php">
        <img src="images/account-logout-64.png">
      </a>
    </div>
    <h1>Medical Survey</h1>
  </div>
  <div class="bodyFrame">
';

?>