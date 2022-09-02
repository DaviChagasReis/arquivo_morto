<?php

$banco = "arquivo_morto";
$usuario = "root";
$senha ="";
$host = "localhost";

global $db;

try {
    $db = new PDO("mysql:host=". $host .";dbname=" . $banco, $usuario, $senha);
} catch(PDOException $e) {
    echo $e->getMessage();
}
?>