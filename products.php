<?php

require_once("dbh.php");
$product_conn = Open_Connection();
// adding products
if (isset($_POST['saveBtn'])) {

    $productName = mysqli_escape_string($product_conn, $_POST['productName']);
    $productPrice = mysqli_escape_string($product_conn, $_POST['productPrice']);
    $productDescription = mysqli_escape_string($product_conn, $_POST['productDescription']);
    $productImg = mysqli_escape_string($product_conn, $_POST['productImg']);
    $productCategory = mysqli_escape_string($product_conn, $_POST['productCategory']);
    $sql_query = "INSERT INTO `product`(`product_id`, `product_name`, `product_category`, `product_price`, `product_Description`, `product_img`) 
    VALUES (DEFAULT,'$productName','$productCategory','$productPrice','$productDescription','$productImg')";

    $result = mysqli_query($product_conn, $sql_query);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
// edit route
if (isset($_POST['editBtn'])) {
    $id = filter_input(INPUT_POST, "productId", FILTER_VALIDATE_INT);
    $productName = mysqli_escape_string($product_conn, $_POST['productName']);
    $productPrice = mysqli_escape_string($product_conn, $_POST['productPrice']);
    $productDescription = mysqli_escape_string($product_conn, $_POST['productDescription']);
    $productImg = mysqli_escape_string($product_conn, $_POST['productImg']);
    $productCategory = mysqli_escape_string($product_conn, $_POST['productCategory']);
    $sql_query = "UPDATE `product` 
    SET 
    `product_name`='$productName',
    `product_category`='$productCategory',
    `product_price`= '$productPrice',
    `product_Description`= '$productDescription',
    `product_img`='$productImg' WHERE `product_id`= '$id'";
    mysqli_query($product_conn, $sql_query);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

//delete route
if (isset($_POST['deleteBtn'])) {
    $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
    $sql_query = "DELETE FROM `product` WHERE product_id = $id";
    $result = mysqli_query($product_conn, $sql_query);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}


// all products
function getProducts()
{
    global $product_conn;
    $sql_query = "SELECT * From product";
    $result = mysqli_query($product_conn, $sql_query);
    if (mysqli_num_rows($result) == 0) {
        return  "No rows found, nothing to print so am exiting";
        exit;
    }
    return $result;
}

function getProductByid($id){
    global $product_conn;
    $sql_query = "SELECT * From product WHERE product_id = $id";
    $result = mysqli_query($product_conn, $sql_query);
    if (mysqli_num_rows($result) == 0) {
        return  "No rows found, nothing to print so am exiting";
        exit;
    }
    return mysqli_fetch_assoc($result);
}