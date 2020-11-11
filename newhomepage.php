<?php
    include "Tourable_pages/dbConfig.php";
    // if(isset($_POST['submit_BTN'])){
    //     session_start();
    //     $_SESSION['userID'] = $_POST['UserID'];
    //     $_SESSION['uname'] = $_POST['uname'];
    // }
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="css/homepage.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery UI
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->

    <?php
    // if(isset($_SESSION['user'])) {
        // echo '<script type = "text/javascript"> alert("' . $_SESSION["user"] . '")</script>';
    // }
    ?>
    <script>
        // alert("Logged In Successfully!");
        
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
                <li><a href="Tourable_pages/image-storage-display.php">Location Input</a></li>
                <!-- <form action="UserInfo.php" method="POST"> -->
                <li><a href="Tourable_pages/UserInfo.php">User Info <img src="Tourable_pages/images/user-logo.png" alt="" class="userlogo"></a></li>
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
                <form action="Tourable_pages/list-locations.php" method="POST">
                <!-- <input type="text" class="searchTerm" placeholder="What are you looking for?" class="search-box" id="search-box" name="search-box"> <br> -->
                <div class="md-form mt-0">
                    <input class="form-control" type="text" placeholder="What are you looking for?" aria-label="Search" id="search-box" name="search-box">
                </div>
                <button type="submit" class="searchButton" name="submit1">
                    <i class="fa fa-search">search</i>
                </button>
              </form>

            </div>            
         </div> 

</div>


</body>
</html>