<?php
include("conectadb.php");

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
            <th>Nome</tr>
            <th>Alterar Dados</th>
            <th>Excuir Usuario</th>
        </tr>
        <?php
            while ($tbl = mysqli_fetch_array($resultado)){
                ?>
                <tr>
                <td><?= $tbl[1]?></td>
                <td><a href="alterarusuario.php?id=<?=$tbl[0]?>"><input type="button" value="Alterar"></a></td>
                <td><a href="excluirusuario.php?id=<?=$tbl[0]?>"><input type="button" value="EXCLUIR"></a></td>
                </tr>
                <?php
            }
            ?>

        </table>
        </div>

    
</body>
</html>