<?php
    session_start();
    require_once "conexao.php";
    if(isset($_POST['valor'])){
        $codigo = $_POST['valor'];

        $sql_code = "DELETE FROM precos WHERE idpreco = '$codigo'";

        if(mysqli_query($conexao, $sql_code)){
            $msg = $_SESSION['msg'] = "Preço excluído com sucesso!";
        }else{
            $msg = $_SESSION['msg'] = "Erro".mysqli_connect_error($conexao);
            header("Location: excluirPrecos.php");
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
    <title>Excluir Produto</title>
</head>
<body>
    <form action="" method="POST">
        Pesquisar: <input type="text" name="valor" placeholder="Digite código do produto">
        <input type="submit" value="Excluir">
        <h2><?=$msg?></h2>
    </form>
    <a href="index.php"><button>Voltar</button></a>
</body>
</html>