<?php

include 'dbconn.php';

$sql = "SELECT * FROM products WHERE Category = 'Motherboard'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

echo '<div class="container text-center">';
echo '<div class="text-center text-primary display-1 h1">Motherboards
        <hr>
    </div>';

$i = 0; // Counter variable for tracking the number of products

while ($row = mysqli_fetch_assoc($result)) {
    // Start a new row after every 5 products
    if ($i % 5 === 0) {
        echo '<div class="row categories">';
    }

    echo '<div class="card col-md"><a href="product_details.php?id='.$row['ProductID'].'">
                <img src="'.$row['ProductImage'].'" alt="'.$row['ProductName'].'" width="100%" height="200px">
                <div class="card-body">
                    <h4 class="card-text">'.$row['ProductName'].'</h4>
                    <h2 class="card-text">&#8377; '.$row['ProductPrice'].'</h2>
                </div>
            </a>
        </div>';

    $i++;

    // Close the row after every 5 products
    if ($i % 5 === 0) {
        echo '</div>';
    }
}

// Close the last row if the total number of products is not divisible by 5
if ($num % 5 !== 0) {
    echo '</div>';
}

echo '</div>';
?>