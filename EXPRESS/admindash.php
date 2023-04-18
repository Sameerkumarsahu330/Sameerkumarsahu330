<?php
include 'dbconn.php';
$showAlert = false;
$showError = false;

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $loggedin = true;
    $username = $_SESSION['userName'];
}
else{
    $loggedin = false;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$productid = $_POST['productid'];
	$category = $_POST['category'];

	$productimage = $_FILES['productimage']['tmp_name'];
    $imgContent = addslashes(file_get_contents($productimage));
	$productname = $_POST['productname'];
	$productprice = $_POST['productprice'];
	$productinfo = $_POST['productinfo'];
	$productquantity = $_POST['productquantity'];

	//Check whether this product exists
    $existSql = "SELECT * FROM products WHERE ProductID = '$productid'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);

    if($numExistRows > 0){
        $showError = "Product already exists,add another product";
        
    	}
    else{
        $sql = "INSERT INTO `products` (`ProductID`, `Category`, `ProductImage`, `ProductName`, `ProductPrice`, `ProductInfo`, `ProductQuantity`, `dt`) VALUES ('$productid', '$category', '$imgContent', '$productname', '$productprice', '$productinfo','$productquantity', current_timestamp());" ;
        $result = mysqli_query($conn, $sql);
	        if($result){
	            $showAlert = true;
	        }
	    	else{
	        	$showError = "Some error occured while adding product";
	        }
    	}
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
    <style>
        .header>a {
            font-size: 1.5rem;
            margin-left: 2rem;
            transition:all 1s;
        }

        .header>a:hover {
            box-shadow: 0 0 8px 0 black;
            border-radius:0.2rem;
        }

        .material-symbols-outlined{
            position: relative;
            top: 6px;
        }

        li a,
        .card a {
            text-decoration: none;
        }

        @media (max-width:750px) {
        		.navbar-nav{
        			position:absolute;
        			top:-4rem;
        			left:-45%;
        		}
        }


        @media (max-width:1400px) {
            .navbar-nav {
                position: relative;
                right: 54%;
            }
        }
    </style>
</head>';


//----------------------------Header---------------------------------

echo '
<body style="overflow-x: hidden;z-index: 1;">

    <div class="navbar navbar-expand-md bg-light sticky-top">
        <div class="container-fluid">
            <div class="navbar-brand">
                <img src="logo.png" alt="Brand logo" width="40px" height="40px"><span class="ms-2 text-primary h2">EXPRESS</span>
            </div>
    
            <div class="container" style="position: relative;left:80%;">
                <ul class="navbar-nav">';

                    if(!$loggedin){
                    echo '
                    <li class="header nav-item text-center"><a class="nav-link text-primary" href="login.php">Login</a></li>';
                    }

                    else{
                    echo '
                    <li class="header nav-item text-center"><a class="nav-link text-primary" href="logout.php">Logout</a></li>';
                    }
                    echo '
                </ul>
            </div>
        </div>
    </div>';


//----------------------------Dashboard---------------------------------


if($showAlert){
	echo '<div class="alert alert-success alert-dismissible">
			<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
			<strong>Success!</strong>Product has been added successfully
		  </div>';
}

echo '<h1 class="text-center mt-2">Welcome ' . $username .'</h1>';
include 'see.php';

echo '
<div class="container">
	<h3>Add Product</h3>
	<form action="admindash.php" method="post" enctype="multipart/form-data" class="bg-info p-3">
		<div class="row">

			<div class="col-md mt-1">
				<div class="col-md input-group mt-3">
					<input type="text" class="form-control" name="productid" placeholder="Product ID">
				</div>
				<div class="input-group mt-3">
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
				</div>
				<div class="input-group mt-3">
					<input type="file" class="form-control" name="productimage" placeholder="Product Image">
				</div>
				<div class="input-group mt-3">
					<input type="text" class="form-control" name="productname" placeholder="Product Name">
				</div>
				<div class="input-group mt-3">
					<input type="text" class="form-control" name="productprice" placeholder="Product Price">
				</div>
				<div class="input-group mt-3">
					<input type="number" class="form-control" name="productquantity" placeholder="Product Quantity">
				</div>
			</div>

			<div class="col-md mt-1">
				<div class="input-group">
					<textarea type="text" class="form-control mt-3" rows="12" name="productinfo" placeholder="Product Details"></textarea>
				</div>
			</div>

		</div>
		<div class="container text-center">
			<button type="submit" class="btn btn-primary col-md-1 m-3">Add</button>
		</div>
	</form>
</div>';

//All available products

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);

if($rows > 0){
	echo '	<div class="container">
		<h2 class="text-center mt-5">Products</h2>
		<table class="table table-hover table-bordered mt-3 bg-info">
		<tr>
		<th>ProductID</th>
		<th>Category</th>
		<th>Product Name</th>
		<th>Price</th>
		<th>Product Details</th>
		<th>Quantity</th>
		</tr>';

	while($row = mysqli_fetch_assoc($result)){

		$productid = htmlspecialchars($row['ProductID']);
	    $category = htmlspecialchars($row['Category']);
	    $productname = htmlspecialchars($row['ProductName']);
	    $productprice = htmlspecialchars($row['ProductPrice']);
	    $productinfo = htmlspecialchars($row['ProductInfo']);
	    $productquantity = htmlspecialchars($row['ProductQuantity']);

		echo '<tr><td>' . $productid .'</td>' . '<td>' . $category .'</td>' . '<td>' . $productname . '</td>' . '<td>' . $productprice . '</td>' . '<td>' . $productinfo . '</td><td>' . $productquantity . '</td></tr>';
	}
	echo '</table></div>';
}

else{
	echo 'Unknown error occured';
}

// close connection
mysqli_close($conn);
?>