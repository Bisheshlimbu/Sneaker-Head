<?php 
include_once('connection.php');


function getUsersDetailsById($user_id){
    try {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
        $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $users = $stmt->fetch(PDO::FETCH_ASSOC);
            return $users;
        }

    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return "Database error: " . $e->getMessage();
    } catch (Exception $e) {
        error_log("An error occurred: " . $e->getMessage());
        return "An error occurred: " . $e->getMessage();
    }
}


function getAllProjects(){
    try {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM products");
        // $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $projects;
        }

    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return "Database error: " . $e->getMessage();
    } catch (Exception $e) {
        error_log("An error occurred: " . $e->getMessage());
        return "An error occurred: " . $e->getMessage();
    }
}

function updateProductDetails($params){
   
    try {
        global $conn;
        $updated_at = strtolower(date('F-d-Y'));

$sizes = $params['size']; // original array of strings

// Convert each element to int
$sizes_int = array_map('intval', $sizes);

// Encode to JSON string (numbers, no quotes)
$json_sizes = json_encode($sizes_int);


        $stmt = $conn->prepare("UPDATE products SET title=:title, price=:price, category=:category, brand=:brand, type=:type, size=:size,
        description=:description, updated_at=:updated_at WHERE id=:id");

        $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
        $stmt->bindParam(':title', $params['title'], PDO::PARAM_STR);
        $stmt->bindParam(':price', $params['price'], PDO::PARAM_STR);
        $stmt->bindParam(':category', $params['category'], PDO::PARAM_STR);
        $stmt->bindParam(':brand', $params['brand'], PDO::PARAM_STR);
        $stmt->bindParam(':type', $params['type'], PDO::PARAM_STR);
        $stmt->bindParam(':size', $json_sizes, PDO::PARAM_STR);
        $stmt->bindParam(':description', $params['desc'], PDO::PARAM_STR);
        $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);

        if($stmt->execute()){
            return true;
        };

    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return "Database error: " . $e->getMessage();
    } catch (Exception $e) {
        error_log("An error occurred: " . $e->getMessage());
        return "An error occurred: " . $e->getMessage();
    }
}

  

function getProductDetails($brand, $type, $category, $arrivel) {
    try {
        global $conn;

        $sql = "SELECT * FROM products";
        $conditions = [];
        $params = [];

        if (!empty($brand)) {
            $conditions[] = "brand = :brand";
            $params[':brand'] = $brand;
        }

        if (!empty($type)) {
            $conditions[] = "type = :type";
            $params[':type'] = $type;
        }

        if (!empty($category)) {
            $conditions[] = "category = :category";
            $params[':category'] = $category;
        }

        // Check for 'arrivel' parameter to filter products added in the last 7 days
        if (!empty($arrivel) && $arrivel === 'new-arrivels') {
            $conditions[] = "created_at >= NOW() - INTERVAL 7 DAY";
        }

        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;

    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return "Database error: " . $e->getMessage();
    } catch (Exception $e) {
        error_log("An error occurred: " . $e->getMessage());
        return "An error occurred: " . $e->getMessage();
    }
}



function getProductDetailsForNew(){
    try {
        global $conn;
        $stmt = $conn->prepare("SELECT * 
FROM products
WHERE STR_TO_DATE(created_at, '%M-%d-%Y') >= CURDATE() - INTERVAL 7 DAY
LIMIT 4");
        // $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $products;
        }

    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return "Database error: " . $e->getMessage();
    } catch (Exception $e) {
        error_log("An error occurred: " . $e->getMessage());
        return "An error occurred: " . $e->getMessage();
    }
}


function getProductDetailsByProduct_id($product_id){
    try {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM products WHERE id=:id");
        $stmt->bindParam(':id', $product_id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $products = $stmt->fetch(PDO::FETCH_ASSOC);
            return $products;
        }

    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return "Database error: " . $e->getMessage();
    } catch (Exception $e) {
        error_log("An error occurred: " . $e->getMessage());
        return "An error occurred: " . $e->getMessage();
    }
}


function getProductAttachmentsByProduct_id($product_id){
    try {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM attachments as a 
        INNER JOIN products as p ON a.product_id=p.id WHERE a.product_id=:product_id");
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $products;
        }

    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return "Database error: " . $e->getMessage();
    } catch (Exception $e) {
        error_log("An error occurred: " . $e->getMessage());
        return "An error occurred: " . $e->getMessage();
    }
}



function updateUserMeta($user_id, $meta_key, $meta_value){
    try {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM user_meta WHERE user_id=:user_id AND meta_key=:meta_key");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':meta_key', $meta_key, PDO::PARAM_STR);
        $stmt->execute();
        $existing = $stmt->fetchAll(PDO::FETCH_ASSOC);
           
         if ($existing) {
            // Update if exists
            $updateStmt = $conn->prepare("UPDATE user_meta SET meta_value = :meta_value WHERE user_id = :user_id AND meta_key = :meta_key");
            $updateStmt->bindParam(':meta_value', $meta_value, PDO::PARAM_STR);
            $updateStmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $updateStmt->bindParam(':meta_key', $meta_key, PDO::PARAM_STR);
            $updateStmt->execute();
        } else {
            // Insert if not exists
            $insertStmt = $conn->prepare("INSERT INTO user_meta (user_id, meta_key, meta_value) VALUES (:user_id, :meta_key, :meta_value)");
            $insertStmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $insertStmt->bindParam(':meta_key', $meta_key, PDO::PARAM_STR);
            $insertStmt->bindParam(':meta_value', $meta_value, PDO::PARAM_STR);
            $insertStmt->execute();
        }

        return true;

    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return "Database error: " . $e->getMessage();
    } catch (Exception $e) {
        error_log("An error occurred: " . $e->getMessage());
        return "An error occurred: " . $e->getMessage();
    }
}




function get_all_project_details(){
    try {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM products");
       
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
                   
        return $products;

    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return "Database error: " . $e->getMessage();
    } catch (Exception $e) {
        error_log("An error occurred: " . $e->getMessage());
        return "An error occurred: " . $e->getMessage();
    }
}



function getUserMeta($user_id, $meta_key){
    try {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM user_meta WHERE user_id = :user_id AND meta_key = :meta_key");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':meta_key', $meta_key, PDO::PARAM_STR);
        $stmt->execute();
        $existing = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing && isset($existing['meta_value'])) {
            $unserialized = @unserialize($existing['meta_value']);
            // If it's a valid serialized string and returns an array
            if ($unserialized !== false || $existing['meta_value'] === 'b:0;') {
                return $unserialized;
            } else {
                return $existing['meta_value']; // Fallback if not serialized
            }
        }

        return null;

    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return "Database error: " . $e->getMessage();
    } catch (Exception $e) {
        error_log("An error occurred: " . $e->getMessage());
        return "An error occurred: " . $e->getMessage();
    }
}
function saveCartItems($params){
    try {
        global $conn;

        $user_id = $params['user_id'];
        $product_id = $params['product_id'];
        $size = $params['size'];
        $quantity = $params['qty'];

        // 1. Check if item exists
        $stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id AND size = :size");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':size', $size, PDO::PARAM_INT); // use STR if sizes like "10.5"
        $stmt->execute();
        $existing = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing) {
            // 2. Update quantity if item exists
            $updateStmt = $conn->prepare("UPDATE cart SET quantity = quantity + :quantity WHERE user_id = :user_id AND product_id = :product_id AND size = :size");
            $updateStmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $updateStmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $updateStmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $updateStmt->bindParam(':size', $size, PDO::PARAM_INT);
            if($updateStmt->execute()){
                return true;
            };
        } else {
            // 3. Insert new item if not exists
            $insertStmt = $conn->prepare("INSERT INTO cart (user_id, product_id, size, quantity) VALUES (:user_id, :product_id, :size, :quantity)");
            $insertStmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $insertStmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $insertStmt->bindParam(':size', $size, PDO::PARAM_INT);
            $insertStmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            if($insertStmt->execute()){
                return true;
            };
        }


    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return "Database error: " . $e->getMessage();
    } catch (Exception $e) {
        error_log("An error occurred: " . $e->getMessage());
        return "An error occurred: " . $e->getMessage();
    }
}

function add_to_fav($params) {
    try {
       
        global $conn;

        $product_id = $params['product_id'];
        $user_id = $params['user_id'];
 
        // First check if the product_id already exists
        $checkStmt = $conn->prepare("SELECT id FROM product_meta WHERE product_id = :product_id AND user_id=:user_id");
        $checkStmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $checkStmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $checkStmt->execute();

        if ($checkStmt->rowCount() > 0) {
            
            // Product already exists — update the 'like' value
            $updateStmt = $conn->prepare("UPDATE product_meta SET `like` = :like WHERE product_id = :product_id AND user_id=:user_id");
            $updateStmt->bindParam(':like', $params['like'], PDO::PARAM_INT);
            $updateStmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $updateStmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $updateStmt->execute();
            return ['status'=>'success','like'=>$params['like']];
        } else {
            
            // Product doesn't exist — insert a new row
            $insertStmt = $conn->prepare("INSERT INTO product_meta (user_id, product_id, `like`) VALUES (:user_id, :product_id, :like)");
            $insertStmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $insertStmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $insertStmt->bindParam(':like', $params['like'], PDO::PARAM_INT);
            $insertStmt->execute();
            return ['status'=>'success','like'=>$params['like']];
        }

    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return false;
    } catch (Exception $e) {
        error_log("General error: " . $e->getMessage());
        return false;
    }
}


function get_fav_data($product_id) {
    try {
        global $conn;

        // First check if the product_id already exists
        $checkStmt = $conn->prepare("SELECT * FROM product_meta WHERE product_id = :product_id");
        $checkStmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $checkStmt->execute();
        $existing = $checkStmt->fetch(PDO::FETCH_ASSOC);

        if($existing){
            return $existing;
        }else{
            return [];
        }
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return false;
    } catch (Exception $e) {
        error_log("General error: " . $e->getMessage());
        return false;
    }
}

function get_fav_data_by_user_id($user_id) {
    try {
        global $conn;

        // Escape "like" with backticks if it's a column name
        $checkStmt = $conn->prepare("SELECT product_id FROM product_meta WHERE user_id = :user_id AND `like` = 1");
        $checkStmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $checkStmt->execute();
        $existing = $checkStmt->fetchAll(PDO::FETCH_ASSOC);

        return $existing ?: []; // Return empty array if no data found

    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return false;
    } catch (Exception $e) {
        error_log("General error: " . $e->getMessage());
        return false;
    }
}

function current_page() {
    $currentPage = basename($_SERVER['PHP_SELF']); // gets 'profile.php'
    return $currentPage;
}



function getCartDetails($user_id){
    try {
        global $conn;

        $stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $existing = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($existing){
            return $existing;
        }
       
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return "Database error: " . $e->getMessage();
    } catch (Exception $e) {
        error_log("An error occurred: " . $e->getMessage());
        return "An error occurred: " . $e->getMessage();
    }
}
function getRecommendedProducts($user_profile) {
    try {
        global $conn;
        $stmt = $conn->query("SELECT * FROM products");
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $recommendations = [];

        foreach ($products as $product) {
            $score = 0;

            // Normalize values for comparison
            $brand = strtolower($product['brand']);
            $category = strtolower($product['category']);
            $type = strtolower($product['type']);

            // Brand match
            if (in_array($brand, array_map('strtolower', $user_profile['brand']))) {
                $score += 3;
            }

            // Category match
            if (in_array($category, array_map('strtolower', $user_profile['category']))) {
                $score += 2;
            }

            // Type match
            if (in_array($type, array_map('strtolower', $user_profile['type']))) {
                $score += 2;
            }

            // Only add product if score > 0
            if ($score > 0) {
                $product['score'] = $score;
                $recommendations[] = $product;
            }
        }

        // Sort by score descending
        usort($recommendations, fn($a, $b) => $b['score'] <=> $a['score']);

        return $recommendations;

    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return "Database error: " . $e->getMessage();
    } catch (Exception $e) {
        error_log("An error occurred: " . $e->getMessage());
        return "An error occurred: " . $e->getMessage();
    }
}


//recommendation algorithm implementiaono

function get_recommendation($user_id, $product_id){

    $shoes = get_all_project_details(); // Fetch all products

    $favourite = get_fav_data_by_user_id($user_id); // Liked products

    //user preferences
    $brand_meta = getUserMeta($user_id, '_brand_preferences');
    $brand_meta = is_array($brand_meta) ? $brand_meta : [];

    $category_meta = getUserMeta($user_id, '_category_preferences');
    $category_meta = is_array($category_meta) ? $category_meta : [];

    $type_meta = getUserMeta($user_id, '_type_preferences');
    $type_meta = is_array($type_meta) ? $type_meta : [];

    $cartDetails=getCartDetails($user_id);
    
    // Reindex shoes by ID and normalize fields
    $shoesById = [];
    foreach ($shoes as $shoe) {
        $shoe['type']     = explode(',', str_replace(' ', '', $shoe['type']));
        $shoe['brand']    = explode(',', str_replace(' ', '', $shoe['brand']));
        $shoe['category'] = explode(',', str_replace(' ', '', $shoe['category']));
        $shoesById[$shoe['id']] = $shoe;
    }

    // Clean liked product IDs
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

    $cartIds = []; // Add cart IDs if applicable
    if (is_array($cartDetails)) {
        foreach ($cartDetails as $cart) {
            if (is_array($cart) && isset($cart['product_id'])) {
                $cartIds[] = $cart['product_id'];
            } elseif (is_scalar($cart)) {
                $cartIds[] = $cart;
            }
        }
    }
    $preferences = [
        "type"     => $type_meta,
        "brand"    => $brand_meta,
        "category" => $category_meta
    ];

    // Step 1: Helper to get items by ID
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

    // Step 2: Similarity functions
    function calculateSimilarity($item1, $item2) {
        return
            count(array_intersect($item1['type'],     $item2['type'])) +
            count(array_intersect($item1['brand'],    $item2['brand'])) +
            count(array_intersect($item1['category'], $item2['category']));
    }

    function preferenceSimilarity($item, $prefs) {
        return
            count(array_intersect($item['type'],     $prefs['type'])) +
            count(array_intersect($item['brand'],    $prefs['brand'])) +
            count(array_intersect($item['category'], $prefs['category']));
    }

    // Step 3: Generate recommendations only if there’s user data
    $recommendations = [];

    if (!empty($likedIds) || !empty($cartIds) ||
        !empty($preferences['type']) || !empty($preferences['brand']) || !empty($preferences['category'])) {

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
                'id' => $id,
                'name' => $shoe['title'],
                'score' => $finalScore
            ];
        }

        // Sort by score
        usort($recommendations, fn($a, $b) => $b['score'] <=> $a['score']);

        // Filter out products with 0 score
        $filteredRecommendations = array_filter($recommendations, fn($rec) => $rec['score'] > 2);

    if (!empty($filteredRecommendations)) {
        
        foreach ($filteredRecommendations as $rec) {
            $product_id = $rec['id']; // Get the product ID from recommendation
            $product = getProductDetailsByProduct_id($product_id); // Fetch full product details
            // var_dump($product); // Or display in your preferred format
            ?>
            <a href="single.php?pid=<?php echo $product['id']?>" class="card recommend_card">
                <img src="http://sneaker-head.local<?php echo $product['product_image'];?>" alt="Air Jordan Retro 12">
                <div class="card-details">
                    <h3><?php echo $product['title'];?></h3>
                    <p class="colors"><?php echo $product['brand']?></p>
                    <p class="price">Rs.<?php echo $product['price'];?></p>
                </div>
            </a>
            <?php
        }
    } else {
        // echo "No strong matches found yet. Try liking some products or updating your preferences.<br>";
    }

    } else {
        // echo "No recommendations yet. Please like products or set your preferences to get personalized suggestions.<br>";
    }
}