<?php
session_start();
if(!isset($_SESSION['userid'])) {
    die('Please log in first! <a href="login.php"></a>');
}

$userid = $_SESSION['userid'];

echo "Hello: ".$userid;

