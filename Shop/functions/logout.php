<?php

session_start();
session_destroy();

echo "<h2 class='prompt'>You have been successfully logged out!</h2>";
?>

<meta http-equiv="refresh" content="3;URL=login.php"/>

