<?php
    session_start();
    $_SESSION['user'] = $_POST['UserID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="css/new.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <!-- <img src="bg.jpg" alt="" class="bg-image"> -->
    <?php
    if(isset($_SESSION['user'])) {
        // echo '<script type = "text/javascript"> alert("' . $_SESSION["user"] . '")</script>';
    }
    ?>
    <script>
        alert("Logged In Successfully!");
        
        function destroy() {
            session_destroy();
        }
    </script>
</head>
<body>
    <div class = "black-bg-transparent">
    <header>
        <div class = "main">
            <ul>
                <li class="active"><a href="homepage.html" onclick=destroy()>Logout</a></li>
                <li><a href="Tourable_pages/image-storage-display.php">Location Display</a></li>
                <li><a href="Tourable_pages/UserInfo.php"><img class="userlogo" src="Tourable_pages/images/user-logo.png">User Info</a></li>
                <form action="homepage.html"></form>
            </ul>
        </div>
    </header>
        
        <div class="wrap">
            <div class = "search-text">
                Search for a place you think will be interesting!
            </div>
            <br>
            <div class="search">
               <input type="text" class="searchTerm" placeholder="What are you looking for?">
               <button type="submit" class="searchButton">
                 <i class="fa fa-search">search</i>
              </button>
            </div>
         </div> 

</div>
</body>
</html>