<?php 
session_start();
include("../db/db_config.php");
include("../db/adminaut.php");
authenticate();
$Username=$_SESSION['Username'];

if(isset($_POST['submit'])){
    $error=array();
    if(empty($_POST['ign'])){
        $error['ignn']="IGN not inserted";

    }else{
        $ign=mysqli_real_escape_string($db,$_POST['ign']);
    }
    if(empty($_POST['uid'])){
        $error['uidd']="UID not inserted";

    }else{
        $uid=mysqli_real_escape_string($db,$_POST['uid']);
    }
    if(empty($_POST['skin'])){
        $error['skinn']="Favourite Skin not inserted";

    }else{
        $skin=mysqli_real_escape_string($db,$_POST['skin']);
    }
    if(empty($_POST['gun'])){
        $error['gunn']="Favourite Gun not inserted";

    }else{
        $gun=mysqli_real_escape_string($db,$_POST['gun']);
    }if(empty($_POST['country'])){
        $error['count']="Country not inserted";

    }else{
        $country=mysqli_real_escape_string($db,$_POST['country']);
    }
    if(empty($_POST['discord'])){
        $error['disc']="Discord ID not inserted";

    }else{
        $discord=mysqli_real_escape_string($db,$_POST['discord']);
    }
    if(empty($_POST['about'])){
        $error['abt']="About Player not inserted";

    }else{
        $about=mysqli_real_escape_string($db,$_POST['about']);
    }
    if(isset($_FILES['my_video'])){

    $video_name = $_FILES['my_video']['name'];
    $tmp_name = $_FILES['my_video']['tmp_name'];
    $error = $_FILES['my_video']['error'];

    if ($error === 0) {
    	$video_ex = pathinfo($video_name, PATHINFO_EXTENSION);

    	$video_ex_lc = strtolower($video_ex);

    	$allowed_exs = array("mp4", 'webm', 'avi', 'flv', 'mov');

    	if (in_array($video_ex_lc, $allowed_exs)) {
    		
    		$new_video_name = uniqid("video-", true). '.'.$video_ex_lc;
    		$video_upload_path = '../videos/'.$new_video_name;
    		move_uploaded_file($tmp_name, $video_upload_path);

     
 $insert=mysqli_query($db, "INSERT into roster VALUES(
                        NULL,
                        '".$ign."',
                        '".$uid."',
                        '".$skin."',
                        '".$gun."',
                        '".$country."',
                        '".$discord."',
                        '".$about."',
                        '".$new_video_name."'
                        )")
                        or die(mysqli_error($db));
          
                        echo "<script>alert('Update Successful')</script>";
                      
                    }else {
                        $em = "You can't upload files of this type";
                      header("Location: admin_home.php?error=$em");
                    }
                }
                
            
            }
            
                       
	
      
foreach($error as $err){
    echo"<p> $err </p>";
    }
}
            
?>
<!DOCTYPE Html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="roster.css">
    
    </head>
    <body>
    <body>
    <ul class="menu">
                <li><a href="../index.html">Home</a></li>
                <li><a href="viewusers.php">View Users</a></li>
            
               
                <li><a href="viewroster.php">View Current Roster</a></li>
                <li><a href="logout.php">Logout</a></li>
              
                </ul>
    <h1>UPDATE CURRENT FORMIDABLES COMP ROSTER</h1>
    <form action="" method="post" enctype="multipart/form-data">
<label for="" class="">IGN</label>
<input type="text" name="ign" placeholder="IGN">
<br/>
<label for="" class="">UID</label>
<input type="text" name="uid" placeholder="UID">
<br/>
<label for="" class="">Favourite Character Skin</label>
<input type="text" name="skin" placeholder="Character Skin">
<br/>
<label for="" class="">Favourite GUN </label>
<input type="text" name="gun" placeholder="GUN">
<br/>
<label for="" class="">Country</label>
<input type="text" name="country" placeholder="Country">
<br/>
<label for="" class="">Discord</label>
<input type="text" name="discord" placeholder="Discord ID">
<br/>
<label for="" class="">About</label>
<input type="text" name="about" placeholder="About Player">
<br/>
 <label for="" class="">Short Gameplay</label>
<input type="file" name="my_video">
<br/>
<input type="submit" name="submit" value="upload">

</form>
    </body>