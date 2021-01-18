<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">
<title> Cart </title>
<?php
    session_start();
    include "../includes/header.php";
    if(isset($_POST['add'])){
      //print_r($_POST['product']);
      if(isset($_SESSION['cart'])){

      }else{
        $item_array = array(
          'product' =>$_POST['product']
        );
      //create new Session variable
      $_SESSION['cart'][0] = $item_array;
      print_r($_SESSION['cart']);
      }
    }
?>

</head>





<?php
  include "../includes/navbar.php";
  require_once "../includes/database.php"

  
?>


<body>

<h1>Shopping Cart</h1>
<div class='firstlittlebox'>

</div>
<div class="shopping-cart">

  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>

  <?php

  print_r($_SESSION['cart']);
    /*$item_array_id = array_column($_SESSION['cart'], "product");
    $product = array_column($_SESSION['cart'],'product');
    $query = "SELECT *
            FROM product
            WHERE ProductID = '1'
            ";

  $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      foreach ($product as $id){
        if($item_array_id == $id){
          echo "<div class='box1 text'>";
          echo  "<img style='height: 100%; width: 100%; object-fit: contain' src=".$obj->ImageSource.">";
          echo "</div>";
          $product_id = $obj->ProductID;
          echo "<div class='box1 text'>";
          echo "" .$obj->ProductName;
          echo "<br> Price: " .$obj->ProductPrice. "€ </br>";
          echo "<form method='post'>";
          echo "<button type='submit' name='add'> Add to Cart</button>";
          echo "<input type='hidden' name='product' value='".$obj->ProductID."'>";
          echo "</form>";
        }
      }
    }*/

  ?>
<h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
  <div class="product">
    <div class="product-image">
      <img src="">
    </div>
    <div class="product-details">
      <div class="product-title">Some Art</div>
      <p class="product-description">Some Text</p>
    </div>
    <div class="product-price">12.99</div>
    <div class="product-quantity">
      <input type="number" value="2" min="1">
    </div>
    <div class="product-removal">
      <button class="remove-product">
        Remove
      </button>
    </div>
    <div class="product-line-price">25.98</div>
  </div>


  <div class="totals">
    <div class="totals-item">
      <label>Subtotal</label>
      <div class="totals-value" id="cart-subtotal">71.97</div>
    </div>
    <div class="totals-item">
      <label>Tax (5%)</label>
      <div class="totals-value" id="cart-tax">3.60</div>
    </div>
    <div class="totals-item">
      <label>Shipping</label>
      <div class="totals-value" id="cart-shipping">15.00</div>
    </div>
    <div class="totals-item totals-item-total">
      <label>Grand Total</label>
      <div class="totals-value" id="cart-total">90.57</div>
    </div>
  </div>
      
      <button class="checkout">Checkout</button>

</div>
  </div>
</body>
</html>