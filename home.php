<?php 
session_start();
include_once("index1.php");
require_once("products.php");

?>
<style>

h2 {
    color: #000;
    font-size: 26px;
    font-weight: 300;
    text-align: center;
    text-transform: uppercase;
    position: relative;
    margin: 30px 0 80px;
}

h2 b {
    color: #ffc000;
}

h2::after {
    content: "";
    width: 100px;
    position: absolute;
    margin: 0 auto;
    height: 4px;
    background: rgba(0, 0, 0, 0.2);
    left: 0;
    right: 0;
    bottom: -20px;
}

.carousel {
    margin: 50px auto;
    padding: 0 70px;
}

.carousel .carousel-item {
    min-height: 330px;
    text-align: center;
    overflow: hidden;
}

.carousel .carousel-item .img-box {
    height: 160px;
    width: 100%;
    position: relative;
}

.carousel .carousel-item img {
    max-width: 100%;
    max-height: 100%;
    display: inline-block;
    position: absolute;
    bottom: 0;
    margin: 0 auto;
    left: 0;
    right: 0;
}

.carousel .carousel-item h4 {
    font-size: 18px;
    margin: 10px 0;
}

.carousel .carousel-item .btn {
    color: #333;
    border-radius: 0;
    font-size: 11px;
    text-transform: uppercase;
    font-weight: bold;
    background: none;
    border: 1px solid #ccc;
    padding: 5px 10px;
    margin-top: 5px;
    line-height: 16px;
}

.carousel .carousel-item .btn:hover,
.carousel .carousel-item .btn:focus {
    color: #fff;
    background: #000;
    border-color: #000;
    box-shadow: none;
}

.carousel .carousel-item .btn i {
    font-size: 14px;
    font-weight: bold;
    margin-left: 5px;
}

.carousel .thumb-wrapper {
    text-align: center;
}

.carousel .thumb-content {
    padding: 15px;
}

.carousel-control-prev,
.carousel-control-next {
    height: 100px;
    width: 40px;
    background: none;
    margin: auto 0;
    background: rgba(0, 0, 0, 0.2);
}

.carousel-control-prev i,
.carousel-control-next i {
    font-size: 30px;
    position: absolute;
    top: 50%;
    display: inline-block;
    margin: -16px 0 0 0;
    z-index: 5;
    left: 0;
    right: 0;
    color: rgba(0, 0, 0, 0.8);
    text-shadow: none;
    font-weight: bold;
}

.carousel-control-prev i {
    margin-left: -3px;
}

.carousel-control-next i {
    margin-right: -3px;
}

.carousel .item-price {
    font-size: 13px;
    padding: 2px 0;
}

.carousel .item-price strike {
    color: #999;
    margin-right: 5px;
}

.carousel .item-price span {
    color: #86bd57;
    font-size: 110%;
}

.carousel .carousel-indicators {
    bottom: -50px;
}

.carousel-indicators li,
.carousel-indicators li.active {
    width: 10px;
    height: 10px;
    margin: 4px;
    border-radius: 50%;
    border-color: transparent;
    border: none;
}

.carousel-indicators li {
    background: rgba(0, 0, 0, 0.2);
}

.carousel-indicators li.active {
    background: rgba(0, 0, 0, 0.6);
}

.star-rating li {
    padding: 0;
}

.star-rating i {
    font-size: 14px;
    color: #ffc000;
}

.myrow {
    position: relative;
    padding-top: 200px;
}

.myrow .img2 {
    position: absolute;
    right: 0;
    top: 40px;
    width: 400px;
    z-index: -12px;
    opacity: 0.7;
}

h4 {
    font-size: 20px;
    position: relative;
    top: -60px;
    opacity: 0.6;
}
</style>



<?php include("Navbar.php");?>
<div class="container">

    <div class="row myrow ">
        <h4>NextGen: The E-commerce Solution Of a New Generation.<br></h4>

        <img class="img2" src="bimg.jpg">

        <div class="col-md-12">
            <h2>Trending <b>Products</b></h2>
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                <!-- Carousel indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for carousel items -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">


                            <?php $products = getProducts();  
                                $i=4;      
                                while ($i!=0) {
                                    $row = mysqli_fetch_array($products);
                                    $i--;                         
							?>
                            <div class="col-sm-3">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="<?php echo $row['product_img'] ?>" class="img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <form method="post" class="add_to_cart_form"
                                            action="cartSystem.php?action=add&id=<?php echo $row["product_id"]; ?>">
<br>
                                            <p class="item-price">
                                                <span>$<?php echo $row['product_price']; ?></span></p>
                                                <h4><?php echo $row['product_name']; ?></h4>

                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-half-o"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <input type="hidden" name="hidden_name"
                                                value="<?php echo $row["product_name"]; ?>" />
                                            <input type="hidden" name="hidden_price"
                                                value="<?php echo $row["product_price"]; ?>" />
                                            <input type="hidden" name="quantity" value="1" />
                                            <button type=" submit" name="add_to_cart" class="btn btn-primary">Add to
                                                Cart</button>
                                    </div>
                                    </form>
                                </div>
                            </div>

                            <!-- </form> -->
                            <?php } ?>


                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row">
                            <?php  
                                $i=8;      
                                while ($i!=4) {
                                    $row = mysqli_fetch_array($products);
                                    $i--;                         
							?>
                            <div class="col-sm-3">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="<?php echo $row['product_img'] ?>" class="img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <form method="post" class="add_to_cart_form"
                                            action="cartSystem.php?action=add&id=<?php echo $row["product_id"]; ?>">
<br>
                                            <p class="item-price">
                                                <span>$<?php echo $row['product_price']; ?></span></p>
                                                <h4><?php echo $row['product_name']; ?></h4>

                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-half-o"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <input type="hidden" name="hidden_name"
                                                value="<?php echo $row["product_name"]; ?>" />
                                            <input type="hidden" name="hidden_price"
                                                value="<?php echo $row["product_price"]; ?>" />
                                            <input type="hidden" name="quantity" value="1" />
                                            <button type=" submit" name="add_to_cart" class="btn btn-primary">Add to
                                                Cart</button>
                                    </div>
                                    </form>
                                </div>
                            </div>

                            <!-- </form> -->
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- Carousel controls -->
                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<?php include("Footer.php");?>



<script>
// document.querySelectorAll(".add_to_cart_form").forEach((form) => {
//     form.addEventListener("submit", function(ev) {
//         ev.preventDefault();
//     })
// })
$(".container").hide().fadeIn(1000);
// $(document).on("click", "a", function () {

//     // get the href attribute
//     var newUrl = $(this).attr("href");

//     // veryfy if the new url exists or is a hash
//     if (!newUrl || newUrl[0] === "#") {
//         // set that hash
//         location.hash = newUrl;
//         return;
//     }

//     // now, fadeout the html (whole page)
//     $("html").fadeOut(function () {
//         // when the animation is complete, set the new location
//         location = newUrl;
//     });

//     // prevent the default browser behavior.
//     return false;
// });
$(document).ready(function() {
    
    var dropdown = $(".search-dropdown");
    var toogleBtn = $(".search-dropdown .dropdown-toggle");

    // Toggle search and close icon for search dropdown
    dropdown.on("show.bs.dropdown", function(e) {
        toogleBtn.toggleClass("d-none");
    });
    dropdown.on("hide.bs.dropdown", function(e) {
        toogleBtn.addClass("d-none");
        toogleBtn.first().removeClass("d-none");
    });

});
</script>