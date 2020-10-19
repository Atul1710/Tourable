<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>boiii</title>
</head>
<body>
     <form action="uploadMultiple.php" method="post" enctype="multipart/form-data">
          <input type="file" name="files[]" multiple>
          <button type="submit" name="submit">
               Upload
          </button>
          <br>
          Enter name of location:<input type="text" name="Name" id = "Name">
     </form>
</body>
</html>