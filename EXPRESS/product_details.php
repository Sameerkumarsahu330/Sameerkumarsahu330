<?php
include 'header.php';
include 'dbconn.php';

if (isset($_GET['id'])) {
    $productID = $_GET['id'];

    // Retrieve product details based on the product ID from the URL
    $sql = "SELECT * FROM products WHERE ProductID = $productID";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Display the product details
    if ($row) {
       echo '
			<div class="container mt-5">
			    <div class="row mb-5">
			        <div class="col-md-6 p-5" style="border:2px solid dodgerblue">
			            <img src="'.$row['ProductImage'].'" alt="'.$row['ProductName'].'" width="90%">
			        </div>
			        <div class="col-md-6 mt-3 p-5">
			            <h2 class="mt-5 ms-3 text-primary display-6" style="font-weight:bold;">'.$row['ProductName'].'</h2>
			            <h4 class="mt-3 ms-3">&#8377; '.$row['ProductPrice'].'</h4>
                        <h4 class="ms-3">Product Details:</h4>
			            <pre class="ms-3" style="font-size:2vh">'.$row['ProductInfo'].'</pre>
			            <button class="container btn btn-primary p-3 mt-3" style="width:60%" type="button" onclick="checkAndAddToCart()">Add to cart</button>
			        </div>
			    </div>
			</div>';
    } else {
        echo 'Product not found.';
    }
}

include 'footer.php'; // Include footer or any necessary closing code
?>


<script>
	function checkAndAddToCart() {
        // Check if the user is logged in on the server side
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
            var productID = <?php echo $productID; ?>; // Replace with the actual product ID
            addToCart(productID);
        <?php } else { ?>
            // Redirect to the login page if the user is not logged in
            window.location.href = "login.php";
        <?php } ?>
    }

    function addToCart(productID) {
        // Create an AJAX request
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                window.alert('Added to cart');
            }
        };
        // Send the AJAX request to the cart_pop.php script with the productID parameter
        xhttp.open("GET", "cart_pop.php?id=" + productID, true);
        xhttp.send();
    }
</script>