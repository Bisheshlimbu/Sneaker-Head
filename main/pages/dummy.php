<?php include_once('../header.php')?>
<?php
$brand=isset($_GET['brand'])?$_GET['brand']:"";
$type=isset($_GET['type'])?$_GET['type']:"";
$category=isset($_GET['category'])?$_GET['category']:"";
$arrivel=isset($_GET['arrivel'])?$_GET['arrivel']:"";
?>
<head>
    <link rel="stylesheet" href="http://sneaker-head.local/assets/css/profile.css">

</head>
<body>



    <header class="profile-header">
        <!-- <h1> SNEAKERHEAD</h1> -->
        <nav class="profile-nav">

            <a href="http://sneaker-head.local/main/pages/order.php">Orders</a>
            <a href="#">Favorites</a>

            <a href="http://sneaker-head.local/main/pages/profile.php">Profile</a>
        </nav>
    </header>



    <div class="page-container">
        <div class="card-container">
            <?php
            
         $favourite = get_fav_data_by_user_id($user_id);
$products = [];

if(is_array($favourite) && !empty($favourite)){
    foreach($favourite as $fav){
        $products[] = getProductDetailsByProduct_id($fav['product_id']);
    }
}

            if(!empty($products)&& is_array($products)){
                foreach($products as $product){
                  ?>
            <a href="single.php?pid=<?php echo $product['id']?>" class="card">
                <img src="http://sneaker-head.local/<?php echo $product['product_image']?>" alt="Air Jordan Retro 12">

                <div class="card-details">
                    <h3><?php echo $product['title'];?></h3>
                    <p class="colors"><?php echo $product['brand']?></p>
                    <p class="price">RS.<?php echo $product['price']?></p>

                </div>
            </a>
            <?php
                }
            }else{
                echo "No Products Found.";
            }
            ?>
        </div>
    </div>
</body>
<?php include_once('../footer.php')?>
