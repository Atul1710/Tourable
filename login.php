<?php
    require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "css/login-style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
 </head>
 <!--
<body style = "background-color:#ecf0f1">
    <div id="main-wrapper"> 
        <center><h1>LOGIN FORM</h1></center>
        <center><img src="images/userimage.png" class="avatar"></center>

        <form class="myform" action="login.php" method = "POST">
            <label>Username</label><br>
            <input type="text" class = "inputvalues" placeholder="Type your username" name="Username"><br>
            <label>Password</label><br>
            <input type="password" class = "inputvalues" placeholder = "Type your password" name="Password"><br>
            <input type="submit" id = "login_btn" value = "Login" name="submit_btn"><br>
            <a href = "register.php"><input type="button" id = "register_btn" value = "Register"></a>
        </form>               
    </div> -->
    <div class="login-box">
  <h1>Login</h1>
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" placeholder="Username">  
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" placeholder="Password">
  </div>

  <input type="button" class="btn" value="Sign in">
  <input type="button" class="btn" value="Sign Up">
</div>
<?php
     if(isset($_POST['submit_btn']))
     {
         $con = mysqli_connect("localhost","root","","logindb"); 
         if($con->connect_error)
             {
                 die("Connection Failed:".$con->connect_error);
             }
             $username = $_POST["Username"];
             $password = $_POST["Password"];          
             
             $query = "SELECT* FROM userinfo where Username = '$username' and password = '$password'";
             $query_run = mysqli_query($con,$query);

             if(mysqli_num_rows($query_run)>0)
             {
                 $_SESSION['Username'] = $username;
                 header('location:newhomepage.php');
             }
             else
             {
                echo '<script type = "text/javascript"> alert("Invalid Credentials")</script>';
             }
    }

?>
</body> 
</html>