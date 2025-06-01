<?php include_once('../header.php')?>
<?php
$brand=isset($_GET['brand'])?$_GET['brand']:"";
$type=isset($_GET['type'])?$_GET['type']:"";
$category=isset($_GET['category'])?$_GET['category']:"";
$arrivel=isset($_GET['arrivel'])?$_GET['arrivel']:"";
?>
<div class="page-container">

    <section class="shop-mens-container">
        <div class="shop-mens">
            <h2>SHOP MEN’S</h2>
            <div class="category-buttons">
                <a href="?category=<?php echo $category;?>&type=&brand="><button
                        class="<?php echo $brand==''&&$type==''?'active-tab':''?>">All Shoes</button></a>
                <a href="?category=<?php echo $category;?>&type=casuals&brand=<?php echo $brand;?>"><button
                        class="<?php echo $type=='casuals'?'active-tab':''?>">Casuals Shoes</button></a>
                <a href="?category=<?php echo $category;?>&type=running&brand=<?php echo $brand;?>"><button
                        class="<?php echo $type=='running'?'active-tab':''?>">Running Shoes</button></a>
                <a href="?category=<?php echo $category;?>&type=basketball&brand=<?php echo $brand;?>"><button
                        class="<?php echo $type=='basketball'?'active-tab':''?>">Basketball Shoes</button></a>
                <a href="?category=<?php echo $category;?>&type=retro&brand=<?php echo $brand;?>"><button
                        class="<?php echo $type=='retro'?'active-tab':''?>">Retro Shoes</button></a>
                <a
                    href="?category=<?php echo $category;?>&type=<?php echo $type;?>&brand=<?php echo $brand;?>&arrivel=new-arrivels"><button
                        class="<?php echo $arrivel=='new-arrivels'?'active-tab':''?>">New Arrivels</button></a>
                <form method="GET">
                    <input type="hidden" name="category" value="<?php echo $category;?>">
                    <input type="hidden" name="type" value="<?php echo $type;?>">
                    <input type="hidden" name="arrivel" value="<?php echo $arrivel;?>">
                    <select class="filter-brand <?php echo !empty($brand)?'active-tab':"" ?>" name="brand" onchange="this.form.submit()">
                        <option value="">By Brands</option>
                        <option value="nike" <?php echo $brand=='nike'?'selected':""?>>Nike</option>
                        <option value="jordan" <?php echo $brand=='jordan'?'selected':""?>>Jordan</option>
                        <option value="new-balance" <?php echo $brand=='new-balance'?'selected':""?>>New Balance
                        </option>
                        <option value="adidas" <?php echo $brand=='adidas'?'selected':""?>>Adidas</option>
                        <option value="asics" <?php echo $brand=='asics'?'selected':""?>>Asics</option>
                    </select>
                </form>

            </div>
        </div>
    </section>
    <!-- Main Content -->
    <div class="card-container">
        <?php
            $products=getProductDetails($brand, $type, $category, $arrivel);
            if(!empty($products)&& is_array($products)){
                foreach($products as $product){
                  ?>
        <a href="single.php?pid=<?php echo $product['id']?>" class="card">
            <img src="http://sneaker-head.local/<?php echo $product['product_image']?>" alt="Air Jordan Retro 12">

            <div class="card-details">
                <h3><?php echo $product['title'];?></h3>
                <p class="colors"><?php echo $product['brand']?></p>
                <p class="price">$<?php echo $product['price']?></p>

            </div>
        </a>
        <?php
                }
            }else{
                echo "No Products Found.";
            }
            ?>
    </div>

</div>