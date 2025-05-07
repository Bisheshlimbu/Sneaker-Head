<?php 
session_start();
include_once(__DIR__.'../../config/functions.php');



$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
$email = isset($_SESSION['email']) ? $_SESSION['email'] : "";

if (empty($user_id)) {
    header("Location: /main/pages/login.php");
    exit(); 
}

// If user_id is set, fetch user details
$users = getUsersDetailsById($user_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneaker Head</title>
    <link rel="stylesheet" href="http://sneaker-head.local/assets/css/style.css">
    <link rel="stylesheet" href="http://sneaker-head.local/assets/css/single.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="http://sneaker-head.local/assets/js/script.js"></script>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</head>

<body>
    <header class="header">
        <div class="top-banner">Get 20% off! Use code: SNEAKS</div>
        <div class="navbar">
            <div class="logo"><a href="http://sneaker-head.local/">SNEAKER <span>HEAD</span></a></div>
            <div class="navright">
                <div class="search-bar">
                    <input type="text" placeholder="Search">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="nav-links">
                    <?php
                    if(isset($users) && !empty($users)){
                        ?>
                    <a href="#"><?php echo $users['username']?></a>
                    <?php
                    }else{
                        ?>
                    <a href="main/pages/login.php">Account</a>
                    <?php
                    }
                    ?>

                    <a href="#">Bag</a>
                    <?php
                    if(isset($users) && !empty($users)){
                        ?>
                    <a href="http://sneaker-head.local/main/pages/logout.php">Logout</a>
                    <?php
                    }
                   ?>
                </div>

            </div>
        </div>
        <nav class="category-nav">
            <a href="/main/pages/product.php?category=men">Men</a>
            <a href="/main/pages/product.php?category=women">Women</a>
            <a href="/main/pages/product.php?category=kid">Kids</a>
            <a href="#">Clothing</a>
            <a href="#">Accessories</a>
            <a href="#">Sale</a>
            <a href="#new-arrival">Sneaker Releases</a>
        </nav>
    </header>