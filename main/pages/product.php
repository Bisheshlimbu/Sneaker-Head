<?php include_once('../header.php')?>

<div class="page-container">
    <!-- Sidebar Navigation -->
    <aside class="sidebar">
        <h2>Brands</h2>
        <ul>
            <li><a href="/main/pages/product.php?brand=nike">Nike</a></li>
            <li><a href="/main/pages/product.php?brand=jordan">Jordan</a></li>
            <li><a href="/main/pages/product.php?brand=new-balance">New Balance</a></li>
            <li><a href="/main/pages/product.php?brand=adidas">adidas</a></li>
            <li><a href="/main/pages/product.php?brand=asics">Asics</a></li>
        </ul>

        <h2>Type</h2>
        <ul>
            <li><a href="/main/pages/product.php">All Shoes</li>
            <li><a href="/main/pages/product.php?type=running">Running Shoes</li>
            <li><a href="/main/pages/product.php?type=basketball">Basketball Shoes</li>
            <li><a href="/main/pages/product.php?type=casuals">Casual Shoes</li>
        </ul>

        <h2>Collection</h2>
        <ul>
            <li>Nike Dunks</li>
            <li>Nike Air Max</li>
            <li>Nike Air Force 1</li>
            <li>Jordan Retro</li>
            <li>adidas Originals</li>
            <li>New Balance Classics</li>
        </ul>

        <h2>New Arrivals</h2>
        <h2>Best Sellers</h2>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <h1>MEN'S SHOES, CLOTHING & ACCESSORIES</h1>
        <h2>SHOP BY CATEGORY</h2>

        <div class="carousel">
            <?php
            $brand=isset($_GET['brand'])?$_GET['brand']:"";
            $type=isset($_GET['type'])?$_GET['type']:"";
            $category=isset($_GET['category'])?$_GET['category']:"";

            $products=getProductDetails($brand, $type, $category);
            if(!empty($products)&& is_array($products)){
                foreach($products as $product){
                  ?>
                    <a href="single.php?pid=<?php echo $product['id']?>" class="product-card">
                        <span class="imageContainer recommended-product-img">
                            <img src="http://sneaker-head.local/<?php echo $product['product_image']?>" alt="Sneaker">
                        </span>
                        <div class="product-desc">
                            <p><?php echo $product['title'];?></p>
                            <span><?php echo $product['brand']?></span>
                            <p class="product-price">$<?php echo $product['price']?></p>
                            <span>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </span>
                        </div>
                    </a>
                    <?php
                }
            }else{
                echo "No Products Found.";
            }
            ?>


        </div>
    </main>

</div>