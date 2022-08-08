<?php
session_start();
include_once "classes/dbcon.php";
include_once "classes/login.php";

$db = new DBCon;
$login = new Login($db->con);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  if (isset($_POST['processlogin'])) {
    $login->Process($_POST['username'], $_POST['password']);
  }
  if (isset($_POST['processrecovery'])) {
    # code for recovery
    $login->RecoverAccount($_POST['recovery_email']);
  }

  if (isset($_POST['otprecovery'])) {
    # code for recovery
    $login->verifyOTP($_POST['recovery_otp']);
  }
  if (isset($_POST['processpassword'])) {
    # code for recovery
    $login->checkPassword($_SESSION['email'],$_POST['recovery_password'], $_POST['confirm_password']);
  }
} else {
  die("invalid request");
}


?>