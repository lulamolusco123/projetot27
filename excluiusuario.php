<?php
include("conectadb.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST['id'];
    $sql = "DELETE FROM usuarios WHERE usu_id = '$id'";
    mysqli_query($link, $sql);
    header("Location: listausuario.php");
    exit();
}

if(!isset($_GET['id'])){
    header("Location: listausuario.php");
    exit();
}
$id = $_GET['id'];
$sql = "SELECT usu_nome FROM usuarios WHERE usu_id = '$id'";
$resultado = mysqli_query($link, $sql);
while($tbl = mysqli_fetch_array($resultado)){
    $nome = $tbl[0];
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newestilo.css">
    <title>Document</title>
</head>
<body>
    <div>
        <h2> EXCLUIR USUARIO</H2>
        <P>GOSTARIA DE EXCLUIR O USUARIO <b><?=$nome?></b>
        <form action="excluiusuario.php" method="post">
        <input type="hidden" name="id" value="<?=$id?>">
        <input type="submit" value="SIM">
    </form>
    <a href="listausuario.php"><button id="btnao">NÃO</button></a>
</div>
    
</body>
</html>