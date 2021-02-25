<?php   
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "getyourart");  
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
    


    $userID = $_SESSION['userid'];
    
     //Daten für cart Tabelle

     $query = "SELECT *
               FROM addresses
               WHERE AddressID = '$userID'
               ";
   
     $result = mysqli_query($db, $query);
     $obj = mysqli_fetch_object($result);
     mysqli_free_result($result);
   
    $city = $obj->City;
    $zip = $obj->Postcode;
    $number = $obj->StreetNumber;
    $street = $obj->Street;


   $sql1 = "INSERT INTO cart (UserID,shipping_street,shipping_city,shipping_number,shipping_postcode) 
   VALUES ('$userID', '$street','$city', '$number', '$zip')";
   mysqli_query($connect, $sql1);


    //Daten für cart-items Tabelle
  
   $query = "SELECT *
             FROM cart
             WHERE UserID = '$userID'
             ";
 
   $result = mysqli_query($db, $query);
   $obj2 = mysqli_fetch_object($result);
   mysqli_free_result($result);


      foreach($_SESSION["shopping_cart"] as $keys => $values)  
      {
           $quantity = $values["item_quantity"];
           $price = $values["item_price"];
           $id = $values["item_id"];
           $cartid = $obj2->CartID;
           $total =  ($values["item_quantity"] * $values["item_price"]);

          $sql = "INSERT INTO cartitems (CartID, Quantity,price,ProductID,pricesum) 
          VALUES ('$cartid','$quantity','$price', '$id', '$total')";
            mysqli_query($connect,$sql);
        }
        unset($_SESSION['shopping_cart']);


//Email senden


/*Hat leider nicht funktioniert
// Die Nachricht
$nachricht = "Vielen Dank für Ihre Bestellung beiGetYourArt\r\n
Sie werden in kürze ihr Paket erhalten\r\n
Bis zur nächsten Bestellung, ihr GetYourArt-Team";

// Falls eine Zeile der Nachricht mehr als 70 Zeichen enthälten könnte,
// sollte wordwrap() benutzt werden
$nachricht = wordwrap($nachricht, 200, "\r\n");

// Verschicken
mail('benitograuel@googlemail.com', 'Bestellung bei GetYourArt', $nachricht);

      */?>


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