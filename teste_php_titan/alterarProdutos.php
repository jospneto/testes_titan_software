<?php
    session_start();
    require_once "conexao.php";
    if(isset($_POST['codigo'])){    
        $codigoProd = $_POST['codigo'];
        $nome = $_POST['nome'];
        $cor = $_POST['cor'];

        $sql_code = "UPDATE produtos SET idprod = '$codigoProd', nome = '$nome', cor = '$cor' WHERE idprod = '$codigoProd'";

        if(mysqli_query($conexao, $sql_code)){
            $msg = $_SESSION['msg'] = "Produto alterado com sucesso!";
        }else{
            $msg = $_SESSION['msg'] = "Erro".mysqli_connect_error($conexao);
            header("Location: alterarProdutos.php");
        }
        mysqli_close($conexao);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styleCrud.css">
    <title>Alterar</title>
</head>
<body>
    <form action="" method="POST">
        Código:<input type="number" name="codigo" placholder="Código do produto">
        Nome<input type="text" name="nome" placholder="Nome do produto">
        Cor:<input type="cor" name="cor" placholder="Cor do produto">
        <input type="submit" value="Enviar">
        <h2><?=$msg?></h2>
    </form>
    <a href="index.php"><button>Voltar</button></a>
</body>
</html>