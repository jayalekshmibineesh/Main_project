<?php
session_start();
$_SESSION['login_id'];
session_destroy();
header("location:login.php");

?>