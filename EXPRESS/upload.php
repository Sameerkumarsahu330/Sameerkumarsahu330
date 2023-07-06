<!DOCTYPE html>
<html>
<head>
    <title>Upload Image</title>
</head>
<body>
    <?php
    // define database connection variables
    $server = "localhost";
    $userName = "root";
    $passWord = "";
    $database = "express";

    // create a database connection
    $conn = mysqli_connect($server, $userName, $passWord, $database);

    // check if the form is submitted
    if (isset($_POST['submit'])) {
        // get the uploaded file information
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];

        // move the uploaded file to the server
        $file_path = "uploads/".$file_name;
        move_uploaded_file($file_tmp, $file_path);

        // insert the file path into the database
        $sql = "INSERT INTO images (path) VALUES ('$file_path')";
        mysqli_query($conn, $sql);
    }
    ?>

    <h1>Upload Image</h1>

    <form method="post" enctype="multipart/form-data">
        <label for="file">Choose Image:</label>
        <input type="file" name="file" id="file"><br><br>
        <input type="submit" name="submit" value="Upload">
    </form>

</body>
</html>
