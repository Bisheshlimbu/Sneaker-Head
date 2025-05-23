 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>SneakerHead - Shopping Preferences</title>
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
     <style>
     * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
     }

     body {
         font-family: 'Roboto', sans-serif;
         background-color: #121212;
         color: #ffffff;
     }

     .order-container {
         display: flex;
         justify-content: space-between;
         gap: 20px;
         margin: 20px;
     }

     .product-section {
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

     header {
         background-color: #1e1e1e;
         padding: 20px;
         display: flex;
         justify-content: space-between;
         align-items: center;
         border-bottom: 1px solid #333;
     }

     header h1 {
         color: #fff;
         font-size: 24px;
     }

     nav a {
         color: #fff;
         text-decoration: none;
         margin: 0 15px;
         font-weight: 500;
     }
     </style>
 </head>

 <body>
     <header>
         <h1> SNEAKERHEAD</h1>
         <nav>

             <a href="http://sneaker-head.local/main/pages/order.php">Orders</a>
             <a href="#">Favorites</a>

             <a href="#">Profile</a>
         </nav>
     </header>
     <div class="order-container">
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
     </div>
 </body>