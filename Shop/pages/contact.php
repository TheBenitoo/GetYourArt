<?php   
 session_start();  
 if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `product` WHERE CONCAT(`ProductID`, `ProductDescription`, `ProductName`, `ProductCategory`) LIKE '%".$valueToSearch."%'";
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
           <title>Shopping Cart</title>  
           <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
           </style>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 

      </head>  
      <body>  
      <?php
      include "../includes/header.php"
      ?>
      <form action="contact.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                    <th>Id</th>
                    <th>Cat</th>
                    <th>Name</th>
                    <th>Desc</th>
                </tr>

                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['ProductID'];?></td>
                    <td><?php echo $row['ProductCategory'];?></td>
                    <td><?php echo $row['ProductName'];?></td>
                    <td><?php echo $row['ProductDescription'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
      </body>  
 </html>