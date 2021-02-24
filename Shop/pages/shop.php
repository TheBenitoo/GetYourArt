<?php   
 session_start();  
 require_once "../includes/database.php";


/* ///Filter/// */

if(isset($_POST['search']))
{
     //Wenn Preis gesetzt ist
     if((!empty($_POST['minprice'])) && (!empty($_POST['maxprice']))){
          $valuePriceMin = $_POST['minprice'];
          $valuePriceMax = $_POST['maxprice'];
          $valueToSearch = $_POST['valueToSearch'];

          $query = "SELECT * FROM product 
                     WHERE ProductID = '1' 
                     ";
          $search_result = filterTable($query); 
     }
     //Wenn kein Preis gesetzt ist
     elseif(empty($_POST['minprice']) && empty($_POST['maxprice'])){
    $valueToSearch = $_POST['valueToSearch'];

    $query = "SELECT * FROM `product` WHERE CONCAT(`ProductCategory`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
     }

     else{
          $valuePriceMin = $_POST['minprice'];
          $valuePriceMax = $_POST['maxprice'];
          $valueToSearch = $_POST['valueToSearch'];

          $query = "SELECT * FROM product 
                     WHERE CONCAT(`ProductCategory`) LIKE '%".$valueToSearch."%'
                     AND ProductPrice
                     BETWEEN '$valuePriceMin' AND '$valuePriceMax' 
                     ";
          $search_result = filterTable($query);
     }

}
//Filter zurücksetzen
elseif(isset($_POST['reset'])){
     $query = "SELECT * FROM `product`";
     $search_result = filterTable($query);
}
 else {
    $query = "SELECT * FROM `product`";
    $search_result = filterTable($query);
}

// Funktion um Filter zu setzen
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "getyourart");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

 ?>  

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title> WebSite 1.0 </title>
</head>

<?php  ?>


<body>

<?php include "../includes/header.php" ?>


<nav class="product-filter">

<h3>Filter</h3> 

     <form action="shop.php" method="post">
     <div class="sort">
          <!-- Dropdown für Kategorien -->
          <div class="collection-sort">
                    <label form="categories">Category:</label>
                         <select id="categories" name="valueToSearch">
                              <option value="%">All</option>
                              <option value="popart">PopArt</option>
                              <option value="artwork">Artwork</option>
                              <option value="smth1">Smth</option>
                         </select>
          </div>

          <!-- Auswahl Preis Minimum -->

          <div class="collection-sort">
                    <label form="minprice">Price:</label>
                    <input type="text" name="minprice" placeholder="price" value="0">
          </div>

          <!-- Auswahl Preis Maximum -->

          <div class="collection-sort">
                    <label form="maxprice">Price:</label>
                    <input type="text" name="maxprice" placeholder="price">
          </div>            

          <div class="collection-sort">
               <input type="submit" name="search" value="Filter"><br><br>
               <input type="submit" name="reset" value="Zurücksetzen"><br><br>
          </div>          
     </form>
     
</div>
</nav>

<!-- Solange wie Datenbankergebnisse kommen, gebe diese aus -->
     <div class="masonry">
     <?php while($row = mysqli_fetch_array($search_result)):?>

          <div class="grid">
               <img src='<?php echo $row['ImageSource'];?>'>
                    <div class="grid__body">
                         <div class="relative">
                         <!-- ProductPage aufrufen und ID in Adresse mit übergeben-->
                         <a class="grid__link"  href='../pages/product.php?product=<?php echo $row['ProductID'];?>"'></a>
                         <p class="grid__title"><?php echo $row['ProductName'];?></p>
                         <p class="grid__author">Künstler</p>
                    </div>
               <div class="mt-auto" >
               <span class="grid__tag"><?php echo $row['ProductPrice'];?> €</span>
               </div>
          </div>
          </div>

     <!--    mysqli_close($db);-->
     <?php endwhile;?>

     </div>    


</body>
</html>