<?php

$host = "localhost";
$username = "root";
$passwprd = "admin12345";
$database = "logindb";
  

if($_SERVER['REQUEST_METHOD']=='POST'){
  $Email = $_POST['Email'];
  $Password = $_POST['Password'];

  $con = new mysqli('localhost', 'root', 'admin12345', 'logindb');
  if($con) {
    $stmt = $con->prepare("INSERT INTO `login_tbl`(Email, Password) VALUES(?, ?)");
    $stmt->bind_param("ss", $Email, $Password);
    $stmt->execute();
    if($stmt) {
      echo "Submitted";
    } else {
      die(mysqli_error($con));
    }
  } else {
    die(mysqli_error($con));
  }
  }

