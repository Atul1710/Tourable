<?php
    require 'dbConfig.php'
?>
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

        .upload-box {
            width: 50%;
            margin-top: 90px;
            margin-bottom: 90px;
            position: absolute;
            top: 50%;
            left: 50%;
            padding: 50px;
            transform: translate(-50%, -50%);
            background-color: rgba(40, 40, 40, 0.8);
            color: white;
        }

        .upload-box h1 {
            float: left;
            font-size: 50px;
            border-bottom: 6px solid #8D8741;
            margin-bottom: 50px;
            padding: 13px;
            color: white;
        }

        .tb-1{
            width: 100%;
        }   
       
        td {
            padding: 15px;
            text-align: left;
        }

        /* input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            background-color: #f8f8f8;
            border: 2px solid #ccc;
            box-sizing: border-box;
        } */

        .textbox {
            width: 100%;
            overflow: hidden;
            font-size: 20px;
            padding: 8px;
            margin: 8px;
            border-bottom: 1px solid #8D8741;
        }

        .textbox input, textarea {
            border: 1px solid darkgray;
            outline: none;
            background: none;
            color: white;
            font-size: 18px;
            position: relative;
            width: 70%;
            left: 50%;
            margin-top: 10px;
            transform: translateX(-50%);
            padding: 12px
        }

        #desc-box{
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            /* background-color: #f8f8f8; */
            border: 2px solid #ccc;
            box-sizing: border-box;
        }

        .btn {
            position: relative;
            left: 50%;
            transform: translateX(-50%);
            padding: 5px;
            width: 100%;
            background: none;
            border: 2px solid #8D8741;
            color: white;
            font-size: 20px;
            cursor: pointer;
            margin: 4px 0;
            transition: 0.2s ease;
        }

    </style>
    <!-- // Include the database configuration file -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image storage and display</title>
</head>
<body> 
    <div class="upload-box">
        <h1>Upload image to be stored</h1>
    <form action="mapLocation.php" method="post" enctype="multipart/form-data" class="location-form" autocomplete="off">
    <table class="tb-1">
        <tr class="textbox">
            <td>
                Select Image File to Upload:
            </td>
            <td>
                <input type="file" name="file" id = "file_name" required>
            </td>
        </tr>

        <tr class="textbox">
            <td colspan="2">
                Enter name of location: 
                <input type="text" name = "loc_name" id="loc_name" placeholder="Ex: Iron Pillar, Le Passe Muraille, Headington Shark, etc." required>
            </td>
        </tr>

        <tr class="textbox">
            <td colspan="2">
                Description:
                <!-- <input type="text" name="desc" id = "desc-box"> -->
                <textarea name="desc" id="desc-box" cols="30" rows="5" required></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name = "submit" id = "submit" class="btn" value="Proceed to location coordinates upload" class="submit-btn">
            </td>
        </tr>
    </table>
    </form>
    <button class="btn" onclick="history.back()" style="width: 96%;">Back</button>
</div>
</body>
</html>