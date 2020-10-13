<?php session_start();
include("index1.php");
?>

<?php 
    include("Navbar.php");
 ?>
<div class="container">
    <h3>Shopping Cart</h3>

    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th width="40%">Item Name</th>
                <th width="10%">Quantity</th>
                <th width="20%">Price</th>
                <th width="15%">Total</th>
                <th width="5%">Action</th>
            </tr>
            <?php
        if (!empty($_SESSION["shopping_cart"])) {

            $total = 0;
            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
        ?>
            <tr>
                <td><?php echo $values["item_name"]; ?></td>
                <td><?php echo $values["item_quantity"]; ?></td>
                <td>$ <?php echo $values["item_price"]; ?></td>
                <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                <td><a href="cartSystem.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span
                            class="text-danger"><i class="fas fa-lg fa-trash"></i></span></a></td>
            </tr>
            <?php
                $total = $total + ($values["item_quantity"] * $values["item_price"]);
            }
            ?>
            <tr>
                <td colspan="3" align="right">Total</td>
                <td align="right">$ <?php echo number_format($total, 2); ?></td>
                <td>          <div id="paypal-button-container" ></div>
      
                    </td>
            </tr>
            
            <?php
        }
        ?>

        </table>
     
    </div>
</div>
</div>
<?php include(__DIR__ . "/../components/Footer.php");?>

<script src="https://www.paypal.com/sdk/js?client-id=sb"></script> 

  <script>
 paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '0.01'
          }
        }]
      });
    }
  }).render('#paypal-button-container');    // This function displays Smart Payment Buttons on your web page.
  </script>
