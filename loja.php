<?php
#Traz arquivo de conexão do banco
include("conectadb.php");
#Carrega a Página trazendo produtos com s (Produtos ATIVOS)
$sql = "SELECT * FROM produtos WHERE pro_ativo = 's'";
$resultado = mysqli_query($link, $sql);
#Atribui s para variavel ativo
$ativo = "s";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newestilo.css">
    <title>LOJA DO PROJETO</title>
</head>
<body>
    <form action="loja.php" method="post">

    <div class="container">
        <table border="1">
            <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>DESCRIÇÃO</th>
                    <th>QUANTIDADE</th>
                    <th>PRECO</th>
                    <th>IMAGEM</th>
                    <th>ADICIONAR AO CARRINHO</th>
            </tr>
            <?php
                #Preenchimento da tabela com os dados do banco
                while($tbl = mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <td><?= $tbl[0]?></td>
                        <td><?= $tbl[4]?></td>
                        <td><?= $tbl[1]?></td>
                        <td><input type="number" name="quantidade" id="quantidade"></td>
                        <!-- linha abaixo converte formato da $tbl[3] usando 2 casas após a virgula e aplicando , ao lugar de ponto -->
                        <td>R$ <?= number_format($tbl[3],2,',','.')?></td>
                        <td><div><img src="/img/<?=$tbl[6]?>"width="100"></div></td>
                        <td><a href="addcarrinho.php?id=<?= $tbl[0]?>&"><input type="button" value="ADICIONAR PRODUTO"></a></td>
                    </tr>
                    <?php
                }
                ?>
        </table>
            
    </div>
    </form>
</body>
</html>