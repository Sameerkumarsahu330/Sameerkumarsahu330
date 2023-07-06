<?php

include 'dbconn.php';
$showAlert = false;

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$slno = $_POST["slno"];
	$name = $_POST["name"];
	$age = $_POST["age"];
	$gender = $_POST["gender"];
	$address = $_POST["address"];
	$mail = $_POST["mail"];
	$phone = $_POST["phone"];

	$update = "UPDATE `users` SET `name` = '$name', `age` = '$age', `gender` = '$gender', `address` = '$address', `mail` = '$mail', `phone` = '$phone', `dt` = current_timestamp() WHERE `users`.`serialnumber` = '$slno';";
	$result = mysqli_query($conn, $update);
		if($result){
			$showAlert = true;
		}
}

if($showAlert){
	echo '<div class="alert alert-success alert-dismissible">
			<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
			<strong>Success!</strong>User details have been updated successfully
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

		<form action="edituser.php" method="post">
  		  <input type="text" class="form-control" name="slno" placeholder="Enter Serial No">
  		  <br>
		  <input type="text" class="form-control" name="name" placeholder="Enter name">
		  <br>
		  <input type="text" class="form-control" name="age" placeholder="Enter age">
		  <br>
		  <select class="form-select" name="gender">
		  <option value="Male">Male</option>
		  <option value="Female">Female</option>
		  <option value="Transgender">Transgender</option>
		  </select>
		  <br>
		  <textarea class="form-control" name="address" placeholder="Enter your address"></textarea>
		  <br>
		  <input type="email" class="form-control" name="mail" placeholder="Enter your mail">
		  <br>
		  <input type="tel" class="form-control" name="phone" placeholder="Enter your number">
		  <br>
		  <button type="submit" class="btn btn-primary float-end">Save</button>
  		</form>
</body>';
?>