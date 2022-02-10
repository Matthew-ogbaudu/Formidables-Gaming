<?php 
session_start();
include("../db/db_config.php");
include("../db/adminaut.php");
authenticate();
$Username=$_SESSION['Username'];

?>
<?php
if(isset($_POST['submit'])){
    $error=array();
    if(empty($_POST['desc'])){
        $error['dec']="What team did you face?";
    }else{
        $desc=mysqli_real_escape_string($db,$_POST['desc']);
    }
    if(empty($_POST['neg'])){
        $error['negg']="Who went negative";
    }else{
        $negative=mysqli_real_escape_string($db,$_POST['neg']);
    }
    $file=$_FILES['image']['name'];
    try{
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search(
            $finfo->file($_FILES['image']['tmp_name']),
            array(
                'jpeg' => 'image/jpeg',
                'png' => 'image/png',
                'jpg' => 'image/jpg',
            ),
            true
        )) {
            throw new RuntimeException('Invalid file format.');
        }
    
   
    $insert=mysqli_query($db, "INSERT INTO images VALUES (NULL, 
                                                                '".$file."', 
                                                                '".$desc."',
                                                                    NOW(),
                                                                    '".$negative."')")
                                                                     or die(mysqli_error($db));
 if($insert){
    move_uploaded_file($_FILES['image']['tmp_name'],"$file"); 
   }  
   echo"Uploaded Sucessfully";
    
 } catch (RuntimeException $e) {

    echo $e->getMessage();

}
    foreach($error as $err){
        echo"<p>$err</p>";
    }
}
    


    ?>
<html>
    <head>

    </head>
    <body>
    <ul class="menu">
                <li><a href="index.html">Homepage</a></li>
                <li><a href="admin_home.php">Admin Home</a></li>
                <li><a href="viewusers.php">View Users</a></li>
                <li><a href="uproster.php">Update/View Current Roster</a></li>
                <li><a href="viewss.php">View Scrim/Tourney Highlights</a></li>
                <li><a href="logout.php">Logout</a></li>
              
                </ul>
                <div class="ment">
<?php
    echo strtoupper("<h1> WELCOME <strong id='ment'> $Username</strong> </h1>");
    ?>
    </div>
    <div class="container">
    <h3> UPLOAD SCRIM/TOURNEY HIGHLIGHTS</h3>
    <br/>
    <form action="" method="post" enctype="multipart/form-data">
    <br/>
<p>Upload Image<input type="file" name="image"></p>
<br/>
<p>Formidables VS:<input type="text" name="desc"></p>
<br/>
<p> List of Neggers:<input type="text" name="neg"></p>

<input type="submit" name="submit" value="upload">
</form>
    </div>
    </body>
</html>