<?php 
        include("../db/db_config.php");
        session_start();
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="admin_login.css">  
    <title>Formidables| sign in</title>
   
</head>
<ul class="menu">
                <li><a href="../index.html">Home</a></li>
               
                <li><a href="../login.php">Login</a></li>
                <li><a href="contactus.html">Contact US</a></li>
            
                <li><a href="">About</a></li>
            </ul>
            <?php 
   
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
            $insert=mysqli_query($db, "SELECT * from admin WHERE Username
            ='".$Username."'AND Password='".$Password."'") or die(mysqli_error($db));
          $row=mysqli_fetch_array($insert);
            if(is_array($row)){
             
                $_SESSION["admin_id"] = $row['admin_id'];
                $_SESSION["Username"]=$row['Username'];
                
              }
              else{
  
                echo"<p>The Username and Password are incorrect</p>";
              }
              if(isset($_SESSION["admin_id"])) {
                header("Location:admin_home.php");
                }
      } 
      foreach($error as $err){
        echo"<p id='php'>$err</p>";
        }

         }
        ?>
<body>

    <div class="container">
       
        <div class="signin">
            <img src="../images/Formidables-01.jpeg" alt="">
            <h1>ADMIN LOGIN</h1>
    
        </div>
        <div class="content">
            <form  action="" method="post">
                <div class="form-group">
                    <label for="" class="label-1">Username  </label>
                    <input type="text" name="usname" placeholder="">
                </div>
                <div class="form-group">
                    <label for="" class="label-1">Password </label>
                    <input type="password" name="pword" placeholder="">
                </div>
            

            <footer>
                <input id="inpp" type="submit" name="submit" value="SIGN IN">
            </footer>

            </form>
        </div>
    </div>
    
    
</body>
</html>