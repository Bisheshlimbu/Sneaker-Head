<?php
 include_once('../header.php');
include_once(__DIR__.'/../../config/functions.php');

$brand_meta = getUserMeta($user_id, '_brand_preferences');
$brand_meta = is_array($brand_meta) ? $brand_meta : [];

$category_meta = getUserMeta($user_id, '_category_preferences');
$category_meta = is_array($category_meta) ? $category_meta : [];

$type_meta = getUserMeta($user_id, '_type_preferences');
$type_meta = is_array($type_meta) ? $type_meta : [];


$user_details=getUsersDetailsById($user_id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SneakerHead - Shopping Preferences</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="http://sneaker-head.local/assets/js/profile.js"></script>


    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Roboto', sans-serif;
        background-color: #121212;
        color: #ffffff;
    }

    .profile-header {
        background-color:rgb(52, 52, 52);
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #333;
    }

    .profile-header h1 {
        color: #fff;
        font-size: 24px;
    }

    .profile-nav {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
    }

    .profile-nav a {
        color: #fff;
        text-decoration: none;
        margin: 0 15px;
        font-weight: 500;
    }

    .profile-container {
        display: flex;
        padding: 40px;
    }

    .profile-sidebar {
        width: 250px;
    }

    .profile-sidebar ul {
        list-style: none;
    }

    .profile-sidebar li {
        background-color: #1e1e1e;
        margin-bottom: 10px;
        padding: 15px;
        cursor: pointer;
        border: 1px solid #333;
    }

    .profile-sidebar li.active {
        background-color: #333;
        font-weight: bold;
    }

    .main {
        flex: 1;
        padding-left: 40px;
    }

    .section-title {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .brand-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 15px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .brand-item,
    .category-item,
    .type-item {
        background-color: #1e1e1e;
        padding: 20px;
        text-align: center;
        border: 1px solid #333;
        cursor: pointer;
    }

    .selected {
        border: 2px solid #00bfff;
    }

    .info-box {
        background-color: #1e1e1e;
        padding: 20px;
        margin-bottom: 20px;
        border: 1px solid #333;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;

    }

    .info-box .label {
        font-weight: bold;
    }

    .info-box .value {
        margin-top: 5px;
        border: none;
        padding: 2px;
        background: none;
        s width: 500px;
    }

    .info-box a {
        color: #00bfff;
        text-decoration: underline;
    }

    .btn-update {
        margin-top: 30px;
        padding: 10px 20px;
        background-color: #00bfff;
        color: #000;
        border: none;
        cursor: pointer;
        font-weight: bold;
    }

    .btn-update:hover {
        background-color: #00a0cc;
    }

    .hide {
        display: none;
    }

    #profile-message-container {
        padding: 10px;

        .successMessage {
            background-color: green;
            padding: 10px;
        }

        .errorMessage {
            background-color: green;
            padding: 10px;
        }
    }
    </style>
</head>

<body>
    <header class="profile-header">
        <!-- <h1> SNEAKERHEAD</h1> -->
        <nav class="profile-nav">

            <a href="http://sneaker-head.local/main/pages/order.php">Orders</a>
            <a href="#">Favorites</a>

            <a href="#">Profile</a>
        </nav>
    </header>

    <div class="profile-container">
        <aside class="profile-sidebar">
            <ul>
                <li class="active" id="personal_btn">Personal Info</li>
                <li class="" id="perefence_btn">Shopping Preferences</li>
                <li><a href="#">Logout</a></li>
            </ul>
        </aside>

        <!-- personal info section -->
        <main class="main" id="personal_cont">
            <section class="section">
                <h2 class="section-title">PERSONAL INFO</h2>
                <div class="info-box">
                    <div>
                        <div class="label"><?php echo ucfirst($user_details['firstname']).' '.ucfirst($user_details['lastname']);?></div>
                    </div>
                    <a href="#">UPDATE DETAILS</a>
                </div>
            </section>

            <section class="section">
                <h2 class="section-title">LOGIN DETAILS</h2>
                <div class="info-box">
                    <div>
                        <div class="label">Email</div>
                        <input type="email" class="value" value="<?php echo $user_details['email'];?>">
                    </div>
                    <a href="#">UPDATE EMAIL</a>
                </div>

                <div class="info-box">
                    <div>
                        <div class="label">Password</div>
                        <input type="password" class="value" value="<?php echo $user_details['password'];?>">
                    </div>
                    <a href="#">CHANGE PASSWORD</a>
                </div>
            </section>
        </main>


        <!-- preferences section -->
        <main class="main hide" id="preferences_cont">
            <h2 class="section-title">SHOPPING PREFERENCES</h2>
            <p><strong>PREFERRED STORES</strong></p>
            <p>Select up to three preferred stores to get the most accurate inventory on SneakerHead exclusive drops.
            </p>
            <button class="btn-update">SELECT PREFERRED STORES</button>
            <hr style="margin: 30px 0; border-color: #333;">


            <div id="profile-message-container"></div>


            <!-- brnd section -->
            <div>
                <p><strong>SELECT BRANDS</strong></p>
                <p>Select all that apply.</p>
                <div class="brand-grid">
                    <?php 
                    $brands = ["Adidas", "Nike", "Jordan", "Ascics", "NewBalance"];
                    foreach ($brands as $brand): 
                        $lower = strtolower($brand);
                        $isSelected = in_array($lower, $brand_meta);
                    ?>
                    <div class="brand-item pre-items <?= $isSelected ? 'selected' : '' ?>">
                        <?= $brand ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- category section -->
            <div>
                <p><strong>SELECT CATEGORY</strong></p>
                <p>Select all that apply.</p>
                <div class="brand-grid">
                     <?php 
                    $categories = ["Men", "Women", "Kid"];
                    foreach ($categories as $category): 
                        $lower = strtolower($category);
                        $isSelected = in_array($lower, $category_meta);
                    ?>
                     <div class="category-item pre-items <?= $isSelected ? 'selected' : '' ?>">
                        <?= $category ?>
                    </div>
                    <?php endforeach; ?>
                   
                </div>
            </div>
            <!-- type section -->
            <div>
                <p><strong>SELECT YOUR TYPE</strong></p>
                <p>Select all that apply.</p>
                <div class="brand-grid">
                     <?php 
                    $types = ["Casuals", "Running", "Basketball"];
                    foreach ($types as $type): 
                        $lower = strtolower($type);
                        $isSelected = in_array($lower, $type_meta);
                    ?>
                     <div class="type-item pre-items <?= $isSelected ? 'selected' : '' ?>">
                        <?= $type ?>
                    </div>
                    <?php endforeach; ?>
                  
                </div>
            </div>

            <!-- price section -->
            <!-- <div>
                <p><strong>SELECT YOUR PRICE RANGE</strong></p>
                <p>Select all that apply.</p>
                <div class="brand-grid">
                   
                    <label for="min-price">MIN PRICE</label>
                    <input type="number">
                    <label for="min-price">MAX PRICE</label>
                    <input type="number">
                </div>
            </div> -->


            <button class="btn-update" id="savePreferences">UPDATE YOUR PREFERENCES</button>

        </main>

    </div>

</body>

</html>