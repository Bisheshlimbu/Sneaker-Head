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
    <link rel="stylesheet" href="http://sneaker-head.local/assets/css/profile.css">



   
</head>

<body>
    <header class="profile-header">
        <!-- <h1> SNEAKERHEAD</h1> -->
        <nav class="profile-nav">

            <a href="http://sneaker-head.local/main/pages/order.php">Orders</a>
            <a href="http://sneaker-head.local/main/pages/dummy.php">Favorites</a>

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

