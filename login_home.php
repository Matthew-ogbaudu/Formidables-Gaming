<?php
session_start();
include("db/db_config.php");
include("db/authenticate.php");

authenticate();
$Username=$_SESSION['Username'];


?>
<html>
    <title>

    </title>
    <head>
    <link rel="stylesheet" type="text/css" href="login_home.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
   
    <body>
        <div class="container">
           
            <ul class="menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="admin/admin_login.php">ADMIN</a></li>
                <li><a href="">Contact US</a></li>
                <li><a href="">About</a></li>
                <li><a href="logout.php">Logout</a></li>
                </ul>
                
<?php

echo strtoupper("<h1 id='ment'> WELCOME <strong> $Username</strong> </h1>");
?>
        
<div class="todo"
    <ul class="list">
    <li><a href="profileupdate.php">View Your Profile</a></li>
    <li><a href="">View past Scrims/Tournament screenshots</a></li>
    <li><a href="codm_profile.php">Update your Codm Profile</a></li>
    </div>
    
    <div class="codm">
        <div class="profile">
    <p>Your Codm Profile</p>
    <ul id="proflist">
        <li>CurrentIGN:<?php 
        $query=mysqli_query($db, "SELECT IGN from register where Username='".$_SESSION['Username']."'") or die(mysqli_error($db));
                while($result=mysqli_fetch_array($query)){
                    echo $result['IGN'];
                }
        ?>
        </li>
        <li> UID:<?php 
        $query=mysqli_query($db, "SELECT UID from register where Username='".$_SESSION['Username']."'") or die(mysqli_error($db));
                while($result=mysqli_fetch_array($query)){
                    echo $result['UID'];
                }
        ?>
             </li>
    </ul>
        </div>
        <div class="ranked">
   <p>Your MP Ranked Details</p>
    </div>

     
        </div>


    </body>
    
</hml>