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
                echo '<script>window.location="shop.php"</script>';  
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
<title> WebSite 1.0 </title>
</head>

<?php
  require_once "../includes/database.php"
?>


<body>
<?php
     include "../includes/header.php"
?>
<section id="filter">
<h2>Filter here</h2>
</section>

<section class="shop">
<?php
$x = 9;
$i;
for ($i=1; $i<=$x; $i++)
{
    $product = $i;
    
  
    $query = "SELECT *
              FROM product
              WHERE ProductID = '$product'
              ";
  
    $result = mysqli_query($db, $query);
    $obj = mysqli_fetch_object($result);
    mysqli_free_result($result);
    //echo "" .$obj->ProductName;
    
     
    echo  "<div class='shop-card'>";
    echo  "<a href='../pages/product.php?product=".$product."'>";  
    echo  "<div class='shop-image'>";
    echo  "<img src='".$obj->ImageSource."'>";
    echo  "</div>";
    echo  "<div class='shop-info'>";
    echo  "<h5>".$obj->ProductName."</h5>";
    echo  "<h6>".$obj->ProductPrice."</h6>";
    echo  "</div>";
    echo  "</div>";
    echo  "</a>";
    
}
mysqli_close($db);
?>

<div class="shop-card">
    <div class="shop-image">
      <img src='../assets/images/PopArt.png'>
    </div>
    <div class="shop-info">
      <h5>Winter Jacket</h5>
      <h6>$99.99</h6>
    </div>
  </div>
</section>



</body>
</html>