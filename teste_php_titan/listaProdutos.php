<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Lato:wght@100&family=Martel+Sans:wght@800&family=Montserrat:wght@100&family=Oswald:wght@200&family=Pacifico&display=swap" rel="stylesheet">
    <title>Lista de produtos</title>
</head>
<body>
    <section class="tabela">
        <table>
            <thead>
                <th>Código</th>
                <th>Nome</th>
                <th>Cor</th>
                <th>Preço</th>
            </thead>
            <tbody>
                <?php
                    require_once "conexao.php";

                    $sql = "SELECT * FROM produtos, precos ORDER BY idprod ASC";

                    $result = $conexao->query($sql);

                    foreach($result as $produto){
                        echo '<tr>';
                        echo '<td>'.$codigoProd =  $produto['idprod'].'</td>';
                        echo '<td>'.$nome =  $produto['nome'].'</td>';
                        echo '<td>'.$cor =  $produto['cor'].'</td>';
                        echo '<td>'.$codigoPreco =  $produto['idpreco'].'</td>';
                        echo '<td> R$'.$preco =  $produto['preco'].'</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
        <a href="index.php"><button>Voltar</button></a>
    </section>
</body>
</html>