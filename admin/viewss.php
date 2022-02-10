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
                <li><a href="uploadss.php">Upload Scrim/Tourney Highlights</a></li>
                <li><a href="uproster.php">Update/View Current Roster</a></li>
                <li><a href="logout.php">Logout</a></li>
                </ul>
                
   <?php
     $select="SELECT * FROM images";
    $que=mysqli_query($db,$select);
    $output="";
    ?>
    <table border="1">
    <tr>
        <th>Screenshot</th>
        <th>Formidables vs</th>
        <th>Uploaded On</th>
        <th>Neggers</th>
</tr>


<?php 
while($row=mysqli_fetch_array($que)){
//  	$output .="<img src='".$row['file_name']."' class='my-3' style=width:100px; height:50px;'>";
// echo $output;

?>
<tr>
 <td><img src="<?php echo $row['file_name'];?>"width="100" height="100"></td>
<td><?php echo $row[2]?></td>
<td><?php echo $row[3]?></td>
<td><?php echo $row[4]?></td>

</tr>
<?php }?>
    </table>
    </body>
</html>