<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $loggedin = true;
    $username = $_SESSION['userName'];
}
else{
    $loggedin = false;
}

echo'
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
            transition: all 0.5s;
        }

        .categories .card:hover {
            box-shadow: 0 0 16px blue;
        }

        .offcanvas-center{
            width:40%;
            position: absolute;
            top: 20%;
            left: 30%;
            bottom: 10%;
            border-radius:1rem;
        }

        @media (max-width:700px) {
            .offcanvas-center{
                width:100%;
                left:0;
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

    <div class="navbar navbar-expand-md bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="logo.png" alt="Brand logo" width="40px" height="40px"><span class="ms-2 text-primary h2">EXPRESS</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar" style="position: relative;left:55%;">
                <ul class="navbar-nav">';

                if($loggedin){ echo '
                    <li class="header nav-item text-center"><a class="nav-link text-primary" href="account.php"><span class="material-symbols-outlined" style="position:relative;top:0;">account_circle</span></a></li>';
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
                    echo '
                </ul>
            </div>
        </div>
    </div>';
?>
