<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image storage and display</title>
</head>
<body>
    <center><h1>Upload image to be stored</h1></center>
    <hr>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>
<br><br>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Texts to upload
    <input type="text" name="text">
    <input type="submit" name="submit" value="UploadText">
</form>
<hr>
<br>
<?php
// Include the database configuration file
include 'dbConfig.php';

// Get images from the database
$query = $db->query("SELECT * FROM locations");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["location_name"];
?>
    <img src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>
</body>
</html>