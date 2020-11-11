<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/display-style.css"> 
    <title>Display Location</title>
    <style>
        body{
            background-image: url("uploads/bg1.jpeg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body> 

<?php 
session_start();
include "dbConfig.php";

$uname = $_SESSION['uname']; //username
if(isset($_POST['visit']))
{
    $locname = $_POST['loc-name'];
    // echo $locname; //location name
    $sql = "SELECT * from `locations` where `Name` = '$locname'";
    $res = $db->query($sql);
    

    while($row = $res->fetch_assoc()){
        $locid = $row['LocID'];
        $SQL2 = "SELECT * from `location_images` where `LocID` = '$locid'";
        $RES2 = $db->query($SQL2);
?>
<header>
        <div class = "main">
            <ul>
                <br>
                <li>
                    <a href="list-locations.php" class="btn btn-success">Back</a>

                </li>
                <!-- <li class="active"><a href="homepage.html" onclick=destroy()>Logout</a></li>
                <li><a href="Tourable_pages/image-storage-display.php">Location Input</a></li>
                <li><a href="Tourable_pages/UserInfo.php">User Info <img src="Tourable_pages/images/user-logo.png" alt="" class="userlogo"></a></li>
                <form action="homepage.html"></form> -->
            </ul>
        </div>
    </header>

<div class="col-sm-12 col-md-12 col-lg-12">
    <!-- product -->
    <div class="product-content product-wrap clearfix product-deatil">
        <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="product-image">
                    <div id="myCarousel-2" class="carousel slide">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel-2" data-slide-to="0" class=""></li>
                            <li data-target="#myCarousel-2" data-slide-to="1" class="active"></li>
                            <li data-target="#myCarousel-2" data-slide-to="2" class=""></li>
                        </ol>
                        <div class="carousel-inner">
                            <!-- Slide 1 -->
                            <div class="item active">
                                <img src="uploads/<?php while($ROW2 = $RES2->fetch_assoc()){ echo $ROW2['loc_image']; }?>" class="img-responsive" alt="" />
                            </div>
                            <!-- Slide 2 -->
                            <div class="item">
                                <img src="https://via.placeholder.com/700x400/87CEFA/000000" class="img-responsive" alt="" />
                            </div>
                            <!-- Slide 3 -->
                            <div class="item">
                                <img src="https://via.placeholder.com/700x400/B0C4DE/000000" class="img-responsive" alt="" />
                            </div>
                        </div>
                        <a class="left carousel-control" href="#myCarousel-2" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
                        <a class="right carousel-control" href="#myCarousel-2" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-md-offset-1 col-sm-12 col-xs-12">
                <h2 class="name">
                    <?php echo $locname;?> <br>
                    <!-- <small>Product by <a href="javascript:void(0);">Adeline</a></small> -->
                    <i class="fa fa-star fa-2x text-primary"></i>
                    <i class="fa fa-star fa-2x text-primary"></i>
                    <i class="fa fa-star fa-2x text-primary"></i>
                    <i class="fa fa-star fa-2x text-primary"></i>
                    <i class="fa fa-star fa-2x text-muted"></i>
                    <!-- <span class="fa fa-2x"><h5>(109) Votes</h5></span>
                    <a href="javascript:void(0);">109 customer reviews</a> -->
                </h2>
                <hr/>
                
                
                
                <div class="description description-tabs">
                    <ul id="myTab" class="nav nav-pills">
                        <li class="active"><a href="#more-information" data-toggle="tab" class="no-margin">Location Description </a></li>
                        <!-- <li class=""><a href="#specifications" data-toggle="tab">Specifications</a></li> -->
                        <li class=""><a href="#reviews" data-toggle="tab">Reviews</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="more-information">
                            <br />
                            <strong>Description Title</strong>
                            <p>
                                <?php echo $row['Description']; ?>
                            </p>
                        </div>
                        <!-- <div class="tab-pane fade" id="specifications">
                            <br />
                            <dl class="">
                                <dt>Gravina</dt>
                                <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                                <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                                <dd>Eget lacinia odio sem nec elit.</dd>
                                <br />

                                <dt>Test lists</dt>
                                <dd>A description list is perfect for defining terms.</dd>
                                <br />

                                <dt>Altra porta</dt>
                                <dd>Vestibulum id ligula porta felis euismod semper</dd>
                            </dl>
                        </div> -->
                        <div class="tab-pane fade" id="reviews">
                            <br />
                            <form method="POST" class="well padding-bottom-10" action="display-page.php">
                                <input type= "text" class="form-control" placeholder="Write a review" name="review">
                                <input type="hidden" name="loc-name" id="loc-name" value="<?php echo $locname;?>">
                                <input type="submit" class="btn btn-sm btn-primary pull-right" value="Submit Review" name = "submit-review">

                                <div class="margin-top-10">
                                    <!-- <input type="submit" class="btn btn-sm btn-primary pull-right" value="Submit Review" name="submit-review"> -->
                                    <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Location"><i class="fa fa-location-arrow"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Voice"><i class="fa fa-microphone"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Photo"><i class="fa fa-camera"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add File"><i class="fa fa-file"></i></a>
                                </div>
                            </form>


                            <div class="chat-body no-padding profile-message">

                                <ul>

                                <?php 
                                $rev = "SELECT * from `review` where `locname` = '$locname'";
                                $revres = $db->query($rev);
                                while($revrow = $revres->fetch_assoc()){                                   
                            ?>


                                    <li class="message">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="online"/>
                                        <span class="message-text">
                                            <a href="javascript:void(0);" class="username">
                                                <?php echo $revrow['username'] ?>
                                                <!-- <span class="badge">Purchase Verified</span> -->
                                                <span class="pull-right">
                                                    <i class="fa fa-star fa-2x text-primary"></i>
                                                    <i class="fa fa-star fa-2x text-primary"></i>
                                                    <i class="fa fa-star fa-2x text-primary"></i>
                                                    <i class="fa fa-star fa-2x text-primary"></i>
                                                    <i class="fa fa-star fa-2x text-muted"></i>
                                                </span>
                                            </a>
                                            <?php echo $revrow['rev'];?>
                                            <!-- Can't divide were divide fish forth fish to. Was can't form the, living life grass darkness very image let unto fowl isn't in blessed fill life yielding above all moved -->
                                        </span>
                                        <ul class="list-inline font-xs">
                                            <li>
                                                <a href="javascript:void(0);" class="text-info"><i class="fa fa-thumbs-up"></i> This was helpful (22)</a> 
                                            </li>
                                            <li class="pull-right">
                                                <form action="display-page.php" method="POST">
                                                    <input type="hidden" name = "review" value="<?php echo $revrow['rid']; ?>">
                                                    <input type="submit" name="delete-review" class="btn btn-danger" value="Delete" value="X">
                                                </form>
                                                <!-- <button type="submit" name="delete-review" class="btn btn-danger" value="Delete">X</button> -->
                                            </li>
                                        </ul>
                                    </li>
                                    <br>

                                    <?php
                                    
                                        }
                                    ?>
                                    
                                    <!-- <li class="message">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="online" />
                                        <span class="message-text">
                                            <a href="javascript:void(0);" class="username">
                                                Aragon Zarko
                                                <span class="badge">Purchase Verified</span>
                                                <span class="pull-right">
                                                    <i class="fa fa-star fa-2x text-primary"></i>
                                                    <i class="fa fa-star fa-2x text-primary"></i>
                                                    <i class="fa fa-star fa-2x text-primary"></i>
                                                    <i class="fa fa-star fa-2x text-primary"></i>
                                                    <i class="fa fa-star fa-2x text-primary"></i>
                                                </span>
                                            </a>
                                            Excellent product, love it!
                                        </span>
                                        <ul class="list-inline font-xs">
                                            <li>
                                                <a href="javascript:void(0);" class="text-info"><i class="fa fa-thumbs-up"></i> This was helpful (22)</a>
                                            </li>
                                            <li class="pull-right">
                                                <small class="text-muted pull-right ultra-light"> Posted 1 year ago </small>
                                            </li>
                                        </ul>
                                    </li> -->

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                    <form action="ViewOnMap.php" method="POST">
                        <input type="hidden" name="lat" value="<?php echo $row['MapLat'];?>">
                        <input type="hidden" name="long" value = "<?php echo $row['MapLong']?>">
                        <input type="hidden" name="loc-name" value="<?php echo $locname;?>"> 
                        <input type="submit" class="btn btn-success btn-lg" name="visit" value="Visit!">
                        <!-- <a href="javascript:void(0);" class="btn btn-success btn-lg">Visit!</a> -->
                        </form>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="btn-group pull-right">
                            <button class="btn btn-white btn-default"><i class="fa fa-star"></i> Add to wishlist</button>
                            <!-- <button class="btn btn-white btn-default"><i class="fa fa-envelope"></i> Contact Seller</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end product -->
</div>

</body>


<?php 
    }
}

$uname = $_SESSION['uname'];
    echo $uname;
    if(isset($_POST['submit-review'])){
        $loc_name = $_POST['loc-name'];
        $review = $_POST['review'];
        echo $loc_name;
        echo $review;
        $sql = "INSERT into `review` (`username`, `locname`, `rev`) values ('$uname', '$loc_name', '$review')";
        $res = $db->query($sql);
    }
if(isset($_POST['delete-review'])){
        $reviewid = $_POST['review'];
        $sql1 = "DELETE from `review` where rid = '$reviewid'";
        $db->query($sql1);
}
?>
</html>