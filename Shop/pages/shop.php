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

/* ///Filter/// */

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `product` WHERE CONCAT(`ProductCategory`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
elseif(isset($_POST['reset'])){
     $query = "SELECT * FROM `product`";
     $search_result = filterTable($query);
}
 else {
    $query = "SELECT * FROM `product`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "shop");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
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
<!-- Filter -->

<!--<form action="shop.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
</form> -->

<!-- Dropdown -->
<nav class="product-filter">

     <h1>Filter</h1> 

<form action="shop.php" method="post">
<div class="sort">

     <div class="collection-sort">
               <label form="categories">Category:</label>
                    <select id="categories" name="valueToSearch">
                         <option value="popart">PopArt</option>
                         <option value="artwork">Artwork</option>
                         <option value="smth1">Smth</option>
                    </select>
     </div>

     <div class="collection-sort">
          <input type="submit" name="search" value="Filter"><br><br>
          <input type="submit" name="reset" value="Zurücksetzen"><br><br>
     </div>          
</form>
     
</div>
</nav>


<section class="shop">

<?php while($row = mysqli_fetch_array($search_result)):?>
<!--
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
    
-->     
    <div class='shop-card'>
          <a href='../pages/product.php?product=<?php echo $row['ProductID'];?>"'>  
          <div class='shop-image'>
               <img src='<?php echo $row['ImageSource'];?>' alt=''>
          </div>
          <div class='shop-info'>
               <h5><?php echo $row['ProductName'];?></h5>
               <h6><?php echo $row['ProductPrice'];?></h6>
          </div>
    </div>

    

<!--    mysqli_close($db);-->
<?php endwhile;?>

</section>



</body>
</html>