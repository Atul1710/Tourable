<?php
	require "dbConfig.php";
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php 
if(isset($_POST['submit_btn']))
{
    $LOCID = $_POST['locID']; 
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    if((11.59839 >= $lat && $lat >= 11.516796 && $long >= 92.204612 && $long <= 92.277417) || ($lat >= 37.307997 && $lat <= 37.205069 && $long >=-115.852784 && $long <= -115.741832))
	{
		echo "<script type='text/javascript'>alert('Location is invalid');</script>";
	}
	else
	{
    	$insert = $db->query("UPDATE locations set MapLat = $lat, MapLong = $long where LocID = '$LOCID'");
		if($insert)
		{
			// echo "<script type='text/javascript'>alert('Location is valid');</script>";?>
			<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<!-- <link rel="stylesheet" href="css/successpage.css"> -->
				<title>Success!</title>
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
				<style>
					body {
						font-family: 'Open Sans', sans-serif;
						background-image: url("images/bg1.png");
						background-repeat: no-repeat;
						background-size: cover;
						font-size: 60px;
					}

					.button-container {
						background-color: #28e044;
						/* vertical-align: middle; */
						/* margin: auto; */
						position: absolute;
						top: 50%;
						left: 50%;
						padding: 20px;
						border-radius: 15px;
						transform: translate(-50%, -50%);
						width: fit-content;
					}

					.line-anim {
						width: 50px;
						height: 2px;
						background-color: black;
					}

					.black-bg-transparent {
						background-color: black;
					}
				</style>
			</head>
			<body>
				<div class="button-container">
					Success!
				</div>
				<div>
					<a class="btn btn-success" href="../newhomepage.php">Back to Homepage</a>
				</div>
			</body>
		
		<?php }
		else{
		echo "Error in inserting!";
		}
  	}
}
?> 

</html>