<?php

$dbName = 'getyourart';

$dns = 'mysql:dbname='.$dbName.';host=localhost';
$user = 'root';
$password = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

$pdo = null;

try {
    $pdo = new PDO($dns, $user, $password, $options);
}
catch (PDOException $e) {
    die('Database error: '.$e->getMessage());
}

?>
