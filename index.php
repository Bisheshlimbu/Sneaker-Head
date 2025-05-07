<?php  
// include_once('main/header.php');
include_once(__DIR__ . '/main/header.php');


?>
<main>

    <!-- Hero Section -->
    <section class="hero">
        <div class="main-hero">
            <img src="assets/images/banner-img.jpg" alt="Featured Sneaker">
        </div>
        <div>
            <div class="side-hero">
                <img src="assets/images/side1.jpg" alt="Featured Sneaker">
            </div>
            <div class="side-hero">
                <img src="assets/images/side2.jpg" alt="Featured Sneaker">
            </div>
        </div>
        <button class="shop-now">SHOP NOW</button>

    </section>

    <!-- category section -->
    <section class="featured">
        <h2>SHOP BY COLLECTION</h2>
        <div class="featured-grid">
            <div class="product-card">
                <a href="/main/pages/product.php?brand=jordan">
                    <span class="imageContainer">
                        <img src="assets/images/jordan1.jpg" alt="Sneaker">
                    </span>
                    <p>Jordan</p>
                </a>
            </div>
            <div class="product-card">
                <a href="/main/pages/product.php?brand=nike">
                    <span class="imageContainer">
                        <img src="assets/images/shoes3.jpg" alt="Sneaker">
                    </span>
                    <p>Nike</p>
                </a>
            </div>
            <div class="product-card">
                <a href="/main/pages/product.php?brand=new-balance">
                    <span class="imageContainer">
                        <img src="assets/images/fav.jpg" alt="Sneaker">
                    </span>
                    <p>New Balance</p>
                </a>
            </div>
            <div class="product-card">
                <a href="/main/pages/product.php?brand=adidas">
                    <span class="imageContainer">
                        <img src="assets/images/adidas.webp" alt="Sneaker">
                    </span>
                    <p>Adidas</p>
                </a>
            </div>
            <div class="product-card">
                <a href="/main/pages/product.php?brand=asics">
                    <span class="imageContainer">
                        <img src="assets/images/asics.jpg" alt="Sneaker">
                    </span>
                    <p>Asics</p>
                </a>
            </div>
            <div class="product-card">
                <a href="/main/pages/product.php?brand=jordan">
                    <span class="imageContainer">
                        <img src="assets/images/jordan11.jpg" alt="Sneaker">
                    </span>
                    <p>Jordan</p>
                </a>
            </div>
            <div class="product-card">
                <a href="/main/pages/product.php?brand=adidas">
                    <span class="imageContainer">
                        <img src="assets/images/samba.jpg" alt="Sneaker">
                    </span>
                    <p>Adidas</p>
                </a>
            </div>
            <div class="product-card">
                <a href="/main/pages/product.php?brand=new-balance">
                    <span class="imageContainer">
                        <img src="assets/images/new-balance2.webp" alt="Sneaker">
                    </span>
                    <p>New Balance</p>
                </a>
            </div>

            <!-- Add more cards if needed -->
        </div>
    </section>

    <!-- Brands Row -->
    <section class="brands">
        <h2>SHOP BY BRANDS</h2>
        <div class="brand-image">
            <a href="/main/pages/product.php?brand=nike">
                <img src="assets/images/nikel.png" alt="Nike">
            </a>
            <a href="/main/pages/product.php?brand=jordan">
                <img src="assets/images/jordanl.png" alt="Jordan">
            </a>
            <a href="/main/pages/product.php?brand=asics">
                <img src="assets/images/asciscl.png" alt="asics">
            </a>
            <a href="/main/pages/product.php?brand=new-balance">
                <img src="assets/images/new-balancel.png" alt="New Balance">
            </a>
            <a href="/main/pages/product.php?brand=adidas">
                <img src="assets/images/addidasl.png" alt="addidas">
            </a>
        </div>
    </section>

    <!-- Promotional Banners -->
    <section class="promo-banners">

        <div>
            <span>
                <img src="assets/images/fav1.jpg" alt="Sneaker">
            </span>
            <h4>Favourite</h4>
        </div>
        <div>
            <span>
                <img src="assets/images/favs.jpg" alt="Sneaker">
            </span>
            <h4>New arrival</h4>
        </div>
        <div>
            <span>
                <img src="assets/images/fav3.jpg" alt="Sneaker">
            </span>
            <h4>Most Purchased</h4>
        </div>
    </section>

    <!-- Recommendations Carousel -->
    <section class="recommendations">
        <h2>RECOMMENDED FOR YOU</h2>
        <div class="carousel">
            <div class="product-card">
                <span class="imageContainer recommended-product-img">
                    <img src="assets/images/shoes1.jpg" alt="Sneaker">
                </span>
                <div class="product-desc">
                    <p>Air Jordan 1</p>
                    <span>JOrdan</span>
                    <p class="product-price">$5000</p>
                    <span>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </span>
                </div>
            </div>
            <div class="product-card">
                <span class="imageContainer recommended-product-img">
                    <img src="assets/images/shoes2.jpg" alt="Sneaker">
                </span>
                <div class="product-desc">
                    <p>Air Jordan 1</p>
                    <span>JOrdan</span>
                    <p class="product-price">$5000</p>
                    <span>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </span>
                </div>
            </div>
            <div class="product-card">
                <span class="imageContainer recommended-product-img">
                    <img src="assets/images/shoes1.jpg" alt="Sneaker">
                </span>
                <div class="product-desc">
                    <p>Air Jordan 1</p>
                    <span>JOrdan</span>
                    <p class="product-price">$5000</p>
                    <span>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </span>
                </div>
            </div>
            <div class="product-card">
                <span class="imageContainer recommended-product-img">
                    <img src="assets/images/shoes3.jpg" alt="Sneaker">
                </span>
                <div class="product-desc">
                    <p>Air Jordan 1</p>
                    <span>JOrdan</span>
                    <p class="product-price">$5000</p>
                    <span>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- New Arrivals -->
    <?php
     $newProducts=getProductDetailsForNew();
     if(!empty($newProducts) && is_array($newProducts)){
        ?>
    <section class="new-arrivals" id="new-arrival">
        <h2>NEW ARRIVALS</h2>
        <div class="carousel">
            <?php 
        
            foreach($newProducts as $newProduct){
                ?>
            <a href="main/pages/single.php?pid=<?php echo $newProduct['id']?>" class="product-card">
                <span class="imageContainer recommended-product-img">
                    <img src="http://sneaker-head.local/<?php echo $newProduct['product_image']?>" alt="Sneaker">
                </span>
                <div class="product-desc">
                    <p><?php echo $newProduct['title'];?></p>
                    <span><?php echo $newProduct['brand']?></span>
                    <p class="product-price">$<?php echo $newProduct['price']?></p>
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
        ?>

        </div>
    </section>
    <?php }?>

</main>
<?php include_once('main/footer.php');?>