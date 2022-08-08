<?php
session_start();
session_destroy();
// unset($_SESSION['loggeduser']);
header("Location:index.php");
?>