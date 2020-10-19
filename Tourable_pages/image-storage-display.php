<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <style>
        body{
            background-image: url('images/bg1.jpeg');
            background-repeat: no-repeat;
            background-size:cover;
            justify-content: center;
            font-family: 'Roboto', sans-serif;
        }

        .black-bg-transparent{
            background-color: rgba(40,40,40,0.3);
        }

        .container-1{   
            margin: 0 auto;
            background-color: #e8ddd5;
            border-radius: 25px;
            border: 2px solid #a1541a;
            padding: 20px; 
            height: 500px; 
            width: 50%; 
            opacity: 0.8;
        }

        .tb-1{
            width: 100%;
        }   
       td {
        padding: 15px;
        text-align: left;
        }

        input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        background-color: #f8f8f8;
        border: 2px solid #ccc;
        box-sizing: border-box;
        }

        #desc-box{
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            background-color: #f8f8f8;
            border: 2px solid #ccc;
            box-sizing: border-box;
        }

    </style>
    <!-- // Include the database configuration file -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image storage and display</title>
</head>
<body>
    <center><h1>Upload image to be stored</h1></center>
    <hr>
    <?php
    include 'dbConfig.php'
    ?>    
    
<div class="container-1">
    <form action="upload1.php" method="post" enctype="multipart/form-data" class="location-form" autocomplete="off">
    <table class="tb-1">
        <tr>
            <td>
            Select Image File to Upload:
            <input type="file" name="file">
            </td>
        </tr>

        <tr>
            <td>
            Enter name of location: 
            <input type="text" name = "loc_name">
        </td>
        </tr>

        <tr>
            <td>
            Texts to upload:
            <!-- <input type="text" name="desc" id = "desc-box"> -->
            <textarea name="desc" id="desc-box" cols="30" rows="10"></textarea>
            <input type="submit" name = "submit" value="Proceed to location coordinates upload" class="submit-btn">
        </td>
        </tr>
    </table>
    </form>
</div>
</body>
</html>