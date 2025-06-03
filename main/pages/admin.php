<?php
// session_start();
include_once('sidebar.php');


$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
$email = isset($_SESSION['email']) ? $_SESSION['email'] : "";

if (empty($user_id)) {
    header("Location: /main/pages/login.php");
    exit(); 
}
?>

<main class="main-container">
    <div class="top-header">
        <i class="fa-solid fa-user"></i>

        </i>
    </div>
    <header class="dashboard-header">

        <div>
            <h1>Good Morning, Bishesh</h1>
            <p>Here’s what’s happening on your store today. See the statistics at once.</p>
        </div>
       
    </header>

    <section class="stats">
        <div class="stat-card">
            <div class="icon"><i class="fas fa-gift"></i></div>
            <div>
                <p class="label">New Orders</p>
                <p class="value">1,390</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="icon"><i class="fas fa-chart-pie"></i></div>
            <div>
                <p class="label">Sales</p>
                <p class="value">$57,890</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="icon"><i class="fas fa-university"></i></div>
            <div>
                <p class="label">Revenue</p>
                <p class="value">$12,390</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="icon"><i class="fas fa-boxes"></i></div>
            <div>
                <p class="label">Total Products</p>
                <p class="value">1,390</p>
            </div>
        </div>
    </section>
</main>
