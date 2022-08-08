<?php 
  session_start()

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    * { box-sizing: border-box; }
    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    form { width: fit-content; padding: 100px; margin: auto; background-image: linear-gradient(#ddddff 10%, #ddd); }
    div { margin: 20px; width: 350px; }
    .error { color: #dd0000; }
    input { width: 100%; border: 2px solid transparent; padding: 8px; }
    button { width: 100%; border: none; background-image: linear-gradient(#8888ff 10%, #2222ff); cursor: pointer; color: #fff; font-size: 20px; font-weight: 600; }
    input, button { border-radius: 6px; outline: none; height: 45px; margin: 0; }
    input:hover, input:focus { border: 2px solid skyblue; }
  </style>
</head>

<body>
  <form action="processor.php" method="post">
    <div><h1>Login to your Account</h1></div>
    <?php if(isset($_GET['error'])) :?>
      <div class="error"><?= $_GET['error'] ?></div>
      <?php else: ?>
        <div></div>
    <?php endif; ?>
    <div><input type="username" name="username" placeholder="Email or Username"></div>
    <div><input type="password" name="password" placeholder="Password"></div>
    <div><button type="submit" name="processlogin" value="login">Log In</button></div>
    <div><a href="recovery_form.php">Forgot password?</a></div>
  </form>
</body>

</html>