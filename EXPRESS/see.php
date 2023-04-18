<?php

// execute query
$sql = "SELECT serialnumber,name,age,gender,address,mail,phone FROM users";
$result = mysqli_query($conn, $sql);

// check for errors
if (!$result) {
    die("Server didn't respond: " . mysqli_error($conn));
}

// display data in table
echo '	<div class="container">
		<h2 class="text-center mt-5">User Details</h2>
		<table class="table table-hover table-bordered mt-3 bg-info">
		<tr>
		<th>Sno</th>
		<th>Name</th>
		<th>Age</th>
		<th>Gender</th>
		<th>Address</th>
		<th>Mail</th>
		<th>Phone</th>
		</tr>';

while ($row = mysqli_fetch_assoc($result)) {
    // sanitize output
    $serialnumber = htmlspecialchars($row['serialnumber']);
    $name = htmlspecialchars($row['name']);
    $age = htmlspecialchars($row['age']);
    $gender = htmlspecialchars($row['gender']);
    $address = htmlspecialchars($row['address']);
    $mail = htmlspecialchars($row['mail']);
    $phone = htmlspecialchars($row['phone']);

    echo '<tr><td>' . $serialnumber .'</td>' . '<td>' . $name .'</td>' . '<td>' . $age . '</td>' . '<td>' . $gender . '</td>' . '<td>' . $address . '</td>' . '<td>' . $mail . '</td>' . '<td>' . $phone . '</td></tr>';
}

echo '</table></div>';

?>
