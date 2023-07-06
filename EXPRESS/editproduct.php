<?php

include 'dbconn.php';
$showAlert = false;

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$pid = $_POST["pid"];
	$category = $_POST['category'];

	$productimage = $_FILES['productimage']['tmp_name'];
    $uploaded_file_name = basename($_FILES["productimage"]["name"]);
    $file_path = "Product_images/".$uploaded_file_name;
    move_uploaded_file($productimage, $file_path);
	$productname = $_POST['productname'];
	$productprice = $_POST['productprice'];
	$productinfo = $_POST['productinfo'];
	$productquantity = $_POST['productquantity'];

	$update = "UPDATE `products` SET `Category` = '$category', `ProductImage` = '$file_path', `ProductName` = '$productname', `ProductPrice` = '$productprice', `ProductInfo` = '$productinfo', `ProductQuantity` = '$productquantity' WHERE `products`.`ProductID` = '$pid';";
	$result = mysqli_query($conn, $update);
		if($result){
			$showAlert = true;
		}
}

if($showAlert){
	echo '<div class="alert alert-success alert-dismissible">
			<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
			<strong>Success!</strong>Product details have been updated successfully
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

		<form action="editproduct.php" method="post"  enctype="multipart/form-data">
  		  <input type="text" class="form-control" name="pid" placeholder="Enter Product ID">
  		  <br>
		  <select class="form-select" name="category">
			<option value="Processor">Processor</option>
			<option value="Motherboard">Motherboard</option>
			<option value="RAM">RAM</option>
			<option value="Memory">Memory</option>
			<option value="Graphics card">Graphics card</option>
			<option value="Cabinet">Cabinet</option>
			<option value="PSU">PSU</option>
			<option value="Cooler">Cooler</option>
		  </select>
		  <br>
		  <input type="file" class="form-control" name="productimage" placeholder="Product Image">
		  <br>
		  <input type="text" class="form-control" name="productname" placeholder="Product Name">
		  <br>
		  <input type="text" class="form-control" name="productprice" placeholder="Product Price">
		  <br>
		  <input type="number" class="form-control" name="productquantity" placeholder="Product Quantity">
		  <br>
		  <textarea type="text" class="form-control mt-3" rows="3" name="productinfo" placeholder="Product Details"></textarea>
		  <br>
		  <button type="submit" class="btn btn-primary float-end">Save</button>
  		</form>
</body>';
?>