<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">
<title> WebSite 1.0 </title>
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

    <div class='firstlittlebox'>

</div>
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



  if(isset($_POST['add'])){
    
    if(isset($_SESSION['cart'])){
      
      $item_array_id = array_column($_SESSION['cart'], "product");
      
      if(in_array($_POST['product'], $item_array_id)){
        echo"<script>alert('Product is already in the cart!')</script>";
        //echo"<script>window.location='product.php'</script>";
      }
      else{
        $count = count($_SESSION['cart']);
        $item_array = array(
          'product' => $_POST['product']
        );
        $_SESSION['cart'][$count] = $item_array;
        print_r($_SESSION['cart']);
      }
    }
    else{

      $item_array = array(
        'product' => $_POST['product']
      );
    //create new Session variable
    $_SESSION['cart'][0] = $item_array;
    print_r($_SESSION['cart']);
    print_r($_POST['product']);
    }
  }
  
  echo "</div>"
    ?>
  
</div>
</body>
</html>