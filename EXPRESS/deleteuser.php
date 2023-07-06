<?php

include 'dbconn.php';
$showAlert = false;

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$slno = $_POST["slno"];

	$update = "DELETE FROM `users` WHERE `users`.`serialnumber` = '$slno'";
	$result = mysqli_query($conn, $update);
		if($result){
			$showAlert = true;
		}
}

if($showAlert){
	echo '<div class="alert alert-success alert-dismissible">
			<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
			<strong>Success!</strong>User has been deleted
		  </div>';
}

echo'
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta lang="en-us">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/x-icon" href="logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>';

 echo '
<body>

		<form action="deleteuser.php" method="post">
  		  <input type="text" class="form-control" name="slno" placeholder="Enter Serial No">
  		  <br>
		  <button type="submit" class="btn btn-primary float-end">Delete user</button>
		  <br>
  		</form>
</body>';
?>