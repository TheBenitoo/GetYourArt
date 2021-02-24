<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">
<title> Blog </title>
<?php
    include "../includes/header.php"
?>

</head>




<body>
<?php
  include "../includes/navbar.php";
  include "../includes/database.php";

  $product = 2;
  

  //$mysqli = new mysqli('localhost', $user, $pass, $db);
  $query = "SELECT ProductName
            FROM product
            WHERE ProductID = '$product'
            ";

  //$res = $db->query($query);
  //printf("Select query returned %d rows.\n", $res->num_rows);
  //printf("%s", $db->$query);

  //$result = mysqli_query($db, $query);

  //echo $result;

  if ($result = mysqli_query($db, $query)) {
    $obj = mysqli_fetch_object($result);
      mysqli_free_result($result);
      echo "" .$obj->ProductName;
  }
  
  mysqli_close($db);
  
    ?>
</body>
<?php include "../includes/footer.php"; ?>
</html>