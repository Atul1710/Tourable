<?php
// Include the database configuration file
include 'dbConfig.php';

$statusMsg = '';



// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

//Upload location name and description

if(isset($_POST["submit"]))
{
    $name = $_POST["loc_name"];
    $desc = $_POST["desc"];
    if(!empty($name) && !empty($desc))
    {   
        // $num = mysqli_num_rows(mysqli_query($db, "SELECT * from locations where (Name = $name)"));
        // if($num > 0)
        // {
        //     echo "Name already taken";
        // }
        // else
        // { }
        // $insert1 = $db->query("INSERT into locations (Name) VALUES ($name)");
        $insert1 = $db->query("INSERT into locations (Name, Description) VALUES ('$name', '$desc')");
        $sql1 = $db->query("SELECT LocID from locations where `Name` = '$name'");
        $id1 = mysqli_fetch_array($sql1);
        $locID = $id1['LocID'];
        echo "First operation done!\n";
        if(mysqli_query($db,$insert1))
        {
            echo "Entered successfully!\n";                
        }
    }


    // $desc = $_POST["desc"];
    //  if(!empty($desc))
    // {
    //     $insert2 = $db->query("INSERT into locations (Description) VALUES ($desc)");
    //     if($insert2)
    //     {
    //         echo "Description entered!\n";
    //     }
    // }


    if(!empty($_FILES["file"]["name"]))
    {
        // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes))
    {
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database  
            $insert = $db->query("INSERT INTO location_images (LocID, loc_image) VALUES ('$locID','$fileName')");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }
        else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
        echo $statusMsg; 
    }
}
    else
    {
        echo "Enter valid username";
    }


// if(isset($_POST["submit"]))
// {
//     $desc = $_POST["desc"];
//     if(!empty($desc))
//     {
//         $insert1 = $db->query("INSERT into locations (Name) VALUES ($desc)");
//     }
//     else{
//         echo "Enter valid username";
//     }
// }




// if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
//     // Allow certain file formats
//     $allowTypes = array('jpg','png','jpeg','gif','pdf');
//     if(in_array($fileType, $allowTypes)){
//         // Upload file to server
//         if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
//             // Insert image file name into database
//             $insert = $db->query("INSERT INTO locimages (Image_Name) VALUES ($fileName)");
//             if($insert){
//                 $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
//             }else{
//                 $statusMsg = "File upload failed, please try again.";
//             } 
//         }else{
//             $statusMsg = "Sorry, there was an error uploading your file.";
//         }
//     }else{
//         $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
//     }
// }else{
//     $statusMsg = 'Please select a file to upload.';
// }
// echo $statusMsg;

// Display status message
// echo $statusMsg;
    require "mapLocation.php";
?>


