<?php
session_start();

if (!isset($_SESSION['otp'])) {
    session_destroy();
    header('location: index.php');
}
echo "Please use the OTP code". " " .$_SESSION['otp']. " ". "to verify your account";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        form {
            width: fit-content;
            padding: 100px;
            margin: auto;
            background-image: linear-gradient(#ddddff 10%, #ddd);
            text-align: center;
        }

        div {
            margin: 20px;
            width: 350px;
        }

        input {
            width: 100%;
            border: 2px solid transparent;
            padding: 8px;
        }

        button {
            width: 100%;
            border: none;
            background-image: linear-gradient(#8888ff 10%, #2222ff);
            cursor: pointer;
            color: #fff;
            font-size: 20px;
            font-weight: 600;
        }

        input,
        button {
            border-radius: 6px;
            outline: none;
            height: 45px;
            margin: 0;
        }

        input:hover,
        input:focus {
            border: 2px solid skyblue;
        }
    </style>
</head>

<body>
    <form action="processor.php" method="post">
        <div>
            <h1>Enter your OTP</h1>
        </div>
        <?php if (isset($_GET['error'])) : ?>
            <div class="error"><?= $_GET['error'] ?></div>
        <?php else : ?>
            <div></div>
        <?php endif; ?>
        <div><input type="text" name="recovery_otp" placeholder="OTP code"></div>
        <div><button type="submit" name="otprecovery" value="send">SEND</button></div>
    </form>
</body>

</html>