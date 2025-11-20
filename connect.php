<?php
$host = 'localhost';
$dbname = 'vtuscript';
$username = 'root';
$password = '';
session_start();
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
$api_key = 'Bill_Stack-SEC-KEY-af39a3b95a1cc37e9ba0a1f7c32e1352';
?>