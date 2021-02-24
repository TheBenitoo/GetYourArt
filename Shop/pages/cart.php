<?php   
 session_start();  
 require_once "../includes/database.php"; 

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

<?php require_once "../includes/database.php" ?>


<body>

<?php include "../includes/header.php" ?>

<h1>Shopping Cart</h1>

</div>
<div class="shopping-cart">

  <?php


  ?>
<h3>Your Cart</h3>  
     <div class="table-responsive">  
          <table class="">  
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
                                   
                         <!-- Tabell mit Produkten die in den Warenkorb getan wurden-->
                         <tr>  
                              <td><img style='height: 60%; width: 50%; object-fit: contain; margin: 3em 3em 3em 1em;' src="<?php echo $values["item_image"]; ?>"></td>
                              <td align="center"><?php echo $values["item_name"]; ?></td>  
                              <td align="center"><?php echo $values["item_quantity"]; ?></td>  
                              <td align="center">$ <?php echo $values["item_price"]; ?></td>  
                              <td align="center">$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
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
          <form action="../includes/savecart.php" method="POST">
        <button type="submit" name="submit" class="checkout">Checkout</button>
        </form>             
      
      <?php 
     $product = $_SESSION['userid'];
    
  
     $query = "SELECT *
               FROM addresses
               WHERE UserID = '$product'
               ";
   
     $result = mysqli_query($db, $query);
     $obj = mysqli_fetch_object($result);
     mysqli_free_result($result);
     ?>
     <h2>Shipping address</h2>
     <?php 
     echo $obj->Street, $obj->StreetNumber. "<br />"; 
     echo $obj->Postcode. "<br />";
     echo $obj->City. "<br />";
     echo $obj->Country;
     ?>
     <?php
     } ?>
     

</div>
  </div>
</body>
<?php include "../includes/footer.php"; ?>
</html>