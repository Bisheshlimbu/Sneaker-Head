<?php include_once('../header.php')?>
<?php
$product_id=isset($_GET['pid'])?$_GET['pid']:"";
$product=getProductDetailsByProduct_id($product_id);
// var_dump($product);

$attachments=getProductAttachmentsByProduct_id($product_id);


$brand_meta = getUserMeta($user_id, '_brand_preferences');
$brand_meta = is_array($brand_meta) ? $brand_meta : [];

$category_meta = getUserMeta($user_id, '_category_preferences');
$category_meta = is_array($category_meta) ? $category_meta : [];

$type_meta = getUserMeta($user_id, '_type_preferences');
$type_meta = is_array($type_meta) ? $type_meta : [];


// $user_details=getUsersDetailsById($user_id);
$user_profile=[
    'brand'=>$brand_meta,
    'category'=>$category_meta,
    'type'=>$type_meta
];

$recommended=getRecommendedProducts($user_profile);
// echo "<pre>";
// var_dump($recommended);
// echo "<pre>";



?>
<div class="single-container">
    <!-- <nav class="breadcrumb">Home / Men / Shoes / Casual</nav> -->

    <div class="product-page">
        <!-- Left: Images -->
        <div class="product-images">
            <span class="main-image">
                <img id="main-image" src="http://sneaker-head.local/<?php echo $product['product_image']?>"
                    alt="Sneaker">
            </span>
            <div class="thumbnails">
                <?php
                    if(!empty($attachments) && is_array($attachments)){
                        foreach($attachments as $attachment){
                            ?>
                <img class="thumbnail-image" src="http://sneaker-head.local/<?php echo $attachment['url']?>" alt="">
                <?php
                        }
                    }
                    ?>
            </div>
        </div>

        <!-- Right: Details -->
        <div class="product-info">
            <h1><?php echo ucfirst($product['title'])?></h1>
            <p class="price">$<?php echo ' '. $product['price']?></p>
            <p class="pay-info">Or 4 interest-free payments with Klarna, Afterpay, or PayPal</p>

            <div class="color-section">
                <!-- <p><strong>Color:</strong> White/Light Zen Grey/Total Orange/Cool Grey</p> -->
                <img src="http://sneaker-head.local/assets/images/favs.jpg" alt="Color thumbnail" class="color-thumb">
            </div>

            <div class="sizes">
                <p><strong>Size</strong><span id="selectSize"></span></p>
                <div class="size-grid">
                    <?php
                        if (isset($product['size'])) {
                            $sizes = json_decode($product['size'], true);

                            if (is_array($sizes)) {
                                foreach ($sizes as $index => $size) {
                                    $safeSize = htmlspecialchars($size);
                                    echo '
                                    <div class="brand-item pre-items">'.$safeSize.'</div>';
                                        }
                            } else {
                                echo "Invalid size data.";
                            }
                        }
                        ?>
                </div>
            </div>
            <div class="qty-wrapper">
                <p><strong>Quantity:</strong></p>
                <div class="qty-container">
                    <div class="product-qty qty-btn" id="qty-inc">+</div>
                    <div class="product-qty" id="qty-number">1</div>
                    <div class="product-qty qty-btn" id="qty-dec">-</div>
                </div>
            </div>

            <button class="add-to-bag" id="addToBag" data-product_id="<?php echo $product_id;?>"
                data-user_id="<?php echo $user_id;?>">ADD TO BAG</button>

            <div class="status-box">
                <p><strong>STATUS:</strong> Get points. Gain access. Boost your status. Use your STATUS across our brand
                    family.</p>
                <a href="http://sneaker-head.local/main/pages/register.php">Join STATUS Now ›</a>
            </div>
        </div>
    </div>
</div>