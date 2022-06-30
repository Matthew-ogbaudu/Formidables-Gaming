<?php
function authenticate(){
    if(!isset($_SESSION['admin_id'])&&(!isset($_SESSION['Username']))){

        header("location:admin_login.php");
    }
}
?>