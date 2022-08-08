<?php

class Login
{
  public $con = null;
  public function __construct($con) {
    $this->con = $con;
  }

  public function Process($username, $password)
  {
    $sql = "SELECT * FROM users_tb WHERE (Email = '{$username}' OR Username = '{$username}') AND PASSWORD = '{$password}' LIMIT 1";
    $res = $this->con->query($sql);

    if ($res->num_rows > 0) {
      while($row = $res->fetch_assoc()){
          $_SESSION['loggeduser'] = $row['Username'];
      }
      header("location: dashboard.php");
    } else {
      $msg = urlencode("Invalid Username/Email or Password");
      header("location: index.php?error=$msg");
    }
  }

  public function RecoverAccount($email)
  {
    $sql = "SELECT * FROM users_tb WHERE (Email = '{$email}')  LIMIT 1";
    $res = $this->con->query($sql);
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_assoc()) {
        $_SESSION['email'] = $row['Email'];

      }
      $_SESSION['otp'] = rand(100000, 999999);
      header("location: otp.php");
    } else {
      $msg = urlencode("Invalid Email");
      header("location: recovery_form.php?error=$msg");
    }
    
    // check if its valid email
    // send otp to email for resetting of password
  }
   

  public function verifyOTP($otp)
  {
    
    if ($otp == $_SESSION['otp']) {
      # code...
      header("location: recovery_password.php");
    }else{
      $msg = urlencode("Invalid OTP");
      header("location: otp.php?error=$msg");
    }
  }

  public function checkPassword($email, $recoveryPassword ="" , $confirmPassword =""){
    if (empty($recoveryPassword) || empty($confirmPassword)) {
      $msg = urlencode("Input password");
      header("location: recovery_password.php?error=$msg");
    }elseif($recoveryPassword != $confirmPassword){
      $msg = urlencode("your password is $recoveryPassword and your confirmPassword is $confirmPassword");
      header("location: recovery_password.php?error=$msg");
    }
    else{
      $sql = "UPDATE users_tb SET Password='$confirmPassword' WHERE Email='$email'";
      $res = $this->con->query($sql);
      if ($res) {
        # code...
        $msg = urlencode("password updated successful");
        header("location: index.php?error=$msg");
      }else{
        $msg = urlencode("password unsuccessful");
        header("location: recovery_password.php?error=$msg");
      }
    }
  }
  
}

?>