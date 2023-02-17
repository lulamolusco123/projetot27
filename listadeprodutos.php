<?php
include("conectadb.php");
$sql = "SELECT * FROM produtos WHERE pro_ativo = 's'";
$resultado = mysqli_query($link, $sql);


$ativo = "s"
if($SERVER['REQUEST_METHOD']=='POST'){
    $ativo = $_POST['ativo'];
   if($ativo =='s')} 
?>

<!DOCTYPE html>
<html lang="pt=br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheeet" href="estilo.css">
    <title>LISTA produto</title>
</head>
<body>
    <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
        <form action="listaprodutos.php" method="post">
    <input type="radio" name="ativo" value="s" required onclick="submit()" <?=$ativo=='s'?"checked":""?>>ATIVO<br>
    <input type="radio" name="ativo" value="n" required onclick="submit()" <?=$ativo=='s'?"checked":""?>>INATIVO
</form>
<div class="container">
    <table border="1">
        <tr>
                <th>ID</TH>
                <th>NOME</TH>
                <th>DESCRIÇÃO</TH>
                <th>QUANTDADE</TH>
                <th>PREÇO</TH>
        </tr>
        <?php
        while($tbl = mysqli_fetch_array($resultado)){
            ?>
            <td><?= $tbl[0]?></td>
            <td><?= $tbl[5]?></td>
            <td><?= $tbl[1]?></td>
            <td><?= $tbl[2]?></td>
            <td><?= $tbl[3]?></td>
            <td><?= $tbl[4]?></td>
            <td>R$ <?= str_replace('.',',',$tbl[3])?></td>
            <td><a href="alteraproduto.php?=id<?=[0]?>"><input type="button" value="ALTERAR"></a></td>
            <td><?= $check = ($tbl[6] == "s")?"SIM":"NAO"?></td>
        </tr>
        <?php
        }
        ?>
</body>
</html>