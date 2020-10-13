<?php session_start();
require_once("index1.php");
require_once("products.php")
?>
<style>
body{
    background: #f8f9fa!important; 
}
.img-box {
    height: 160px;
    width: 100%;
    position: relative;
}

.img-box img {
    max-width: 100%;
    max-height: 100%;
    display: inline-block;
    position: absolute;
    bottom: 0;
    margin: 0 auto;
    left: 0;
    right: 0;
}


.thumb-wrapper {
    text-align: center;
    cursor: pointer;
    box-shadow: 0px 3px 3px -2px rgba(0, 0, 0, 0.2), 0px 3px 4px 0px rgba(0, 0, 0, 0.14), 0px 1px 8px 0px rgba(0, 0, 0, 0.12);
}



.thumb-content {
    padding: 15px;
}

#product-card a {
    text-decoration: none;
    color: black;
}

.item-price {
    font-size: 13px;
    padding: 2px 0;
}


.item-price span {
    color: #86bd57;
    font-size: 110%;
}
</style>
<?php 
    include("Navbar.php");
?>
<br>
<h5 style="text-align:center"> Want to compare products?<a href="compareProducts.php" style="color:blue"> Click here</a></h5>
<div class="container product-container">
  
    <div class="row mt-5">
  
        <?php  
         $products = getProducts();
                while ($row = mysqli_fetch_array($products)) {
                   
                                    
							?>
        <div class="col-sm-3 col-12 col-md-3 mb-5" id="product-card">
            <a href="productDetails.php?id=<?php echo $row["product_id"]; ?>">
                <div class="thumb-wrapper">
                    <div class="img-box">
                        <img src="<?php echo $row['product_img'] ?>" class="img-fluid" alt="">
                    </div>
                    <div class="thumb-content">
                        <form method="post" class="add_to_cart_form"
                            action="cartSystem.php?action=add&id=<?php echo $row["product_id"]; ?>">
                            <h4><?php echo $row['product_name']; ?></h4>
                            <p class="item-price">
                                <span>$<?php echo $row['product_price']; ?></span></p>

                            <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>" />
                            <input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>" />
                            <input type="hidden" name="quantity" value="1" />

                    </div>
                    </form>
                </div>
            </a>
        </div>

        <?php } ?>
    </div>

</div>
<script>
  $(".product-container").hide().fadeIn(1000);

</script>