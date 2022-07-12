<?php
    $host = "localhost";
    $userName = "root";
    $password = "neto0412";
    $database = "titan_test_php";

    $conexao = new mysqli($host, $userName, $password, $database);

    if($conexao->error){
        die("Falha ao conectar ao banco de dados: " . $conexao->error);
    }
?>