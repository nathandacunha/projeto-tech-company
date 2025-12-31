<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$db = "db_tech_company";

$conn = new mysqli($host, $usuario, $senha, $db);

if($conn->connect_error){
    die("Erro na conexao: " . $conn->connect_error);
}
?>