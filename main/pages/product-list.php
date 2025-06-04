<?php
// session_start();
include_once('../../config/functions.php');
include_once('sidebar.php');


$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
$email = isset($_SESSION['email']) ? $_SESSION['email'] : "";

if (empty($user_id)) {
    header("Location: /main/pages/login.php");
    exit(); 
}

?>

<style>
/* body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #1e1e1e;
      color: #ffffff;
      padding: 40px;
    } */

h1 {
    font-size: 32px;
    color: #ffffff;
}

p.subtitle {
    color: #888;
}

.top-bar {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin: 20px 0;
}

.top-bar button {
    padding: 10px 16px;
    border: none;
    cursor: pointer;
    border-radius: 6px;
    font-weight: 600;
}

.btn-export,
.btn-import {
    background-color: #333;
    color: #fff;
}

.btn-create {
    background-color: #00c2b2;
    color: #fff;
}

.filters {
    background-color: #2a2a2a;
    padding: 20px;
    display: flex;
    gap: 20px;
    border-radius: 10px;
    align-items: center;
}

select,
input[type="date"] {
    padding: 10px;
    border-radius: 6px;
    border: none;
    background-color: #1e1e1e;
    color: #fff;
}

.product-table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

.product-row {
    display: flex;
    align-items: center;
    padding: 15px;
    border-bottom: 1px solid #333;
}

.product-row img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 5px;
    margin-right: 20px;
    margin-left: 20px;
}

.product-name {
    flex: 2;
}

.product-price,
.product-status,
.product-date,
.product-actions {
    flex: 1;
    text-align: center;
}

.status {
    padding: 4px 10px;
    border-radius: 15px;
    font-size: 12px;
    display: inline-block;
}

.active {
    background-color: #1f7a1f;
}

.archived {
    background-color: #b87333;
}

.disabled {
    background-color: #a52a2a;
}

.btn-edit,
.btn-delete {
    padding: 6px 12px;
    margin: 0 4px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-edit {
    background-color: #00c2b2;
    color: #fff;
}

.btn-delete {
    background-color: #333;
    color: #fff;
}
</style>
<link rel="stylesheet" href="http://sneaker-head.local/assets/css/style.css">

<main class="main-container">
    <h1>Products List</h1>
    <div class="top-bar">

        <a href="add_product.php">
            <button class="add-product-btn">+ Add Product</button>
        </a>
    </div>
    <div class="filters">
        <select>
            <option>All category</option>
            <option>Casuals</option>
            <option>Running</option>
            <option>Basketball</option>
            <option>Retro</option>
        </select>
        <input type="date">
    </div>

    <?php 
    $products=getAllProjects();
    if(is_array($products) && !empty($products)){
        foreach($products as $product){
        ?>
    <div class="product-table">
        <div class="product-row">
            <input type="checkbox">
            <img src="http://sneaker-head.local<?php echo $product['product_image']?>" alt="Product">
            <div class="product-name"><?php echo $product['title']?></div>
            <div class="product-price">Rs.<?php echo $product['price']?></div>
            <div class="product-status"><span class="status active">Active</span></div>
            <div class="product-date"><?php echo $product['created_at']?></div>
            <div class="product-actions">
                <button class="btn-edit edit-product-btn" data-product_id="<?php echo $product['id'];?>"
                    data-product_title="<?php echo $product['title'];?>"
                    data-product_desc="<?php echo $product['description'];?>"
                    data-product_price="<?php echo $product['price'];?>"
                    data-product_category="<?php echo $product['category'];?>"
                    data-product_brand="<?php echo $product['brand'];?>"
                    data-product_type="<?php echo $product['type'];?>"
                    data-product_size="<?php echo $product['size'];?>">Edit</button>
                <button class="btn-delete">Delete</button>
            </div>
        </div>
        <!-- Repeat similar product-row divs for other products -->
    </div>

    <?php
        }
    }
    ?>
    <!-- edut product form -->
    <main class="edit-form-container hide">
        <div id="close-edit-form"><i class="fa-solid fa-xmark"></i></div>
        <form action="#" method="POST" enctype="multipart/form-data" id="update_product_form" class="product-form edit-product-form">
            <h2>Edit Product</h2>
            <div class="" id="update_product_message"></div>
            <input type="hidden" id="product_id" value="">
            <div class="field-group">
                <div class="form-group">
                    <label for="title">Product Title</label>
                    <input type="text" name="title" id="title" required>
                </div>

                <div class="form-group">
                    <label for="price">Price ($)</label>
                    <input type="number" name="price" id="price" required>
                </div>
            </div>
            <div class="add_product_form_fields field-group">
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" required>
                        <option value="">select-category</option>
                        <option value="men">Men</option>
                        <option value="women">Women</option>
                        <option value="kid">Kid</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Brand">Brand</label>
                    <select name="brand" id="brand" required>
                        <option value="">select-brand</option>
                        <option value="nike">Nike</option>
                        <option value="new-balance">New Balance</option>
                        <option value="jordan">Jordan</option>
                        <option value="adidas">Adidas</option>
                        <option value="asics">Asics</option>
                    </select>
                </div>
            </div>

            <div class="field-group">
                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type" id="type" required>
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
            </div>
            <!-- <div class="add_product_form_fields">
            <div class="form-group">
                <label for="image">Product Thumbnail Image</label>
                <input type="file" name="thumb_image" id="image" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="image">Gallery Images</label>
                <input type="file" name="gallery_image[]" id="image" multiple accept="image/*" required>
            </div>
        </div> -->

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="4" required
                    placeholder="add description"></textarea>
            </div>

            <button type="submit" name="create_product_btn" id="create_product_btn" class="submit-btn">Update
                Product</button>
        </form>
    </main>


    </section>
</main>