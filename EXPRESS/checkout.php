<?php

include 'header.php';
include 'dbconn.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

$sql = "SELECT * FROM users WHERE userName = '$username'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$totalAmount = isset($_GET['totalAmount']) ? $_GET['totalAmount'] : ' ';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $paymentMode = $_POST["paymentOption"];
    $totalAmount = $_POST['totalAmount'];

    $sql2 = "INSERT INTO `orders` (`userName`, `PaymentMode`, `TotalAmount`, `OrderDate`) VALUES ('$username', '$paymentMode', '$totalAmount', current_timestamp());";
    $qry = mysqli_query($conn,$sql2);
    if($qry){
            $sql3 = "SELECT * FROM orders WHERE userName = '$username' ORDER BY OrderDate DESC";
            $qry3 = mysqli_query($conn,$sql3);
            $row2 = mysqli_fetch_assoc($qry3);
            $orderid = $row2['OrderID'];
            if($qry3){
                $sql4 = "SELECT cart.ProductID,cart.Quantity,products.ProductPrice FROM cart INNER JOIN products ON products.ProductID = cart.ProductID WHERE userName = '$username';";
                $qry4 = mysqli_query($conn,$sql4);
                while($row3 = mysqli_fetch_assoc($qry4)){
                    $productid = $row3['ProductID'];
                    $quantity = $row3['Quantity'];
                    $productprice = $row3['ProductPrice'];
                    $sql5 = "INSERT INTO `orderdetails` (`OrderID`, `ProductID`, `Quantity`, `Price`) VALUES ('$orderid', '$productid', '$quantity', '$productprice');";
                    $qry5 = mysqli_query($conn,$sql5);
                }
                $sql6 = "DELETE FROM cart WHERE userName = '$username'";
                $qry6 = mysqli_query($conn,$sql6);
                if($qry6){
                echo '<script>window.alert("Your order has been placed")</script>';
                echo '<script>window.location.href = "account.php"</script>';
                }
            }
        }
    }
}
else{
    header("location:login.php");
}
?>

<div class="container d-flex justify-content-center align-items-center mt-5 mb-5">
    <div class="p-5" style="border: 2px solid brown; border-radius: 1rem; width: 50vh;background-color:rgba(200,200,200,0.4);">
        <p class="text-center" style="font-size: 3rem">CHECKOUT</p>
        <hr>
        <p style="font-size:1.5rem">Your address:</p>
        <p class="bg-white p-3"><?php echo $row['address'] ?></p>
        <p style="font-size:1.5rem" class="mt-5 mb-5">You are paying:<span class="float-end me-3 bg-white p-1">&#8377; <?php echo $totalAmount;?></span></p>
        <form action="checkout.php" method="post">
            <p style="font-size: 1.5rem">Choose a payment option:</p>
            <div class="checkout pt-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentOption" id="netBanking" value="Net Banking">
                    <label class="form-check-label list-group-item" for="netBanking">Net Banking</label>
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="paymentOption" id="debitCard" value="Card">
                    <label class="form-check-label list-group-item" for="debitCard">Debit card/Credit card</label>
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="paymentOption" id="wallet" value="Wallet">
                    <label class="form-check-label list-group-item" for="wallet">Wallet</label>
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="paymentOption" id="upi" value="UPI">
                    <label class="form-check-label list-group-item" for="upi">UPI</label>
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="paymentOption" id="cod" value="COD">
                    <label class="form-check-label list-group-item" for="cod">Cash On Delivery</label>
                    <input type="hidden" name="totalAmount" value="<?php echo $totalAmount;?>">
                </div>
            </div>
            <button type="submit" class="btn btn-dark container p-3 mt-4">PLACE ORDER</button>
        </form>
    </div>
</div>

<?php
include 'footer.php';
?>