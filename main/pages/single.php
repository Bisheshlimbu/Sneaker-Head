<?php include_once('../header.php')?>
<?php
$product_id=isset($_GET['pid'])?$_GET['pid']:"";
$product=getProductDetailsByProduct_id($product_id);
// var_dump($product);

$attachments=getProductAttachmentsByProduct_id($product_id);
?>
<div class="single-container">
    <!-- <nav class="breadcrumb">Home / Men / Shoes / Casual</nav> -->

    <div class="product-page">
        <!-- Left: Images -->
        <div class="product-images">
            <span class="main-image">
                <img id="main-image" src="http://sneaker-head.local/<?php echo $product['product_image']?>"
                    alt="Sneaker">
            </span>
            <div class="thumbnails">
                <?php
                    if(!empty($attachments) && is_array($attachments)){
                        foreach($attachments as $attachment){
                            ?>
                            <img class="thumbnail-image" src="http://sneaker-head.local/<?php echo $attachment['url']?>" alt="">
                            <?php
                        }
                    }
                    ?>
            </div>
        </div>

        <!-- Right: Details -->
        <div class="product-info">
            <h1><?php echo ucfirst($product['title'])?></h1>
            <p class="price">$<?php echo ' '. $product['price']?></p>
            <p class="pay-info">Or 4 interest-free payments with Klarna, Afterpay, or PayPal</p>

            <div class="color-section">
                <p><strong>Color:</strong> White/Light Zen Grey/Total Orange/Cool Grey</p>
                <img src="http://sneaker-head.local/assets/images/favs.jpg" alt="Color thumbnail" class="color-thumb">
            </div>

            <div class="sizes">
                <p><strong>Size</strong></p>
                <div class="size-grid">
                    <button>7.5</button>
                    <button>8</button>
                    <button>8.5</button>
                    <button>9</button>
                    <button>9.5</button>
                    <button>10</button>
                    <button>10.5</button>
                    <button>11</button>
                    <button>11.5</button>
                    <button>12</button>
                    <button>13</button>
                    <button>14</button>
                </div>
            </div>

            <div class="shipping">
                <p>🚚 <strong>Ship to an address</strong> — FREE SHIPPING</p>
                <p class="in-stock">✅ In Stock</p>
            </div>

            <button class="add-to-bag">ADD TO BAG</button>

            <div class="status-box">
                <p><strong>STATUS:</strong> Get points. Gain access. Boost your status. Use your STATUS across our brand
                    family.</p>
                <a href="#">Join STATUS Now ›</a>
            </div>
        </div>
    </div>
</div>