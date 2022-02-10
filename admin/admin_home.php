<?php 
session_start();
include("../db/db_config.php");
include("../db/adminaut.php");
authenticate();
$admin_id=$_SESSION['admin_id'];
$Username=$_SESSION['Username'];

?>

<!DOCTYPE Html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="admin_home.css">
    </head>
    <body>
    <ul class="menu">
                <li><a href="../index.html">Home</a></li>
                <li><a href="viewusers.php">View Users</a></li>
                <li><a href="uploadss.php">Upload/View Scrim/Tourney Highlights</a></li>
                
                <li><a href="uproster.php">Update/View Current Roster</a></li>
                
                <li><a href="logout.php">Logout</a></li>
              
                </ul>
              
        <h1 class="ment"><strong>WELCOME <?php echo strtoupper($Username)?></strong></h1>
        <h1 class="ment"><strong>Your Admin ID is <?php echo strtoupper($admin_id)?></strong></h1>
   

    
    
    
    </body>
</html>