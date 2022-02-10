<?php 
session_start();
include("../db/db_config.php");
include("../db/adminaut.php");
authenticate();
$Username=$_SESSION['Username'];

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
</head>
<body>
<ul class="menu">
                <li><a href="../index.html">HomePage</a></li>
                <li><a href="admin_home.php">Admin Home</a></li>
                <li><a href="uploadss.php">Upload Scrim/Tourney Highlights</a></li>
                <li><a href="uproster.php">Update/View Current Roster</a></li>
                <li><a href="logout.php">Logout</a></li>
                </ul>
<h1>FORMIDABLES CURRENT ROSTER</h1>
<h2>PLAYER ONE</h2>
<?php
     $select="SELECT * FROM roster";
    $que=mysqli_query($db,$select);
    $output="";
    ?>
    <table border="1">
    <tr>
        <th>IGN</th>
        <th>UID</th>
        <th>Character Skin</th>
        <th>Gun</th>
        <th>Country</th>
        <th>Discord</th>
        <th>About </th>
        <th>Video</th>
        <th>Edit</th>
</tr>


<?php 
while($row=mysqli_fetch_array($que)){


?>
<tr>
 <td><?php echo $row[1]?></td>
 <td><?php echo $row[2]?></td>
<td><?php echo $row[3]?></td>
<td><?php echo $row[4]?></td>
<td><?php echo $row[5]?></td>
<td><?php echo $row[6]?></td>
<td><?php echo $row[7]?></td>
<td><video width="500" height="200" src="../videos/<?php echo $row['Video']?>" 
	        	   controls>
	        	
	        </video>


	    
        
		 
        </td>
<td><a href="editroster.php">Update</td>

</tr>
<?php }?>


</body>
</html>