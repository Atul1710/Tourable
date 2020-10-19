<?php
    $conn = new mysqli("localhost","root","","tourable");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      } 


    if(isset($_POST['submit']))
        $file = $_FILES['file'];
        
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $name = $_POST['Name'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));  

        $allowed = array('jpg','jpeg','png');
        
        if(in_array($fileActualExt, $allowed))
        {
            if($fileError == 0)
            {
                if($fileSize < 1000000){
                    $fileNameNew = uniqid('',true).".".$fileActualExt;
 
                    $fileDestination = 'test_uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $name = $_POST["Name"];
                    $sql = "INSERT INTO locations (Name) VALUES ('$name')";
                    if(mysqli_query($conn, $sql))
                    {
                        echo "Table updated!";
                    }
                }
                else{
                    echo "Too big!";
                }
            }
            else{
                echo "Error!";
            }
        }
        else{
            echo "Cannot upload this file type!";
        }

        mysqli_close($conn);
?>