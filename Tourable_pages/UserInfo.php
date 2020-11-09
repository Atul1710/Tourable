<?php
    require 'dbConfig.php';
    session_start();
    // if(isset($_SESSION['user'])) {
        $uid = $_SESSION['uid'];
        $query = "SELECT * FROM user WHERE UID = '$uid'";
        $query_run = mysqli_query($db, $query);
        if(mysqli_num_rows($query_run) > 0) {
            $userdetails = mysqli_fetch_assoc($query_run);
        }
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../css/homepage.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class = "main">
            <ul>
                <li class="active"><a href="../newhomepage.php">Logout</a></li>
                <li><a href="image-storage-display.php">Location Input</a></li>
                <li><a href="../newhomepage.php">Back</a></li>
                <form action="homepage.html"></form>
            </ul>
        </div>
    </header>
        

    <div class="details">
        <img src="images/user-logo.png" alt="">
        <table>
            <tr>
                <th>Name:</th>
                <td><?php echo $userdetails["Name"]; ?></td>
            </tr>
            <tr>
                <th>Gender:</th>
                <td><?php echo $userdetails["Gender"]; ?></td>
            </tr>
            <tr>
                <th>Date of Birth:</th>
                <td><?php echo $userdetails["DOB"]; ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?php echo $userdetails["Email"]; ?></td>
            </tr>
            <tr>
                <th>Contact:</th>
                <td><?php echo $userdetails["Contact"]; ?></td>
            </tr>
            <?php if ($userdetails["Moderator"]) {?>
            <tr  class="mod-row">
                <td colspan="2">(Moderator)</td>
            </tr>
            <?php } ?>

        </table>
    </div> 

</body>
</html>