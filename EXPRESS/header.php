<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $loggedin = true;
    $username = $_SESSION['userName'];
}
else{
    $loggedin = false;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta lang="en-us">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPRESS</title>
    <link rel="icon" type="image/x-icon" href="logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .header>a {
            font-size: 1.5rem;
            margin-left: 2rem;
        }

        .header>a:hover {
            box-shadow: 0 0 8px 0 black;
            border-radius: 0.5rem;
        }

        .material-symbols-outlined{
            position: relative;
            top: 6px;
        }

        li a,
        .card a {
            text-decoration: none;
        }

        .card {
            border: none;
            margin: 1rem;
            width: 300px;
            height: 300px;
        }

        .card img {
            padding: 1rem;
        }

        .categories .card {
            transition: all 0.6s ease;
        }

        .categories .card:hover {
            box-shadow: 0 0 30px 0 rgba(0,0,0,0.5);
        }

        .offcanvas-center{
            width:40%;
            position: absolute;
            top: 20%;
            left: 30%;
            bottom: 10%;
            border-radius:1rem;
        }

        .offcanvas-center-short{
            width:20%;
            position: absolute;
            top: 20%;
            left: 40%;
            bottom: 10%;
            border-radius:1rem;
        }

        .quantity{
            width: 4rem;
            border-radius: 1rem;
            border: 1px solid black;
        }

        .checkout label{
            padding:1rem;
            background:white;
            position: relative;
            top:-1rem;
            cursor: pointer;
            position: relative;
            left: -1rem;
        }

        .checkout label:hover{
            box-shadow: 0 0 8px 0 black;
        }

        .checkout input[type="radio"]{
            display: none;
        }

        .checkout input[type="radio"]:checked + label {
        background: lightblue;
        color: white;
        }

        .ordertable{
            margin-bottom: 3rem;
            width: 60%;
            position: relative;
            left: -14%;
        }

        .orders{
            font-size: 2rem;
            padding-top: 2rem;
            padding-bottom: 2rem;
            text-decoration: none;
            background: rgba(100, 100, 100, 0.2);
            border-radius: 0.3rem;
            margin-bottom: 1rem;
        }

        .orders:hover{
            box-shadow:0 0 20px 0 white, 0 0 10px 0 brown;
        }

        .product-list .row {
            align-items: center;
            gap: 0.2rem;
        }

        .product-image {
            flex: 0 0 100px;
        }

        .product-image img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .product-info {
            flex: 1;
        }

        .product-info h4 {
            margin: 0;
            font-size: 20px;
            color: #333333;
        }

        .product-info p {
            margin-bottom: 0;
            color: #777777;
        }

        @media (max-width:700px) {
            .offcanvas-center{
                width:100%;
                left:0;
            }
            .offcanvas-center-short{
                width:80%;
                left:10%;
            }
            .ordertable{
                position: relative;
                left:-10%;
            }
        }

        @media (max-width:1400px) {
            .navbar-nav {
                position: relative;
                right: 54%;
            }

            .card img {
                height: 200px;
            }
        }
    </style>
    
 
</head>

<body style="overflow-x: hidden;z-index: 1;">

    <div class="navbar navbar-expand-md bg-light sticky-top shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="logo.png" alt="Brand logo" width="40px" height="40px"><span class="ms-2 text-primary h2">EXPRESS</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar" style="position: relative;left:55%;">
                <ul class="navbar-nav">
                
                <?php

                if($loggedin){ echo '
                    <li class="header nav-item text-center"><a class="nav-link text-primary" href="account.php"><span class="material-symbols-outlined" style="position:relative;top:0;">account_circle</span></a></li>';
                }
                if($loggedin){ echo '
                    <li class="header nav-item text-center"><a class="nav-link text-primary" href="cart.php"><span class="material-symbols-outlined">
                        shopping_cart_checkout</span></a></li>';        
                }
                echo '
                    <li class="header nav-item text-center"><a class="nav-link text-primary" href="faq_page.php">FAQ</a></li>
                    <li class="header nav-item text-center"><a class="nav-link text-primary" href="support_page.php">Support</a></li>
                    <li class="header nav-item text-center"><a class="nav-link text-primary" href="about_us.php">About Us</a></li>';

                    if(!$loggedin){
                    echo '
                    <li class="header nav-item text-center"><a class="nav-link text-primary" href="login.php">Login</a></li>';
                    }

                    else{
                    echo '
                    <li class="header nav-item text-center"><a class="nav-link text-primary" href="logout.php">Logout</a></li>';
                    }

                    ?>
                </ul>
            </div>
        </div>
    </div>
