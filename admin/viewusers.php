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

    </head>
    <body>
    <ul class="menu">
                <li><a href="../index.html">HomePage</a></li>
                <li><a href="admin_home.php">Admin Home</a></li>
                <li><a href="uploadss.php">Upload/View Scrim/Tourney Highlights</a></li>
                <li><a href="uproster.php">Update/View Current Roster</a></li>
                <li><a href="logout.php">Logout</a></li>
                </ul>

<?php
$display=mysqli_query($db,"SELECT * FROM register") or die(mysqli_error($db));

?>
<table border="1">
    <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Gender</th>
        <th>Date of Birth</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>UID</th>
        <th>IGN</th>
        <th>Username</th>
        <th>Password</th>
        <th>image</th>
    </tr>
    <tr>
    <?php
    while($result=mysqli_fetch_array($display)){
        
?>
<td><?php echo $result[1]?></td>
<td><?php echo $result[2]?></td>
<td><?php echo $result[3]?></td>
<td><?php echo $result[4]?></td>
<td><?php echo $result[5]?></td>
<td><?php echo $result[6]?></td>
<td><?php echo $result[7]?></td>
<td><?php echo $result[8]?></td>
<td><?php echo $result[9]?></td>
<td><?php echo $result[10]?></td>
<td><img src="<?php echo $result['image'];?>"width="100" height="100"></td>
</tr>
  <?php  } ?>    

</table>
<?php echo"<p> Number of rows:<strong>".mysqli_num_rows($display)."</strong></p>"?>
    


    </body>
</html>