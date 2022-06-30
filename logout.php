<?php
session_start();
unset($_SESSION['Logged_in']);
unset($_SESSION['Username']);
header("location:login.php");
?>