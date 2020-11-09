<?php 
    session_start();
    if(isset($_POST['submitBTN'])){
        $_SESSION['userID'] = $_POST['UserID'];
    $userID = $_SESSION['userID'];
    }
?>