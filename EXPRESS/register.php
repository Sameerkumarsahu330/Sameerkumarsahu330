

<?php
    include 'header.php';
    $showAlert = false;
    $showError = false;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconn.php';
    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $mail = $_POST["mail"];
    $phone = $_POST["phone"];
    $userName = $_POST["userName"];
    $passWord = $_POST["passWord"];
    $pass2 = $_POST["pass2"];
    
    //Check whether this username exists
    $existSql = "SELECT * FROM users WHERE userName = '$userName'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    
    if($numExistRows > 0){
        $showError = "Username already exists,you can add numbers and special characters to make it unique";        
    }
    else{

        if(($passWord == $pass2)){
            $sql = "INSERT INTO `users` ( `name`, `age`, `gender`, `address`, `mail`, `phone`, `userName`, `passWord`, `dt`) VALUES ('$name', '$age', '$gender', '$address', '$mail', '$phone', '$userName', '$passWord', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
            }
        }
        else{
            $showError = "Passwords do not match";
        }
    }
}
?>
    <div class="register container row d-flex justify-content-center mt-5 text-light text-center" style="margin:auto;">
        <div class="col-md-4 p-4" style="box-shadow:0 0 16px black; border-radius: 0.5rem;background-image: url('background.jpg');">
            <h1 class="mt-2">Register</h1>
            <p>Kindly fill this form to register</p>

            <?php
                if($showAlert){
                    echo 
                    '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Success!</strong> User has been registered.<a href="login.php" class="text-primary">Log in</a> to continue.
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
            
            <form action="register.php" method="post" class="text-primary was-validated">
                <div class="input-group-lg form-floating">
                <input type="text" class="form-control" id="name" name="name" placeholder="Full name" required>
                <label for="name">Full name</label>
                <div class="invalid-feedback text-warning">Please fill out this field.</div>
                </div>
                <br>

                <div class="row">
                <div class="col-md input-group-lg form-floating">
                <input type="text" class="form-control" id="age" name="age" placeholder="Age" required>
                <label for="age" class="ps-4">Age</label>
                <div class="invalid-feedback text-warning">Please fill out this field.</div>
                </div>
                <br>

                <div class="col-md input-group-lg">
                <select class="form-select p-3" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Transgender">Transgender</option>
                </select>
                </div>
                </div>
                <br>

                <div class="input-group-lg form-floating">
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                <label for="address">Address</label>
                <div class="invalid-feedback text-warning">Please fill out this field.</div>
                </div>
                <br>

                <div class="input-group-lg form-floating">
                <input type="email" class="form-control" id="mail" name="mail" placeholder="Email" required>
                <label for="mail">Email</label>
                <div class="invalid-feedback text-warning">Please fill out this field.</div>
                </div>
                <br>

                <div class="input-group-lg form-floating">
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="phone" required>
                <label for="phone">Phone Number</label>
                <div class="invalid-feedback text-warning">Please fill out this field.</div>
                </div>
                <br>

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
                
                <div class="input-group-lg form-floating">
                <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Retype Password" required>
                <label for="pass2">Retype Password</label>
                <div class="invalid-feedback text-warning">Please fill out this field.</div>
                </div>
                <br><br>
                <button type="submit" class="btn btn-success mb-4 container p-3" name="submit">Submit</button>
            </form>

            <p class="mb-5">Already have an account ?<a href="login.php" class="text-light">Log in</a></p>
        </div>
    </div>