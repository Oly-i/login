<?php
define('USER', '4585646_hospital'); 
define('PASSWORD', '}Pu#uZ;k4UD5L)r}');  
define('HOST', 'fdb1030.awardspace.net');  
define('DATABASE', '4585646_hospital');  

try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    exit("Error de conexión: " . $e->getMessage());
}
