<?php
include 'header.php';
include 'dbconn.php';
$subTotal = 0;
$salesTax = 0;

if (isset($_GET['id'])) {
    $productID = $_GET['id'];
}

$sql = "SELECT products.ProductName,products.ProductPrice,products.ProductImage,products.ProductInfo,cart.Quantity,products.ProductID FROM products INNER JOIN cart ON cart.ProductID = products.ProductID WHERE userName = '$username'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
?>

<div class="container-fluid mt-5 mb-5">
    <div class="row">
        <div class="col-md-9 p-5" style="height:50rem;background-color:rgba(200,200,200,0.4);border:rgba(100,100,250,1);overflow-y:scroll">
            <h2 class="mb-4" style="font-size:2rem;font-family:garamond">YOUR CART</h2>
            <hr>
            <div class="row">
                <div class="col-5">Product</div>
                <div class="col-2 text-end">Price</div>
                <div class="col-2 text-end">Quantity</div>
                <div class="col-2 text-end">Total</div>
                <div class="col-1"> </div>
            </div>
            <hr>

            <?php
            if($num >= 1){
                $i = 1;
            while ($row = mysqli_fetch_assoc($result)){
                $totalPrice = $row['ProductPrice'] * $row['Quantity'];
                echo '
                <div class="row">
                    <div class="col-5">
                        <div class="row">
                            <span class="col-1">'.$i.'</span>
                            <div class="col-6">
                                <img src="'.$row['ProductImage'].'" alt="'.$row['ProductName'].'" height="100" width="100">
                            </div>
                            <div class="col-5" style="font-size:1rem">
                                <p>'.$row['ProductName'].'</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 text-end">&#8377; '.$row['ProductPrice'].'</div>
                    <div class="col-2 text-end">'.$row['Quantity'].'</div>
                    <div class="col-2 text-end">&#8377; '.$totalPrice.'</div>
                    <div class="col-1">
                        <button type="button" onclick="deleteFromCart('.$row['ProductID'].')" class="btn btn-info p-0" style="border-radius:2rem;">
                            <span class="material-symbols-outlined" style="position:relative;top:-1px">remove</span>
                        </button>
                    </div>
                </div>
                <hr>';
                $subTotal += $totalPrice;
                $salesTax = $subTotal * 0.1;
                $i++;
                    }
                }
                else{
                    echo '
                            <div class="container">
                                <p class="text-center mt-5 display-6">Your shopping cart is empty</p>
                                <a href="home-page.php" class="btn btn-primary p-4" style="font-size:2rem;position:relative;top:10vh;left:42%">Shop</a>
                            </div>';
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
            <a href="checkout.php?totalAmount=<?php echo $totalAmount;?>" class="container btn btn-dark p-3 mt-3 mb-5" style="font-family:copperplate">CHECKOUT</a>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>

<script>
    function deleteFromCart(ProductID) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_from_cart.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                window.location.reload();
            }
        };
        xhr.send('ProductID=' + encodeURIComponent(ProductID));
    }
</script>