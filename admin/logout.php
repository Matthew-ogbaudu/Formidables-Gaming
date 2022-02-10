<?php
session_start();
unset($_SESSION['admin_id']);
unset($_SESSION['Username']);
header("location:admin_login.php");
?>