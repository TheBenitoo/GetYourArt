<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">
<title> WebSite 1.0 </title>
<?php
    include "../includes/header.php"
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
$x = 3;
$i;
for ($i=1; $i<=$x; $i++)
{
    $product = $i;
    
  
    $query = "SELECT ImageSource
              FROM product
              WHERE ProductID = '$product'
              ";
  
    $result = mysqli_query($db, $query);
    $obj = mysqli_fetch_object($result);
    mysqli_free_result($result);
    //echo "" .$obj->ProductName;
    
    
    echo  "<div class='box1 center img'>";
    echo  "<a href='../pages/product.php?product=$product'>";
    echo  "<img style='height: 100%; width: 100%; object-fit: contain' src=".$obj->ImageSource.">";
    ?>
    <form>
    <input type=submit name=product value='3'>
    </form>
    <?php
    echo  "</a>";
    echo  "</div>";
    
}
mysqli_close($db);
?>
</div>

<!-- <div class='bigbox1'>
    <div class='box1 text'>
    Produkt1
    </div>
    <div class='box1 text'>
    Produkt2
    </div>
    <div class='box1 text'> 
    Produkt3
    </div>
    <div class='box1 text'> 
    Produkt4
    </div>
    <div class='box1 text'> 
    Produkt5
    </div>
    <div class='box1 text'> 
    Produkt6
    </div>
</div>
 -->


</body>
</html>