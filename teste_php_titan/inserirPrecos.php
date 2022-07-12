<?php
    session_start();
    require_once "conexao.php";
    if(isset($_POST['codigo'])){    
        $codigo = $_POST['codigo'];
        $preco = $_POST['preco'];

        $sql_code = "INSERT INTO precos VALUES ('$codigo', '$preco')";

        if(mysqli_query($conexao, $sql_code)){
            $msg = $_SESSION['msg'] = "Preço cadastrado com sucesso!";
        }else{
            $msg = $_SESSION['msg'] = "Erro".mysqli_connect_error($conexao);
            header("Location: inserirPrecos.php");
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
    <title>Inserir</title>
</head>
<body>
    <form action="" method="POST">
        Código:<input type="number" name="codigo" placholder="Código do produto">
        Preço:<input type="number" name="preco" placholder="Preço do produto">
        <input type="submit" value="Enviar">
        <h2><?=$msg?></h2>
    </form>
    <a href="index.php"><button>Voltar</button></a>
</body>
</html>