<?php 
include("dbh.php");
include("Navbar.php");
include("index1.php");


?>

<br>
<h2 style="text-align:center;"> Search Results </h2>
<hr>
<br>
<div class ="search-results"></div>
<div>
<?php
if (isset($_POST['search'])){
    $conn = Open_Connection();
    $search = $_POST['search'];
    $sql= "SELECT * FROM product WHERE product_name LIKE '%$search%' OR product_category LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    $queryResult= mysqli_num_rows($result);
   
    if($search==null) {
        echo "<h3>No results found. Error message: No value eneterd in the search box.</h3>";
    }
    elseif ($queryResult>0) {
        while ($row = mysqli_fetch_assoc($result)){
            echo "<h3 style='text-align:center'>
            ".$row['product_name']."
            </h3>";
            echo '<img style= "display:block; margin-left: auto; margin-right: auto; width: 400px; height: 300px" src = "'. $row["product_img"] . '">';
           echo "<br>";
            echo "<h6 style='text-align:center'>
            ".$row['product_Description']."
            </h6>";
            echo"<br>";
            echo"<hr>";

}
    }
    
    else{
        echo 'No results found.';
        echo ' Error message: No related information found.';
    }

}
?>
<?php include(__DIR__ . "/../components/Footer.php");?>

</div>