<?php
function authenticate(){
    if(!isset($_SESSION['Logged_in'])&&(!isset($_SESSION['Username']))){

        header("location:login.php");
    }
}
?>