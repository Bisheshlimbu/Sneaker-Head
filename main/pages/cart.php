

<?php include_once('../header.php')?>

    <style>
        /* body {
            background-color: #111;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        } */
        .cart-container {
            display: flex;
            justify-content: space-between; 
            gap: 20px;
            margin:  20px;
            
        
           
        }
        .product-section, .summary-section{
            background-color: #222;
            padding: 20px;
            border-radius: 8px;
            width: 50%;
            
        }
        
        .product-item {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 1px solid #444;
            padding-bottom: 30px;
        }
        .product-image img {
            width: 350px;
            height: 350;
            border-radius: 8px;
        }
        .product-details {
            margin-left: 50px;
        }
        .product-details h3 {
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
            p{
                margin-top: 50px;
            }
        }
        .checkout-button,.afterpay-button,.more-options {
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
    </style>


<div class="cart-container">
    <div class="product-section">
        <h2>Product</h2>
        <div class="product-item">
            <div class="product-image">
                <img src="../../assets/images/favs.jpg" alt="Shoe">
            </div>
            <div class="product-details">
                <h3>Men's ASICS GEL-1130 Casual Shoes</h3>
                <p>Size: 9.5</p>
                <p>Color: White/Clay Canyon</p>
                <p>Qualifies for Free Shipping</p>
                <p><a href="#" style="color: #00aaff;">Save for later</a></p>
                <p>🔥 Popular Now - 123 sold in last 48hrs</p>
                <div class="quantity-controls">
                    <button>-</button>
                    <span>Qty 1</span>
                    <button>+</button>
                </div>
                <p><strong>$100.00</strong></p>
            </div>
        </div>
    </div>

    <div class="summary-section">
        <div>
        <h2>Purchase Summary</h2>
    
        <p>Subtotal (1 item): <strong>$100.00</strong></p>
        <p>Estimated Shipping: <strong>Free</strong></p>
        <p>Tax: <strong>TBD</strong></p>
        <hr>
        <p>Total: <strong>$100.00</strong></p>

        <button class="checkout-button">PROCEED TO CHECKOUT</button>
        <button class="afterpay-button">Pay now with esewa</button>
        <!-- <button class="more-options">+ MORE PAYMENT OPTIONS</button> -->
    </div>
</div>
