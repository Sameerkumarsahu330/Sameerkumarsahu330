<?php
    include 'header.php';
    $login = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){

    include 'dbconn.php';
    $userName = $_POST["userName"];
    $passWord = $_POST["passWord"];


    $sql = "SELECT * FROM admin WHERE userName = '$userName' AND passWord = '$passWord'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
        if($num == 1){
            $login = true;
            $_SESSION['loggedin'] = true;-
            $_SESSION['userName'] = $userName;
            echo '<script>window.location.href = "admindash.php";</script>';
        }
        
        else{
            $showError = "Invalid Credentials";
        }
    }
?>
    <div class="register container row d-flex justify-content-center mt-5 text-light text-center" style="margin:auto;">
        <div class="col-md-4 p-4" style="box-shadow:0 0 16px black; border-radius: 0.5rem;background-image: url('background.jpg');">
            <h1 class="mt-2">Admin Log-in</h1>
            <h1><a href="adminlogin.php" class="btn btn-primary m-1">Admin</a><a href="login.php" class="btn btn-primary m-1 active">User</a></h1>

                <?php
                if($login){
                    echo 
                    '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Welcome!</strong> You are logged in.
                    </div>';
                }

                if($showError){
                    echo 
                    '<div class="alert alert-warning alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Error! </strong>' .$showError.'
                    </div>';
                }
            ?>

            <form action="adminlogin.php" method="post" class="text-primary was-validated">

                <div class="input-group-lg form-floating">
                <input type="text" class="form-control" id="uname" name="userName" placeholder="Username" required>
                <label for="uname">Username</label>
                <div class="invalid-feedback text-warning">Please fill out this field.</div>
                </div>
                <br>
                
                <div class="input-group-lg form-floating">
                <input type="password" class="form-control" id="pass" name="passWord" placeholder="Password" required>
                <label for="pass">Password</label>
                <div class="invalid-feedback text-warning">Please fill out this field.</div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary mb-4" name="submit">Log-in</button>
            </form>

            <p class="mb-5">Not an user?<a href="register.php" class="text-light">Register</a></p>
        </div>
    </div>
