<?php
$dsn = 'mysql:host=acw2033ndw0at1t7.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=xyfwum8m7ktq6odw';
$username = 'root';
//$password = '1qaz2WSX';

try {
    $db = new PDO($dsn, $username);
} catch (PDOException $e) {
    $error = "Database Error: ";
    $error .= $e->getMessage();
    include('view/error.php');
    exit();
}
