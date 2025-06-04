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

// $recommended=getRecommendedProducts($user_profile);




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
            <p class="price">RS.<?php echo ' '. $product['price']?></p>
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
            <div class="favbtn">
                <?php
                $like=get_fav_data($product['id']);
                ?>
                <button class="favorite-button" id="add-to-fav" data-product_id="<?php echo $product['id']?>"
                    data-like="<?php echo isset($like['like'])&&$like['like']==1?0:1;?>"
                    data-user_id="<?php echo $user_id ?>">
                    <strong>Favorite</strong>
                    <i class="fa fa-heart <?php echo isset($like['like'])&&$like['like']==1?'fa-solid':'fa-regular';?>"
                        id="heart-icon"></i>
                </button>

            </div>
            <div class="p-description">
                <h2>Description</h2>
                <p><?php echo ' '. $product['description']?></p>
            </div>



        </div>
    </div>
</div>
<section class="recommendations">
    <h2>RECOMMENDED FOR YOU</h2>
    <div class="carousel-wrapper">
        <div class="carousel">
            <div class="card">
                <img src="http://sneaker-head.local/assets/images/asics.jpg" alt="Air Jordan Retro 12">
                <div class="card-details">

                    <h3>Air Jordan Retro 12 Basketball Shoes</h3>
                    <p class="price">$200.00</p>
                </div>
            </div>
            <div class="card">
                <img src="http://sneaker-head.local/assets/images/asics.jpg" alt="Air Jordan Retro 12">
                <div class="card-details">

                    <h3>Air Jordan Retro 12 Basketball Shoes</h3>
                    <p class="price">$200.00</p>
                </div>
            </div>
            <div class="card">
                <img src="http://sneaker-head.local/assets/images/asics.jpg" alt="Air Jordan Retro 12">
                <div class="card-details">

                    <h3>Air Jordan Retro 12 Basketball Shoes</h3>
                    <p class="price">$200.00</p>
                </div>
            </div>
            <div class="card">
                <img src="http://sneaker-head.local/assets/images/asics.jpg" alt="Air Jordan Retro 12">
                <div class="card-details">

                    <h3>Air Jordan Retro 12 Basketball Shoes</h3>
                    <p class="price">$200.00</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="recommendations">
    <h2>RECENTLY VIEWED</h2>
    <div class="carousel-wrapper">
        <div class="carousel">
            <div class="card">
                <img src="http://sneaker-head.local/assets/images/asics.jpg" alt="Air Jordan Retro 12">
                <div class="card-details">

                    <h3>Air Jordan Retro 12 Basketball Shoes</h3>
                    <p class="price">$200.00</p>
                </div>
            </div>
            <div class="card">
                <img src="http://sneaker-head.local/assets/images/asics.jpg" alt="Air Jordan Retro 12">
                <div class="card-details">

                    <h3>Air Jordan Retro 12 Basketball Shoes</h3>
                    <p class="price">$200.00</p>
                </div>
            </div>
            <div class="card">
                <img src="http://sneaker-head.local/assets/images/asics.jpg" alt="Air Jordan Retro 12">
                <div class="card-details">

                    <h3>Air Jordan Retro 12 Basketball Shoes</h3>
                    <p class="price">$200.00</p>
                </div>
            </div>
            <div class="card">
                <img src="http://sneaker-head.local/assets/images/asics.jpg" alt="Air Jordan Retro 12">
                <div class="card-details">

                    <h3>Air Jordan Retro 12 Basketball Shoes</h3>
                    <p class="price">$200.00</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$shoes = get_all_project_details(); // your product list
$favourite = get_fav_data_by_user_id($user_id);

$brand_meta = getUserMeta($user_id, '_brand_preferences');
$brand_meta = is_array($brand_meta) ? $brand_meta : [];

$category_meta = getUserMeta($user_id, '_category_preferences');
$category_meta = is_array($category_meta) ? $category_meta : [];

$type_meta = getUserMeta($user_id, '_type_preferences');
$type_meta = is_array($type_meta) ? $type_meta : [];

// Reindex shoes by id
$shoesById = [];
foreach ($shoes as $shoe) {
    $shoe['type'] = explode(',', str_replace(' ', '', $shoe['type']));
    $shoe['brand'] = explode(',', str_replace(' ', '', $shoe['brand']));
    $shoe['category'] = explode(',', str_replace(' ', '', $shoe['category']));
    $shoesById[$shoe['id']] = $shoe;
}

// Clean liked IDs array - extract product IDs if $favourite contains arrays
$likedIds = [];
if (is_array($favourite)) {
    foreach ($favourite as $fav) {
        if (is_array($fav) && isset($fav['product_id'])) {
            $likedIds[] = $fav['product_id'];
        } elseif (is_scalar($fav)) {
            $likedIds[] = $fav;
        }
    }
}

$cartIds = []; // Assuming cart IDs are already scalar values

$preferences = [
    "type" => $type_meta,
    "brand" => $brand_meta,
    "category" => $category_meta
];
function getItemsByIds($ids, $allItems) {
    $items = [];
    foreach ($ids as $id) {
        if (isset($allItems[$id])) {
            $items[] = $allItems[$id];
        }
    }
    return $items;
}

$likedItems = getItemsByIds($likedIds, $shoesById);
$cartItems  = getItemsByIds($cartIds, $shoesById);

function calculateSimilarity($item1, $item2) {
    return
        count(array_intersect($item1['type'],  $item2['type'])) +
        count(array_intersect($item1['brand'], $item2['brand'])) +
        count(array_intersect($item1['category'], $item2['category']));
}

function preferenceSimilarity($item, $prefs) {
    return
        count(array_intersect($item['type'],  $prefs['type'])) +
        count(array_intersect($item['brand'], $prefs['brand'])) +
        count(array_intersect($item['category'], $prefs['category']));
}

$recommendations = [];

foreach ($shoesById as $id => $shoe) {
    if (in_array($id, array_merge($likedIds, $cartIds))) continue;

    $likeScore = 0;
    foreach ($likedItems as $likedItem) {
        $likeScore += calculateSimilarity($shoe, $likedItem);
    }

    $cartScore = 0;
    foreach ($cartItems as $cartItem) {
        $cartScore += calculateSimilarity($shoe, $cartItem);
    }

    $prefScore = preferenceSimilarity($shoe, $preferences);

    $finalScore = (0.4 * $likeScore) + (0.3 * $cartScore) + (0.3 * $prefScore);

    $recommendations[] = [
        'title' => $shoe['title'],
        'score' => $finalScore
    ];
}

usort($recommendations, fn($a, $b) => $b['score'] <=> $a['score']);

echo "Top Recommended Shoes:<br>";
foreach ($recommendations as $rec) {
    echo "- {$rec['title']} (Score: {$rec['score']})<br>";
}