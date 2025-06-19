<?php
session_start();
// include_once(__DIR__.'../../config/functions.php');

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
$email = isset($_SESSION['email']) ? $_SESSION['email'] : "";

if (empty($user_id)) {
    header("Location: /main/pages/login.php");
    exit();
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneaker Head Dashboard</title>
    <link rel="stylesheet" href="http://sneaker-head.local/assets/css/sidebar.css">
    <link rel="stylesheet" href="http://sneaker-head.local/assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="http://sneaker-head.local/assets/js/admin.js"></script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>

<body>
    <div class="sidebar-container">
        <aside class="sidebar">
            <div class="sidebar-logo">
                <a href="http://sneaker-head.local/"> Sneaker<span> Head</span>
            </div>
            <nav>
                <ul>
                    <li><i class="fas fa-tachometer-alt"></i><a href="admin.php">Dashboard</a></li>
                    <li><i class="fas fa-images"></i><a href="home-slides.php">Home Slides</a></li>
                    <li><i class="fas fa-users"></i> Users</li>
                    <li><i class="fas fa-box"></i><a href="product-list.php">Products</a></li>
                    <li><i class="fas fa-th-large"></i> Category</li>
                    <li><i class="fas fa-shopping-cart"></i> Orders</li>
                    <li><i class="fas fa-sign-out-alt"></i><a
                            href="http://sneaker-head.local/main/pages/logout.php">Logout</a></li>
                </ul>
            </nav>
        </aside>
    </div>