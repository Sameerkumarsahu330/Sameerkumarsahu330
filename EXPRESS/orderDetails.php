<?php
include 'header.php';
include 'dbconn.php';
$subTotal = 0;
$salesTax = 0;

if (isset($_GET['id'])) {
    $orderid = $_GET['id'];
    $paymentmode = $_GET['payment'];
}

$sql = "SELECT products.ProductName,orderdetails.Price,products.ProductImage,products.ProductInfo,orderdetails.Quantity FROM products INNER JOIN orderdetails ON orderdetails.ProductID = products.ProductID WHERE OrderID = '$orderid'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
?>

<div class="container-fluid mb-5 p-5">
    <div class="row">
        <div class="col-md-9 pe-4" style="height:50rem;background-color:#ffffff;overflow-y:scroll">
            <h2 class="mb-4 text-center" style="color: #333333;font-size:2.5rem;font-family:arial">ORDER ID: <?php echo $orderid;?></h2>
            <hr>
            <div class="row ps-3 pe-3">
                <div class="col-6">Product</div>
                <div class="col-2 text-end">Price</div>
                <div class="col-2 text-end">Quantity</div>
                <div class="col-2 text-end">Total</div>
            </div>
            <hr>

            <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)){
                $totalPrice = $row['Price'] * $row['Quantity'];
                echo '
                <div class="row p-4 mb-4" style="border-radius: 5px;background-color: #f1f1f1;">
                    <div class="col-6 product-list">
                        <div class="row">
                            <div class="col-6 product-image">
                                <img src="'.$row['ProductImage'].'" alt="'.$row['ProductName'].'" height="100" width="100">
                            </div>
                            <div class="col-6 product-info" style="font-size:1rem">
                                <h6>'.$row['ProductName'].'</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 text-end">&#8377; '.$row['Price'].'</div>
                    <div class="col-2 text-end">'.$row['Quantity'].'</div>
                    <div class="col-2 text-end">&#8377; '.$totalPrice.'</div>
                    
                </div>';
                $subTotal += $totalPrice;
                $salesTax = $subTotal * 0.1;
                $i++;
                }
            ?>

        </div>
        <div class="col-md-3 p-5" style="background-color:rgba(100,100,100,0.4)">
            <p style="font-size:1.5rem;font-family:helvetica">PRICE DETAILS</p>
            <hr>
            <div class="row">
                <div class="col">
                    <p style="font-size:1.5rem;font-family:helvetica">SUBTOTAL</p>
                    <p>Shipping</p>
                    <p>Sales tax (10%)</p>
                    <p style="font-size:1.5rem;font-family:helvetica">TOTAL</p>
                </div>
                <div class="col">
                    <p class="text-end" style="font-size:1.5rem;font-family:helvetica">&#8377; <?php echo $subTotal; ?></p>
                    <p class="text-end">&#8377; <?php if($num >= 1){echo '100';}else{echo '0';}?></p>
                    <p class="text-end">&#8377; <?php echo $salesTax; ?></p>
                    <p class="text-end" style="font-size:1.5rem;font-family:helvetica">&#8377; <?php if($num >= 1){ echo $totalAmount = $subTotal + $salesTax + 100;}else{echo '0';} ?></p>
                </div>
            </div>
            <hr>
            <p style="font-size:1.5rem;font-family:helvetica">Payment mode: <?php echo $paymentmode; ?>
            </p>
            <p style="font-size:1.5rem;font-family:helvetica">Order will be delivered at your address within 5 days</p>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>