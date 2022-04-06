<?php
$dsn = 'mysql:host=acw2033ndw0at1t7.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=xyfwum8m7ktq6odw';
$username = 'qlad65c9vhnj24av';
$password = 'l3ckqwlzko0djj07';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error = "Database Error: ";
    $error .= $e->getMessage();
    include('view/error.php');
    exit();
}