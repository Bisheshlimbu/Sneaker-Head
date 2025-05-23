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


function getProductDetails($brand, $type, $category){
    try {
        global $conn;
        $condition="";
        if(!empty($brand)&& empty($type) && empty($category)){
            $condition= "WHERE brand='$brand'";
        }elseif(empty($brand)&& !empty($type) && empty($category)){
            $condition= "WHERE type='$type'";
        }elseif(empty($brand)&& empty($type) && !empty($category)){
            $condition= "WHERE category='$category'";
        }

        $stmt = $conn->prepare("SELECT * FROM products $condition");
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
