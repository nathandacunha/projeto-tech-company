<?php
$host = "localhost";
$usuario = "root";
$senha = "root";
$db = "db_tech_company";

$conexao = new mysqli($host, $usuario, $senha, $db);

if($conexao->connect_error){
    die("Erro na conexao: " . $conexao->connect_error);
}
?>