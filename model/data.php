<?php
require_once __DIR__ . '/../model/cone.php';

$query = "SELECT * FROM clientes";

try {
    $stm = $conn->prepare($query);
    $stm->execute();
    $results = $stm->fetchAll(PDO::FETCH_ASSOC);
    
    
} catch (PDOException $e){
    echo $e->getMessage();
}
?>