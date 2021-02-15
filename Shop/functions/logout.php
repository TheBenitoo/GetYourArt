<?php

include "../includes/navbar.php";

session_start();
session_destroy();

echo "You have been successfully logged out!";
?>

<meta http-equiv="refresh" content="3;URL=login.php"/>

