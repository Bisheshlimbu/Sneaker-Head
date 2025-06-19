<?php 
include_once('../header.php');

// if($user_id){
    $cartDetails=getCartDetails($user_id);
    // var_dump($cartDetails);
// }
?>

<style>
.cart-container {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    margin: 20px;
}

.product-section,
.summary-section {
    background-color: #222;
    padding: 20px;
    border-radius: 8px;
    width: 70%;

}

.product-section {
    max-height: 600px;
    min-height: 100%;
    overflow-y: auto;
}

.summary-section {
    width: 30%;
    max-height: 300px;

    p {
        margin-top: 10px;
    }
}

.product-section h2 {
    border-bottom: 1px solid #444;
    margin: 0 0 10px;
    padding: 5px 0;
}

.product-item {
    display: flex;
    margin-bottom: 20px;
    border-bottom: 1px solid #444;
    padding-bottom: 30px;
}

.product-image {
    width: 400px;
    height: 300px;
    border-radius: 8px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f8f8;
    /* Optional: better contrast if image doesn't fill */
}

.product-image img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    display: block;
    border-radius: 8px;

}


.product-details {
    margin-left: 50px;
}

.product-details h3,
p {
    margin: 0 0 10px;
}

.quantity-controls {
    display: flex;
    align-items: center;
    margin: 10px 0;
}

.quantity-controls button {
    background: none;
    border: 1px solid #888;
    color: #fff;
    padding: 5px 10px;
    margin: 0 5px;
    cursor: pointer;
}

.summary-section input[type="text"] {

    width: 100%;
    padding: 8px;
    margin-bottom: 20px;
    border: none;
    border-radius: 4px;

    p {
        margin-top: 50px;
    }
}

.checkout-button,
.afterpay-button,
.more-options {
    width: 100%;
    padding: 20px;
    margin-top: 10px;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
}

.checkout-button {
    background-color: #00aaff;
    color: white;
}

.afterpay-button {
    background-color: #007f5f;
    color: white;
}

.more-options {
    background-color: #333;
    color: white;
    border: 1px solid #555;
}

input[type="checkbox"] {
    width: 20px;
    height: 20px;
    accent-color: #00aaff;
    /* Optional: custom checkbox color */
    cursor: pointer;
}
</style>


<div class="cart-container">
    <div class="product-section">
        <h2>Products</h2>

        <?php 
    if (is_array($cartDetails) && !empty($cartDetails)) {
        foreach ($cartDetails as $cart) {
            $product = getProductDetailsByProduct_id($cart['product_id']);
            $checkboxId = 'product_' . $product['id']; // Unique ID for each checkbox
            $total_price=(int)$product['price'] * (int)$cart['quantity'];
             ?>
        <div class="product-item">
            <label for="<?php echo $checkboxId; ?>" style="display: flex; align-items: flex-start;">
                <input type="checkbox" id="<?php echo $checkboxId; ?>" name="selected_products[]"
                    value="<?php echo $product['id']; ?>" style="margin-right: 10px; margin-top: 5px;"
                    data-user_id="<?php echo $user_id;?>" data-total_price="<?php echo $total_price;?>">
                <a href="single.php?pid=<?php echo $product['id']?>" class="product-image">
                    <img src="<?php echo $product['product_image']; ?>" alt="Shoe">
                </a>
                <div class="product-details">
                    <h3><?php echo $product['title']; ?></h3>
                    <p>Size: <?php echo $cart['size']; ?></p>
                    <p><?php echo mb_strimwidth($product['description'], 0, 50, "..."); ?></p>
                    <div class="quantity-controls">
                        <span>Qty: <?php echo $cart['quantity']; ?></span>
                    </div>
                    <p><strong>Price: Rs. <?php echo $product['price']; ?></strong></p>
                    <p><strong>Total Price: Rs.
                            <?php echo $total_price; ?></strong></p>
                </div>
            </label>
        </div>
        <?php
        }
    }else{
        echo "No Product found in cart.";
    }
    ?>

    </div>

    <div class="summary-section">
        <!-- <div> -->
        <h2>Purchase Summary</h2>

        <p>Subtotal (<span id="checked-count"></span> item): <strong class="total-price"></strong></p>
        <!-- <p>Estimated Shipping: <strong>Free</strong></p> -->
        <!-- <p>Tax: <strong>TBD</strong></p> -->
        <hr>
        <p>Total: <strong class="total-price"></strong></p>

        <button class="checkout-button">PROCEED TO CHECKOUT</button>
        <!-- <button class="afterpay-button">Pay now with esewa</button> -->
        <!-- <button class="more-options">+ MORE PAYMENT OPTIONS</button> -->
        <!-- </div> -->
    </div>