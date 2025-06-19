<?php
include_once('../../config/connection.php');
include_once('sidebar.php');



if (empty($user_id)) {
    header("Location: /main/pages/login.php");
    exit();
}


if (isset($_POST['create_product_btn'])) {


    $title = $_POST['title'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $created_at = $updated_at = strtolower(date('F-d-Y'));

    $sizeArray = array_map('intval', explode('-', $_POST['size']));
    $sizeJson = json_encode($sizeArray);

    if (isset($_POST) && $_FILES) {

        $base_dir = '/assets/uploads/';
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . $base_dir;

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // First: Save thumbnail image
        $thumb_name = $_FILES['thumb_image']['name'];
        $thumb_tmp = $_FILES['thumb_image']['tmp_name'];

        if (move_uploaded_file($thumb_tmp, $uploadDir . $thumb_name)) {
            $thumb_url = $base_dir . $thumb_name;

            // Now INSERT the product with the thumbnail image
            $stmt = $conn->prepare("INSERT INTO products(title, price, category, brand, type,size, product_image, description, created_at, updated_at)
            VALUES(:title, :price, :category, :brand, :type, :size, :product_image, :description, :created_at, :updated_at)");

            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':price', $price, PDO::PARAM_STR);
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->bindParam(':size', $sizeJson, PDO::PARAM_STR);
            $stmt->bindParam(':product_image', $thumb_url, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
            $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $product_id = $conn->lastInsertId();

                // Save gallery images
                foreach ($_FILES['gallery_image']['name'] as $key => $name) {
                    $tmp_name = $_FILES['gallery_image']['tmp_name'][$key];

                    if (move_uploaded_file($tmp_name, $uploadDir . $name)) {
                        $gallery_url = $base_dir . $name;

                        $stmt2 = $conn->prepare("INSERT INTO attachments (product_id, url, created_at, updated_at)
                                                VALUES (:product_id, :url, :created_at, :updated_at)");
                        $stmt2->bindParam(':product_id', $product_id, PDO::PARAM_INT);
                        $stmt2->bindParam(':url', $gallery_url, PDO::PARAM_STR);
                        $stmt2->bindParam(':created_at', $created_at, PDO::PARAM_STR);
                        $stmt2->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);

                        $stmt2->execute();
                    } else {
                        echo '<div style="color:red;">Failed to upload ' . htmlspecialchars($name) . '</div>';
                    }
                }

                echo '<div style="color:green;">Product and Images Added Successfully.</div>';
            } else {
                echo '<div style="color:red;">Failed to insert product into database.</div>';
            }

        } else {
            echo '<div style="color:red;">Failed to upload thumbnail image.</div>';
        }
    }
}
?>
<link rel="stylesheet" href="http://sneaker-head.local/assets/css/style.css">

<main class="form-container">
    <form action="#" method="POST" enctype="multipart/form-data" class="product-form">
        <h2>Add New Product</h2>
        <div>
            <div class="form-group">
                <label for="title">Product Title</label>
                <input type="text" name="title" id="title" required>
            </div>

            <div class="form-group">
                <label for="price">Price ($)</label>
                <input type="number" name="price" id="price" required>
            </div>
        </div>
        <div class="add_product_form_fields">
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" required>
                    <option value="">select-category</option>
                    <option value="men">Men</option>
                    poportugal <option value="women">Women</option>
                    <option value="kid">Kid</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Brand">Brand</label>
                <select name="brand" required>
                    <option value="">select-brand</option>
                    <option value="nike">Nike</option>
                    <option value="new-balance">New Balance</option>
                    <option value="jordan">Jordan</option>
                    <option value="adidas">Adidas</option>
                    <option value="asics">Asics</option>
                    <option value="goldstar">goldstar</option>
                </select>
            </div>
        </div>


        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" required>
                <option value="">select-type</option>
                <option value="casuals">Casuals</option>
                <option value="running">Running</option>
                <option value="basketball">Basketball</option>
            </select>

        </div>
        <div class="form-group">
            <label for="Size">Size</label>
            <input type="text" name="size" id="size" placeholder="36-40-42-44...." required>
            <span id="size-error" style="color:red;"></span>
        </div>
        <div class="add_product_form_fields">
            <div class="form-group">
                <label for="image">Product Thumbnail Image</label>
                <input type="file" name="thumb_image" id="image" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="image">Gallery Images</label>
                <input type="file" name="gallery_image[]" id="image" multiple accept="image/*" required>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4" required placeholder="add description"></textarea>
        </div>

        <button type="submit" name="create_product_btn" id="create_product_btn" class="submit-btn">Add Product</button>
    </form>
</main>
<script>
    document.getElementById("size").addEventListener("input", function () {
        const sizeInput = this.value;
        const errorMsg = document.getElementById("size-error");
        const addBtn = document.querySelector('#create_product_btn');

        // Check for invalid characters: only numbers and single hyphens allowed
        if (!/^[0-9\-]*$/.test(sizeInput)) {
            errorMsg.textContent = "Only numbers and hyphens (-) are allowed.";
            return;
        }

        // Check for double hyphens
        if (sizeInput.includes("--")) {
            errorMsg.textContent = "Double hyphens (--) are not allowed.";
            addBtn.setAttribute("disabled", true);
            addBtn.style.cursor = "not-allowed";
            return;
        }

        // Validate individual sizes
        const sizes = sizeInput.split("-");
        for (let size of sizes) {
            if (size === "") {
                errorMsg.textContent = "Each size must be a number. No empty values allowed.";
                addBtn.setAttribute("disabled", true);
                addBtn.style.cursor = "not-allowed";


                return;
            }

            const num = parseInt(size);
            if (isNaN(num) || num < 30 || num > 45) {
                errorMsg.textContent = "Sizes must be numbers from 30 to 45.";
                addBtn.setAttribute("disabled", true);
                addBtn.style.cursor = "not-allowed";

                return;
            }
        }

        // If all checks pass
        addBtn.removeAttribute("disabled");
        addBtn.style.cursor = "";
        errorMsg.textContent = "";
    });
</script>