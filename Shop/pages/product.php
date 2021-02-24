<?php require_once "../includes/database.php" ?>
<?php   
 session_start();  
  
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
                     'item_name'             =>     $_POST["hidden_name"],  
                     'item_price'            =>     $_POST["hidden_price"],  
                     'item_quantity'         =>     $_POST["quantity"],
                     'item_image'            =>     $_POST["hidden_ImageSource"]
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
                echo '<script>window.location="shop.php"</script>'; 
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="cart.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'             =>     $_POST["hidden_name"],  
                'item_price'            =>     $_POST["hidden_price"],  
                'item_quantity'         =>     $_POST["quantity"],
                'item_image'            =>     $_POST["hidden_ImageSource"]  
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
                     echo '<script>window.location="product.php?product="</script>';  
                }  
           }  
      }  
 }  
 ?> 

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">
<title> WebSite 1.0 </title>
</head>





<body style="background-image: url('../assets/images/product_background.jpg');">
<?php include "../includes/header.php" ?>



<?php
  //GET int from URL
  $product = $_GET['product'];
  
  $query = "SELECT *
            FROM product
            WHERE ProductID = '$product'
            ";

  //Ergebnis für Foto
  $result = mysqli_query($db, $query);
  $obj = mysqli_fetch_object($result);

  //Ergebnis für Preis, Name und Beschreibung
  $result = mysqli_query($db, $query);  
  $row = mysqli_fetch_array($result);

  echo "<div class='containerProduct'>";
  echo  "<img style='height: 60%; width: 50%; object-fit: contain; margin: 3em 3em 3em 1em;' src=".$obj->ImageSource.">";
  
  ?>


<form method="post" action="product.php?action=add&id=<?php echo $row["ProductID"]; ?>">  
                                              
     <div class="product">  
          <h2 class=""><?php echo $row["ProductName"]; ?></h2>  
                               
          <p class="desc"><?php echo $row["ProductDescription"]; ?></p>
          <h4 class="">$ <?php echo $row["ProductPrice"]; ?></h4>
          <input type="text" name="quantity" class="form-control" value="1" />  
          <input type="hidden" name="hidden_name" value="<?php echo $row["ProductName"]; ?>" />  
          <input type="hidden" name="hidden_price" value="<?php echo $row["ProductPrice"]; ?>" />
          <input type="hidden" name="hidden_ImageSource" value="<?php echo $row["ImageSource"]; ?>" /> 

          <input class="button_add" type="submit" name="add_to_cart" value="Add to Cart" />  
     </div>  
</form>  
</div>
    
  

</body>
</html>