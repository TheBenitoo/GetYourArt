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


<?php
  require_once "../includes/database.php"
?>


<body>
<?php
      include "../includes/header.php"
?>

<div class='bigbox1'>

<?php
  //GET int from URL
  $product = $_GET['product'];
  
  $query = "SELECT *
            FROM product
            WHERE ProductID = '$product'
            ";

  $result = mysqli_query($db, $query);
  $obj = mysqli_fetch_object($result);
  mysqli_free_result($result);

  $result = mysqli_query($connect, $query);  
  $row = mysqli_fetch_array($result);

  echo "<div class='boxProduct text'>";
  echo  "<img style='height: 100%; width: 100%; object-fit: contain' src=".$obj->ImageSource.">";
  echo "</div>";
  $product_id = $obj->ProductID;
  echo "<div class='boxProduct text'>";
  echo "" .$obj->ProductName;
  echo "<br> Price: " .$obj->ProductPrice. "€ </br>";
  echo "<form method='post'>";
  echo "<input type='hidden' name='product' value='".$obj->ProductID."'>";
  echo "</form>";
  ?>
<form method="post" action="product.php?action=add&id=<?php echo $row["ProductID"]; ?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                               <h4 class="text-info"><?php echo $row["ProductName"]; ?></h4>  
                               <h4 class="text-danger">$ <?php echo $row["ProductPrice"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["ProductName"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["ProductPrice"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="" value="Add to Cart" />  
                          </div>  
                     </form>  

    
  
</div>
</body>
</html>