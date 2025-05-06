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


function getProductDetails(){
    try {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM products");
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