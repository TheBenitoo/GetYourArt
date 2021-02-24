<?php   
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "shop");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="contact.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="cart.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">
<title> Cart </title>
</head>

<?php
  require_once "../includes/database.php"
?>


<body>

<?php
     include "../includes/header.php"
?>

<h1>Shopping Cart</h1>

</div>
<div class="shopping-cart">

  <?php

 // print_r($_SESSION['cart']);
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
                               <th width="14%">Image</th>
                               <th width="26%">Item Name</th>  
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
                               <td></td>
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
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


      <?php  if(isset($_SESSION['userid'])){      ?> 

        <!--<form action="../includes/savecart.php" method="POST">
      <button type="submit" name="submit" class="checkout">Checkout</button>
      </form> -->

      <?php
        /*$quantity = $values["item_quantity"];
           $price = $values["item_price"];
           $id = $_SESSION['userid'];
           $phone = $_POST['phone'];
           $city = $_POST['city'];
           $zip = $_POST['zip'];
           $number = $_POST['number'];
           $street = $_POST['street'];

          $sql1 = "INSERT INTO cart_items (UserID,ship_street,ship_city,ship_number,phone,zip) 
          VALUES ('$id', '$street','$city', '$number', '$phone', '$zip')";
          mysqli_query($connect, $sql1);
      
       } 

       $product = $_SESSION['userid'];
    
  
    $query = "SELECT *
              FROM cart
              WHERE UserID = '$product'
              ";
  
    $result = mysqli_query($db, $query);
    $obj = mysqli_fetch_object($result);
    mysqli_free_result($result);
    //$cid = $obj->CartID; */

      foreach($_SESSION["shopping_cart"] as $keys => $values)  
      {
           $quantity = $values["item_quantity"];
           $price = $values["item_price"];
           $id = $values["item_id"];
           $cartid = $_SESSION['userid'];

          $sql = "INSERT INTO cart_items (Quantity,price,ProductID,CartID) VALUES ('$quantity','$price', '$id', '$cartid')";
          mysqli_query($connect, $sql);
          
        }
        unset($_SESSION['shopping_cart']);
    }
      ?>

      aus cart.
      <?php  if(isset($_SESSION['userid'])){      ?>
          <form action="../includes/savecart.php" method="POST">
        <input type="text" name="street" placeholder="Street">
        <br>
        <input type="text" name="number" placeholder="Number">
        <br>
        <input type="text" name="zip" placeholder="Zip-Code">
        <br>
        <input type="text" name="city" placeholder="City">
        <br>
        <input type="text" name="phone" placeholder="phone">
        <br>
        <button type="submit" name="submit" class="checkout">Checkout</button>
        </form>             
      
      <?php } ?>

      <?php 
      
      //echo $_POST['email'];
      
     $userId = $_SESSION['userid'];
      echo $userId;
      /*
      foreach($_SESSION["shopping_cart"] as $keys => $values)  
      {
           $quantity = $values["item_quantity"];
           $price = $values["item_price"];
           $id = $values["item_id"];
           $cartid = 1;

          $sql = "INSERT INTO cart_items (Quantity,price,ProductID,CartID) VALUES ('$quantity','$price', '$id', '$cartid')";
      }*/
      ?>

</div>
  </div>
</body>
</html>