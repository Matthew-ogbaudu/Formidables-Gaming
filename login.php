<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<link rel="stylesheet" type="text/css" href="login.css">
<body>
<ul class="menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="admin/admin_login.php">ADMIN</a></li>
                <li><a href="contactus.php">Contact US</a></li>
                <li><a href="about.php">About</a></li>
                </ul>

<?php
  session_start();
 include("db/db_config.php");
 

  if(isset($_POST['submit']))
   {   
      $error=array();
    if(empty($_POST['usname'])){
                 $error['username']="USERNAME MISSING";
         }else{
           $Username=mysqli_escape_string($db,$_POST['usname']);
         }
    if(empty($_POST['pword'])){
      $error['password']="PASSWORD MISSING";

    }else{
      $Password=mysqli_real_escape_string($db,$_POST['pword']);
    }
    if(empty($error)){
  
            $insert=mysqli_query($db, "SELECT Username, Password from register WHERE Username
             ='".$Username."'AND Password='".$Password."'") or die(mysqli_error($db));

            if(mysqli_num_rows($insert)==1){
              $_SESSION["Logged_in"]=true;
              $_SESSION["Username"]=$Username;
              header("location: login_home.php");
            }
            else{

              echo"<p>The Username and Password are incorrect</p>";
            }
    } 
    foreach($error as $err){
      echo"<p>$err</p>";
      }
    }?>
    
    <div class="container-1">
    <form action="" method="post">
        <div class="container">
            <div class="heading">
                <img src="./logomain.png" alt="">
                <h2 class="bold">  FORMIDABLES  </h2>
                <h2 class="light">LOGIN <span class="span-color"></span></h2>
            </div>
           
            <div class="content">
                
                    <input type="username" name="usname" placeholder="Username">
                    <input type="password" name="pword"  placeholder="Password">
               
            </div>
            <footer>
                <input class="login-btn" type="submit" name="submit" value="LOGIN"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; 
        
                <p class="new-account">New Accouunt?<a href="signup.php">create new account!</a></p>
            </footer>
            </form>
         
    
            
        </div>
        <div class="container-2">
            
        </div>
     
    </div>
    

    

    
</body>
</html>
