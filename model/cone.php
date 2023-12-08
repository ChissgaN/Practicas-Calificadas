<?php

$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'negocio';

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}