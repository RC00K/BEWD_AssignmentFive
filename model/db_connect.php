<?php
$dsn = 'mysql://te9fye0n7pcs769i:u19frx9xud9r0k50@bmlx3df4ma7r1yh4.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/das5nnqfqqspqjsk';
$username = 'te9fye0n7pcs769i';
$password = 'u19frx9xud9r0k50';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error = "Database Error: ";
    $error .= $e->getMessage();
    include('view/error.php');
    exit();
}
