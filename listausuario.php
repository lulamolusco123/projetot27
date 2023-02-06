<?php
//abre conecção com o banco de dados
include("conectadb.php");

//passa a instrução para o banco de dados
//função da instrução: listar todos os conteudos da tabela usuarios
$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Usuarios</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <a href="homesistema.html"><input type="button" id="meuhome" value="home sistema"></a>
    <div class="container">
        <table border="1">
        <tr>
            <th>Nome</th>
            <th>Alterar Dados</th>
            <th>Excuir Usuario</th>
        </tr>
        <?php
            while ($tbl = mysqli_fetch_array($resultado)){
                ?>
                <tr>
                <td><?= $tbl[1]?></td> <!-- traz somente a coluna nome para apresentar na tabela-->
                <!-- ao clicar no botão ele ja trara o id do usuario para a pagina do alterar -->
                <td><a href="alterausuario.php?id=<?=$tbl[0]?>"><input type="button" value="Alterar"></a></td>
                <!-- ao clicar no botão ele ja trara o id do usuario para a pagina do excluir -->
                <!--<td><a href="excluiusuario.php?id=<//?=$tbl[0]?>"><input type="button" value="EXCLUIR"></a></td>
                </td><?=tbl[3]?></td>
                <?php
            }
            ?>

        </table>
        </div>

    
</body>
</html>