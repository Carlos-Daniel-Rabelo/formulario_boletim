<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$db_name = "boletim";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conectado com sucesso ";

}catch(PDOException $e){
    echo "Conexão falida: " . $e->getMessage();
}


?>
