<?php
require_once("products.php");
$products = getProducts(); ?>


<div class="d-flex align-items-center">
    <div class="heading">
        <h1>Products</h1>
    </div>
    <div class="button-container mx-4">
        <button class="btn btn-primary" data-toggle="modal" data-target="#add-form">
            <i class="fas fa-plus"></i> Add new
        </button>
    </div>
</div>


<table class="table table-striped" id="product_table">
    <thead>
        <tr>
            <th scope="col">Product ID</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Category</th>
            <th scope="col">Product Price</th>
            <th scope="col">Product Description</th>
            <th scope="col">Product Image</th>
            <th scope="col">
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_array($products)) {
        ?>

        <tr>

            <?php
                echo "<td><p>" . $row['product_id'] . "</p></td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['product_category'] . "</td>";
                echo "<td>" . $row['product_price'] . "</td>";
                echo "<td>" . $row['product_Description'] . "</td>";
                echo '<td><img src="' . $row['product_img'] . '" class="rounded" style="width:48px;height:48px;" alt=".." /></td>';

                echo '<td class="d-flex">
                    <button class="btn editButton"  data-toggle="modal" data-target="#edit-products">
                        <i class="fas fa-lg fa-edit"></i>  
                    </button>
                    <button type ="submit" class="btn" data-toggle="modal" data-id="'.$row['product_id'].'" data-target="#deleteProductModal">
                        <i class="fas fa-lg fa-trash"></i>
                     </button>
                   
                </td>'
                ?>

        </tr>
        <?php } ?>


    </tbody>
</table>


<!-- modal container -->


<div class="modal fade" id="add-form" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="products.php" method="post">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="product_Name">Product Name</label>
                        <input type="text" class="form-control" name="productName" placeholder="Product name">
                    </div>
                    <div class="form-group">
                        <label for="product_Category">Product Category</label>
                        <input type="text" class="form-control" name="productCategory" placeholder="Product Category">
                    </div>
                    <div class="form-group">
                        <label for="product_Price">Product Price</label>
                        <input type="number" class="form-control" name="productPrice" placeholder="Product Price">
                    </div>
                    <div class="form-group">
                        <label for="product_Description">Product Description</label>
                        <input type="text" class="form-control" name="productDescription" placeholder="Product Description">
                    </div>
                    <div class="form-group">
                        <label for="product_Img">Product Img</label>
                        <input type="text" class="form-control" name="productImg" placeholder="Product Image Url">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="saveBtn" class="btn btn-primary">Save Product</button>
                </div>
        </div>

        </form>
    </div>
</div>
<!-- edit products -->
<div class="modal fade" id="edit-products" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="products.php" method="post">
                <input type="hidden" class="form-control" id="edit_productId" name="productId"
                    placeholder="Product name">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="product_Name">Product Name</label>
                        <input type="text" class="form-control" id="edit_productName" name="productName"
                            placeholder="Product name">
                    </div>
                    <div class="form-group">
                        <label for="product_Category">Product Category</label>
                        <input type="text" class="form-control" id="edit_productCategory" name="productCategory"
                            placeholder="Product Category">
                    </div>
                    <div class="form-group">
                        <label for="product_Price">Product Price</label>
                        <input type="number" class="form-control" id="edit_productPrice" name="productPrice"
                            placeholder="Product Price">
                    </div>
                    <div class="form-group">
                        <label for="product_Description">Product Description</label>
                        <input type="number" class="form-control" id="edit_productDescription" name="productDescription"
                            placeholder="Product Description">
                    </div>
                    <div class="form-group">
                        <label for="product_Img">Product Img</label>
                        <input type="text" class="form-control" id="edit_productImg" name="productImg"
                            placeholder="Product Image Url">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="editBtn" class="btn btn-primary">Save Changes</button>
                </div>
        </div>

        </form>

    </div>
</div>
<!-- delete -->
<div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProductModalLabel">Are you sure you want to delete this product?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="modal-form" method="post">
                <div class="modal-footer">
                    <button type="submit" name="deleteBtn" class=" btn btn-danger">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                </div>
            </form>

        </div>
    </div>
</div>
</div>

<script>
$(document).ready(function() {
    $('#product_table').DataTable();
});

$('#deleteProductModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var productId = button.data('id') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find('.modal-form').attr('action', `/E-Commerce/api/products.php?id=${productId}`);


})

var productId = document.getElementById("edit_productId");
var editButton = document.querySelectorAll(".editButton");
var productName = document.getElementById("edit_productName")
var productCategory = document.getElementById("edit_productCategory")
var productPrice = document.getElementById("edit_productPrice")
var productPrice = document.getElementById("edit_productDescription")
var productImg = document.getElementById("edit_productImg")

editButton.forEach((button) => {
    button.addEventListener("click", function(ev) {
        var tr = event.target.closest("tr");
        productId.value = tr.cells[0].textContent;
        productName.value = tr.cells[1].textContent;
        productCategory.value = tr.cells[2].textContent;
        productPrice.value = tr.cells[3].textContent;
        productPrice.value = tr.cells[4].textContent;
        productImg.value = tr.cells[5].firstElementChild.getAttribute('src');


    })
})
</script>