
 <?php
 session_start();
 include("db/db_config.php");
 

  if(isset($_POST['submit']))
 {    $error=array();
  if(empty($_POST['fname'])){
               $error['firstname']="insert your Firstname";
       }else{
         $firstname=mysqli_escape_string($db,$_POST['fname']);
       }
      if(empty($_POST['lname'])){
           $error['lastname']="Insert Your Lastname";
       }else{
           $lastname=mysqli_real_escape_string($db,$_POST['lname']);
       }         
       if(empty($_POST['gender'])){
          $error['gend']="Select your gender";
       }else{
           $gender=mysqli_real_escape_string($db,$_POST['gender']);
       }if(empty($_POST['dob'])){
           $error['date']="Select your date of birth";
      }else{
           $dob=mysqli_real_escape_string($db,$_POST['dob']);
      }
      if(empty($_POST['mail'])){
          $error['email']="Insert your Email address";
      }
      else{
          $email=mysqli_real_escape_string($db,$_POST['mail']);
      }
           if(empty($_POST['phone'])){
        $error['pone']="Input Phone Number";
    }else{
        $phone=mysqli_real_escape_string($db,$_POST['phone']);
    }
    if(empty($_POST['uid'])){
        $error['uidd']="Your UID?";
    }else
    {
    $uid=mysqli_real_escape_string($db,$_POST['uid']);
    }
         if(empty($_POST['ign'])){
               $error['iggn']="Your In game Name??";
       }else
  {
    $ign=mysqli_real_escape_string($db,$_POST['ign']);
   }
  
    if(empty($_POST['usname'])){
    $error['username']="Choose your Username";
}
else{
    $usname=mysqli_real_escape_string($db,$_POST['usname']);
}
    if(empty($_POST['pword'])){
    $error['password']="Choose a password";
}else{
    $pword=mysqli_real_escape_string($db,$_POST['pword']);
    }
    $uppercase = preg_match('@[A-Z]@', $pword);
    $lowercase = preg_match('@[a-z]@', $pword);
    $number    = preg_match('@[0-9]@', $pword);
    $specialChars = preg_match('@[^\w]@', $pword);
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pword) <8) {
        echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    }else{
       
    
  
    $file=$_FILES['image']['name'];
    try{
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search(
            $finfo->file($_FILES['image']['tmp_name']),
            array(
                'jpeg' => 'image/jpeg',
                'png' => 'image/png',
                'jpg' => 'image/jpg',
                'gif' => 'image/gif',
            ),
            true
        )) {
            throw new RuntimeException('Invalid file format/No image selected.');
        }
    
       
        $yolo="INSERT INTO register VALUES(
                                                               NULL,
                                                            '".$firstname."',
                                                            '".$lastname."',
                                                           '".$gender."',
                                                            '".$dob."',
                                                           '".$email."',
                                                           '".$phone."',
                                                           '".$uid."',
                                                            '".$ign."',
                                                            '".$usname."',
                                                            '".$pword."',
                                                            '".$file."'
                                                           
                                                            )"  or die (mysqli_error($db));
                $res=mysqli_query($db,$yolo);
                if($res){
                    move_uploaded_file($_FILES['image']['tmp_name'],"$file"); 
                   }  
                       
                 } catch (RuntimeException $e) {
                
                    echo $e->getMessage();
                
                }
                echo"Registered Sucessfully"; 
                }
                foreach($error as $err){
                    echo"<p>$err</p>";
                }
                }
 
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMIDABLES SIGN UP</title>
</head>
<body id="bodreg">

    <ul class="menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="admin/admin_login.php">ADMIN</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="">Contact US</a></li>
                <li><a href="">About</a></li>
                </ul>
           
    
  <link rel="stylesheet" type="text/css" href="signup.css"> 
<body>
    <div class="container">
       
    <div class="top-heading">
   
        <h1>Create your  <span class="text-purple">Formidables Account!</span>  </h1>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="parent">
            <div class="for-1">
                <label for="firstname">Firstname</label>
                <input type="text"  name="fname" placeholder="PED">
               
            </div>
            <div class="for-1">
                <label for="lastname">Lastname </label>
                <input type="text" name="lname" placeholder="DOE">
               
            </div>
        </div>
   
        <div class="l">
        <label for="gender">Gender</label>
            <p>Male
            <input type="radio" name="gender" value="M">
            Female
            <input type="radio" name="gender" value="F">
</p>
        </div>
        <div class="for-1">
                <label for="dob">Date of Birth</label>
               <input type="date" name="dob">
               
            </div>
        <div class="form-goup">
            <label for="email">E-mail</label>
            <input type="email" name="mail" placeholder="ped@gmail.com">
        </div>
        
        <div class="form-goup">
            <label for="phoneno">Phone number</label>
            <input type="text" name="phone" placeholder="+234">
        </div>
        <div class="form-goup">
            <label for="uid">UID</label>
            <input type="text" name="uid" placeholder="67542233781100993">
        </div>
        <div class="form-goup">
            <label for="currentign">IGN</label>
            <input type="text" name="ign" placeholder="WarCODM">
        </div>
       

        <div class="form-goup">
            <label for="username">Username</label>
            <input type="text" name="usname" placeholder="User">
        </div>

        <div class="form-goup">
            <label for="password">Password</label>
            <input type="password"  name="pword" placeholder="At least 8 characters">
        </div>
        <div class="form-group">
    <label for="iamge">image</label>
    <input type="file" name="image">
</div>

  

    <div class="footer">
    
        <p class="terms">By creating an account on Formidables, you agree to the <a href="">Terms &</a>  <a href="">condition</a></p>
        <input type="submit" class="last" name="submit" value="Create Formidables Account">
        <p class="signIn">Already have an account? <a href="login.php">Sign in</a></p>
    </div>
    
</div>

</form>
</body>
</html>
