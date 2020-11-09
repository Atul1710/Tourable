<?php
    require 'Tourable_pages/dbConfig.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/homepage.css">
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
  <form action="login.php" method="POST">
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" name="Username" placeholder="Username" autocomplete="off">  
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" name="Password" placeholder="Password">
  </div>
  <input type="text" id="UserID" name="UserID" hidden>

  <input type="submit" class="btn" name="submit_btn" value="Sign in">
  <input type="submit" class="btn" value="Sign Up">
  </form>
</div>
<?php
     if(isset($_POST['submit_btn']))
     {
        //  $con = mysqli_connect("localhost","root","","logindb"); 
        //  if($con->connect_error)
            //  {
                //  die("Connection Failed:".$con->connect_error);
            //  }
            $username = $_POST["Username"];
            $password = $_POST["Password"];          
            
            $query = "SELECT * FROM Login WHERE Username = '$username' and Password = '$password'";
            $query_run = mysqli_query($db, $query);

            if(mysqli_num_rows($query_run) == 1)
            {
                // session_start();
                // echo '<script type = "text/javascript"> alert("started")</script>';
                // $_SESSION["user"] = mysqli_fetch_row($query_run)[0];
                $uid = mysqli_fetch_row($query_run)[0];
                session_start();
                $_SESSION['uname'] = $username;
                $_SESSION['uid'] = $uid;
                // echo '<script type = "text/javascript"> alert("' . $uid . '")</script>';
                ?>
                <form id="user_login" method="POST" action="newhomepage.php"> 
                    <input type="text" name="UserID" id="UserID" value="<?php echo $uid; ?>">
                    <input type="text" name="uname" id="uname" value = "<?php echo $username; ?>">
                    <input type="submit" name="submit_BTN">
                </form>
                <script>
                    document.getElementById('user_login').submit();
                </script>
                <?php
                // header('location:newhomepage.php?userid=' . $uid);
            }
            else
            {
                echo '<script type = "text/javascript"> alert("Invalid Credentials")</script>';
            }

    }

?>
</body> 
</html>