<?php
include 'header.php';
include 'dbconn.php';
$showAlert = false;

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
}
else{
     header("location:login.php");
}

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
?>

<div class="container p-5 pb-0 pt-3 text-center display-1">MY ACCOUNT<hr><hr></div>
<div class="container mt-3 mb-3 ps-5"><h2>MY PROFILE:</h2></div>
<div class="container mb-5 ps-5">
	<table class="table table-borderless table-hover" style="width:50%;">
		<tr>
			<td>Name</td>
			<td><?php echo $data['name']?></td>
		</tr>
		<tr>
			<td>Age</td>
			<td><?php echo $data['age']?></td>
		</tr>
		<tr>
			<td>Gender</td>
			<td><?php echo $data['gender']?></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><?php echo $data['address']?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php echo $data['mail']?></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><?php echo $data['phone']?></td>
		</tr>
	</table>
	<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">Edit details</button>
</div>

<?php
	$sql = "SELECT * FROM orders WHERE userName = '$username' ORDER BY OrderDate DESC";
	$qry = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($qry);
?>

<div class="container ordertable">
	<h2>MY ORDERS:</h2>

	<?php if($num > 0){
		echo '
			<div class="row text-center mb-3 mt-4" style="font-size: 1rem;">
				<div class="col-4">ORDER ID</div>
				<div class="col-4">AMOUNT</div>
				<div class="col-4">ORDER DATE</div>
			</div>
			';
		while($row = mysqli_fetch_assoc($qry)){
			$datetime = $row['OrderDate'];
			$date = date('d-m-y',strtotime($datetime));
			echo '
			<a href="orderDetails.php?id='.$row['OrderID'].'&payment='.$row['PaymentMode'].'" class="row text-center orders" title="Click for more info">
				<div class="col-4">'.$row['OrderID'].'</div>
				<div class="col-4">&#8377; '.$row['TotalAmount'].'</div>
				<div class="col-4">'.$date.'</div>
			</a>
				';
			}
		}else{
			echo '
			<div class="row text-center mb-3 p-3">
			You do not have any orders</div>
			';
		}
	?>
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

</div>

<?php
include 'footer.php';
?>