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
WHERE STR_TO_DATE(created_at, '%b-%d-%Y') >= CURDATE() - INTERVAL 7 DAY
LIMIT 5");
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