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
                echo '<script>window.location="contact.php"</script>';  
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
<title> Cart </title>
</head>
<?php
  require_once "../includes/database.php";
      include "../includes/header.php";
      ?>
<body>

<?php 
    
   
    $userid = $_SESSION['userid'];
    /*$phone = $_POST['phone'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $number = $_POST['number'];
    $street = $_POST['street'];*/

   $sql1 = "INSERT INTO cart (UserID,ship_street,ship_city,ship_number,phone,zip) 
   VALUES ('2', 'Rohdaer Weg','Erfurt', '30', '017686382205', '99098')";
   mysqli_query($connect, $sql1);




      foreach($_SESSION["shopping_cart"] as $keys => $values)  
      {
           $quantity = $values["item_quantity"];
           $price = $values["item_price"];
           $id = $values["item_id"];
           $cartid = $_SESSION['userid'];

          $sql = "INSERT INTO cartitems (Quantity,price,ProductID,CartID) VALUES ('$quantity','$price', '$id', '$cartid')";
            mysqli_query($connect,$sql);
        }
        unset($_SESSION['shopping_cart']);


//Email senden

$userID = $_SESSION['userid'];
    
  
     $query = "SELECT *
               FROM users
               WHERE UserID = '$userID'
               ";
   
     $result = mysqli_query($db, $query);
     $obj = mysqli_fetch_object($result);
     mysqli_free_result($result);
     


// Die Nachricht
$nachricht = "Vielen Dank für Ihre Bestellung beiGetYourArt\r\n
Sie werden in kürze ihr Paket erhalten\r\n
Bis zur nächsten Bestellung, ihr GetYourArt-Team";

// Falls eine Zeile der Nachricht mehr als 70 Zeichen enthälten könnte,
// sollte wordwrap() benutzt werden
$nachricht = wordwrap($nachricht, 200, "\r\n");

// Verschicken
mail('benitograuel@googlemail.com', 'Bestellung bei GetYourArt', $nachricht);

      ?>


<section id="one">
				<div class="inner">
					<header>
						<h2>Dankeschön</h2>
					</header>
					<p>Vielen Dank für ihre Bestellung und ihr Vertrauen, wir freuen uns wieder von Ihnen zu hören!.</p>
					
				</div>
			</section>
            <meta http-equiv="refresh" content="5;URL=../pages/index.php"/>
</body>
</html>