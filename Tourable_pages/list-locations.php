<!DOCTYPE html>
<html lang="en">

<?php 
    session_start();
    $name = "";
    if(isset($_POST['submit1'])){
        $name = $_POST['search-box'];
    }
?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/homepage.css">
    <title>List locations</title>
</head>

<!-- CSS -->
<style>
    .IMAGE{
        width: 200px;
        height: 200px;
    }

    .checked{
        color: orange;
    }


</style>


<body>
<div class = "black-bg-transparent">
        <div class = "main">
            <ul>
                <li class="active"><a href="homepage.html" onclick=destroy()>Logout</a></li>
                <li><a href="image-storage-display.php">Location Input</a></li>
                <li><a href="UserInfo.php">User Info <img src="images/user-logo.png" alt="" class="userlogo"></a></li>
                <form action="homepage.html"></form>
            </ul>
        </div>
        </div>


<!-- PHP - to get product details -->
<?php 
    include "dbConfig.php";
    // if(isset($_POST['submit1'])){
        // $name = "Lakshadweep";

        $sql = "SELECT * from locations where Name = '$name'";
        $sqlTest = "SELECT * from locations where NAME like '". $name ."'%";
        $result = $db->query($sql);
        while($row = $result->fetch_assoc()){
            $des = $row['Description'];
            $desQuery = "SELECT LEFT('$des', 20)"; //gets 20 characters from description
            $desRes = $db->query("$desQuery");
?>

<div class="container py-2">
        <br>
        <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group">
                <!-- list group item-->
                <li class="list-group-item">
                        <div class="media align-items-lg-center flex-column flex-lg-row p-0">
                            <div class="media-body order-2 order-lg-1">                          

                                <a href="display-page.php" style="color: black"><h5 class="mt-0 font-weight-bold mb-2"><?php echo $row['Name'];?></h5></a>
                                <p class="font-italic text-muted mb-0 small"><?php echo $des; ?></p>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <form action="display-page.php" method="POST">
                                        <input type="hidden" value="<?php echo $name; ?>" name="name">
                                        <input type = "submit" class ="btn btn-success" style="color:black;" value="visit" name="visit">
                                    </form>
                                    <ul class="list-inline small">
                                        <!-- <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                        <li class="list-inline-item m-0"><i class="fa fa-star-o text-gray"></i></li> -->
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </ul>
                                </div>
                            </div><img src="uploads/beach.jpeg" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                    </div> <!-- End -->
        </div>
        </div>
        
</div>

        <?php } 
        
        // }
        ?>
</body>

</html>