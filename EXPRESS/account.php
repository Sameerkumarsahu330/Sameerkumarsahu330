<?php
include 'header.php';
include 'dbconn.php';
$showAlert = false;

$exists = "SELECT * FROM users WHERE userName = '$username'";
$result = mysqli_query($conn, $exists);
$data = mysqli_fetch_assoc($result);


if($_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_POST["name"];
	$age = $_POST["age"];
	$gender = $_POST["gender"];
	$address = $_POST["address"];
	$mail = $_POST["mail"];
	$phone = $_POST["phone"];

	$existrow = mysqli_num_rows($result);

	if($existrow > 0){
		$update = "UPDATE `users` SET `name` = '$name', `age` = '$age', `gender` = '$gender', `address` = '$address', `mail` = '$mail', `phone` = '$phone', `dt` = current_timestamp() WHERE `users`.`userName` = '$username';";
		$result = mysqli_query($conn, $update);
		if($result){
			$showAlert = true;
		}
	}

}

if($showAlert){
	echo 
	'<div class="alert alert-success alert-dismissible">
	    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	    <strong>Success!</strong> Details has been updated
	 </div>';
}

echo '
	<div class="container p-5 pb-0 pt-3 text-center display-1">Welcome '.$data['name'].'<hr><hr></div>
	<div class="container mt-3 mb-3 ps-5"><h2>Your account information:</h2></div>
	<div class="container mb-5 ps-5">
		<table class="table table-borderless table-hover" style="width:50%;">
			<tr>
				<td>Name</td>
				<td>'.$data['name'].'</td>
			</tr>
			<tr>
				<td>Age</td>
				<td>'.$data['age'].'</td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>'.$data['gender'].'</td>
			</tr>
			<tr>
				<td>Address</td>
				<td>'.$data['address'].'</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>'.$data['mail'].'</td>
			</tr>
			<tr>
				<td>Phone</td>
				<td>'.$data['phone'].'</td>
			</tr>
		</table>
		<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">Edit your details</button>
		<a href="see.php" class="btn btn-primary">See</a>
		</div>

		<div class="offcanvas offcanvas-center" id="demo">
		  
		  <div class="offcanvas-header mt-5">
		    <h1 class="offcanvas-title">Enter your details</h1>
		    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
		  </div>

		  <div class="offcanvas-body">
		    <div class="container mt-5 floating">
		  		<form action="account.php" method="post">
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
			</div>
		  </div>

		</div>';


include 'footer.php';
?>