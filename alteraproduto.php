<?php
include("conectadb_php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_POST['id'];
    $nome=$_POST['nome'];
    $descricao=$_POST['descricao'];
    $quantidade=$_POST['quantidade'];
    $preco=$_POST['preco'];
    $ativo=$_POST['ativo'];
   
    $sql = "UPDATE produtos SET pro_nome = '$nome', pro_descricao = '$descricao', pro_quantidade = '$quantidade', pro_preco = '$preco', pro_ativo = '$ativo WHERE usu_id=$id";
    mysqli_query($link, $sql);

    header("Location: listaproduto.php");
    echo"<script>window.alert('PRODUTO ALTERO!');</SCRIPT>";
    exit();
}
$id = $_GET['id'];
$sql = "SELECT * FROM produtos WHERE pro_id='$id'";
$resultado=mysqli_query($link,$sql);
while($tbl=mysqli_fetch_array($resultado)){

    $nome=$tbl[1];
    $senha=$tbl[2];
    $ativo=$tbl[3];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="alteraproduto.php" method="post">
            <input type="hidden" name="id" value=",<?=$id?>">
            <label>NOME</label>
            <input type="text" name="nome", value="<?=$nome?>"required>
            <label>DESCRICAO</label>
            <input type="text" name="descricao", value=",<?=$descricao?>"required>
            <label>QUANTIDADE</label>
            <input type="text" name="quantidade", value="<?=$quantidade?>"required>
            <label>PRECO</label>
            <input type="text" name="preco", value="<?=$preco?>"required>
            <br></br>
            <label>Status: <?=$check = ($ativo == 's')?"ATIVO":"INATIVO";?></label>
            <input type="radio" name="ativo" value="s" <?=$ativo == "s"? "checked":""?>>ATIVO<br>
            <input type="radio" name="ativo" value="n"<?=$ativo == "n"? "checked":""?>>INATIVO

            <input type="submit" value="SALVAR">    
    
</body>
</html>