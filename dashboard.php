<?php
    session_start();
    if(!isset($_SESSION['loggeduser'])){
      session_destroy();
      header('Location:index.php');
    }
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
    </style>
</head>
<body>
    <h1>DashBoard: Welcome <?= $_SESSION['loggeduser'] ?></h1>
    <a href="logout.php">logout</a>
</body>
</html>