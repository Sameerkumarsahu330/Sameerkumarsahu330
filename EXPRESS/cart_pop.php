<?php

include 'header.php';
include 'dbconn.php';
echo '<br>';
$num = 0;

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    

if (isset($_GET['id']) && $_GET['id'] != 0) {
    $productID = $_GET['id'];

    // Check if the record already exists in the cart
    $existingRecordQuery = "SELECT products.ProductName,products.ProductPrice,products.ProductImage,products.ProductInfo,cart.Quantity FROM products INNER JOIN cart ON cart.ProductID = products.ProductID WHERE userName = '$username' AND cart.ProductID = '$productID'";
    $existingRecordResult = mysqli_query($conn, $existingRecordQuery);
    $num = mysqli_num_rows($existingRecordResult);

    if ($num == 0) {
        // Insert the record into the cart table
        $insertQuery = "INSERT INTO cart (userName, ProductID, Quantity) VALUES ('$username', '$productID', '1')";
        $insertResult = mysqli_query($conn, $insertQuery);
    }
    else{
        $elseQuery = "UPDATE cart SET Quantity = Quantity + 1 WHERE userName = '$username' AND ProductID = '$productID'";
        $elseResult = mysqli_query($conn, $elseQuery);
        }
    }

if($num >=1){
    while ($row = mysqli_fetch_assoc($existingRecordResult)){
        $totalPrice = $row['ProductPrice'] * $row['Quantity'];
        echo '
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-6">
                        <img src="'.$row['ProductImage'].'" alt="'.$row['ProductName'].'" height="100" width="100">
                    </div>
                    <div class="col-6" style="font-size:1rem">
                        <p>'.$row['ProductName'].'</p>
                        <p>'.$row['ProductInfo'].'</p>
                    </div>
                </div>
            </div>
            <div class="col-2 text-end">&#8377; '.$row['ProductPrice'].'</div>
            <div class="col-2 text-end">'.$row['Quantity'].'</div>
            <div class="col-2 text-end">&#8377; '.$totalPrice.'</div>
        </div>
        <hr>';
        }
    }

}

else{
    header("location: login.php");
}
?>