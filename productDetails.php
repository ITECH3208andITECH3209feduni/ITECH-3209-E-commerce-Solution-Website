<?php session_start();
require_once("products.php");
?>

<style>
@import url(https://fonts.googleapis.com/css?family=Raleway:400,300,500,700);

* {
    box-sizing: border-box;
}

#productDetails {
    background: #aedaa6;
    font-family: "Raleway";
}

#productDetails .product-card {
    width: 650px;
    position: absolute;
    background: white;
    margin: 0 auto;
    top: 50%;
    left: 50%;
    transform: translate(-45%, -45%);
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    transition: all 0.3s;
}

#productDetails .product-card:hover {
    box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

#productDetails .product-card nav {
    width: 100%;
    color: #727272;
    text-transform: uppercase;
    padding: 20px;
    border-bottom: 2px solid #efefef;
    font-size: 12px;
}

#productDetails .product-card nav svg.heart {
    height: 24px;
    width: 24px;
    float: right;
    margin-top: -3px;
    transition: all 0.3s ease;
    cursor: pointer;
}

#productDetails .product-card nav svg.heart:hover {
    fill: red;
}

#productDetails .product-card nav svg.arproductInfo {
    float: left;
    height: 15px;
    width: 15px;
    margin-right: 10px;
}

#productDetails .product-card .photo {
    padding: 30px;
    width: 45%;
    text-align: center;
    float: left;
}

#productDetails .product-card .photo img {
    max-height: 240px;
    max-width: 240px;
}

#productDetails .product-card .description {
    padding: 30px;
    float: left;
    width: 55%;
    border-left: 2px solid #efefef;
}

#productDetails .product-card .description h1 {
    color: #515151;
    font-weight: 300;
    padding-top: 15px;
    margin: 0;
    font-size: 30px;
    font-weight: 300;
}

#productDetails .product-card .description h2 {
    color: #515151;
    margin: 0;
    text-transform: uppercase;
    font-weight: 500;
}

#productDetails .product-card .description h4 {
    margin: 0;
    color: #727272;
    text-transform: uppercase;
    font-weight: 500;
    font-size: 12px;
}

#productDetails .product-card .description p {
    font-size: 12px;
    line-height: 20px;
    color: #727272;
    padding: 20px 0;
    margin: 0;
}

#productDetails .product-card .description button {
    outline: 0;
    border: 0;
    background: none;
    border: 1px solid #d9d9d9;
    padding: 8px 0px;
    margin-bottom: 30px;
    color: #515151;
    text-transform: uppercase;
    width: 125px;
    font-family: inherit;
    margin-right: 5px;
    transition: all 0.3s ease;
    font-weight: 500;
}

#productDetails .product-card .description button:hover {
    border: 1px solid #aedaa6;
    color: #aedaa6;
    cursor: pointer;
}
</style>
<?php require_once("index1.php");?>
<?php require_once("Navbar.php");?>
<?php $productInfo = getProductByid($_GET['id'])

;?>

<div id="productDetails">
    <div class="product-card">
        <nav>
            <a href="products_view.php" style="color:black;text-decoration:none">
                <svg class="arproductInfo" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <polygon points="352,115.4 331.3,96 160,256 331.3,416 352,396.7 201.5,256 " stroke="#727272" />
                </svg>
                Back to all Products
                <svg class="heart" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve"
                    stroke="#727272" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path
                        d="M340.8,98.4c50.7,0,91.9,41.3,91.9,92.3c0,26.2-10.9,49.8-28.3,66.6L256,407.1L105,254.6c-15.8-16.6-25.6-39.1-25.6-63.9  c0-51,41.1-92.3,91.9-92.3c38.2,0,70.9,23.4,84.8,56.8C269.8,121.9,302.6,98.4,340.8,98.4 M340.8,83C307,83,276,98.8,256,124.8  c-20-26-51-41.8-84.8-41.8C112.1,83,64,131.3,64,190.7c0,27.9,10.6,54.4,29.9,74.6L245.1,418l10.9,11l10.9-11l148.3-149.8  c21-20.3,32.8-47.9,32.8-77.5C448,131.3,399.9,83,340.8,83L340.8,83z"
                        stroke="#727272" /></svg>
            </a>
        </nav>
        <div class="photo">
            <img src="<?php echo $productInfo['product_img']?>">
        </div>
        <div class="description">
            <h2><?php echo $productInfo['product_name']?></h2>
            <h4><?php echo $productInfo['product_category']?></h4>
            <h1>$<?php echo $productInfo['product_price']?></h1>
            <p> <?php echo $productInfo['product_Description']?>
            </p>

            <form method="post" class="add_to_cart_form"
                action="cartSystem.php?action=add&id=<?php echo $productInfo["product_id"]; ?>">
                <input type="hidden" name="hidden_name" value="<?php echo $productInfo["product_name"]; ?>" />
                <input type="hidden" name="hidden_price" value="<?php echo $productInfo["product_price"]; ?>" />
                <input type="hidden" name="quantity" value="1" />
                <button type="submit" name="add_to_cart">Add to
                    Cart</button>
                <button>Wishlist</button>
                <p> Recommended similar products:</p>
            <?php 
            $sql= "SELECT * FROM product WHERE product_category IN ('$productInfo[product_category]') AND product_name NOT IN ('$productInfo[product_name]') ";
            $result = mysqli_query($product_conn, $sql);
            $queryResult= mysqli_num_rows($result);
            if ($queryResult>0) {
                while ($row = mysqli_fetch_assoc($result)){
        
            echo "<h6>
            ".$row['product_name']."
            </h6>";

            echo '<img style="width: 40px; height: 40px" src = "'. $row["product_img"] . '">';
            echo "<h6>$
            ".$row['product_price']."
            </h6>";
            echo "<hr>";
            

        }
            }
            
            else{
                echo 'No similar products.';
               
            }
        
            ?>
            </p>

        </div>
        </form>

    </div>
</div>
</div>