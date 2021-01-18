<?php
/* $dbname = 'shop';
$dns = 'mysql:dbname='.$dbname.';host=localhost';
$dbuser = 'root';
$dbpassword = '';
$options    = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];
$db = null;
try{
    $db = new PDO($dns, $dbuser, $dbpassword, $options);
    echo "Success";
}
catch(PDOException $e){
    $message = 'Database connection failed: ' . $e->getMessage();
    die($message);
}  */

/* function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "shop";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 } */
 $user = 'root';
 $pass = '';
 $db = 'shop';

 $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");


?>

