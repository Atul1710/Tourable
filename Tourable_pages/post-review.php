<?php
    require "display-page.php";
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
    
    if(isset($_POST['visit'])){
        
    }
?>