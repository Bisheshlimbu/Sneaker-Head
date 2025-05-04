<?php include_once('main/header.php');?>

<?php  
$user_id=isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
$email=isset($_SESSION['email'])?$_SESSION['email']:"";
// var_dump(getUsersDetailsById($user_id));
if (isset($user_id)) {
    $users=getUsersDetailsById($user_id);
}
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
                <span class="imageContainer">
                    <img src="assets/images/shoes1.jpg" alt="Sneaker">
                </span>
                <p>Air Jordan 1</p>
            </div>
            <div class="product-card">
                <span class="imageContainer">
                    <img src="assets/images/shoes.jpg" alt="Sneaker">
                </span>
                <p>Air Jordan 1</p>
            </div>
            <div class="product-card">
                <span class="imageContainer">
                    <img src="assets/images/shoes2.jpg" alt="Sneaker">
                </span>
                <p>Air Jordan 1</p>
            </div>
            <div class="product-card">
                <span class="imageContainer">
                    <img src="assets/images/shoes3.jpg" alt="Sneaker">
                </span>
                <p>Air Jordan 1</p>
            </div>
            <div class="product-card">
                <span class="imageContainer">
                    <img src="assets/images/shoes3.jpg" alt="Sneaker">
                </span>
                <p>Air Jordan 1</p>
            </div>
            <div class="product-card">
                <span class="imageContainer">
                    <img src="assets/images/shoes3.jpg" alt="Sneaker">
                </span>
                <p>Air Jordan 1</p>
            </div>
            <div class="product-card">
                <span class="imageContainer">
                    <img src="assets/images/shoes3.jpg" alt="Sneaker">
                </span>
                <p>Air Jordan 1</p>
            </div>
            <div class="product-card">
                <span class="imageContainer">
                    <img src="assets/images/shoes3.jpg" alt="Sneaker">
                </span>
                <p>Air Jordan 1</p>
            </div>

            <!-- Add more cards if needed -->
        </div>
    </section>

    <!-- Brands Row -->
    <section class="brands">
        <h2>SHOP BY BRANDS</h2>
        <div class="brand-image">
            <img src="assets/images/nikel.png" alt="Nike">
            <img src="assets/images/jordanl.png" alt="Jordan">
            <img src="assets/images/asciscl.png" alt="ascisc">
            <img src="assets/images/new-balancel.png" alt="New Balance">
            <img src="assets/images/addidasl.png" alt="addidas">
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
    <section class="new-arrivals" id="new-arrival">
        <h2>NEW ARRIVALS</h2>
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

</main>
<?php include_once('main/footer.php');?>