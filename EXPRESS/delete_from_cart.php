<?php
    include 'dbconn.php';
    include 'header.php';

    // Get the ProductID from the AJAX request
    $ProductID = $_POST['ProductID'];

    // Use prepared statements to prevent SQL injection
    $sql = "DELETE FROM cart WHERE userName = '$username' AND ProductID = '$ProductID'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }

?>