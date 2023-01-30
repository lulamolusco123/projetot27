<?php
include('conetadb.php');

if(#_SERVER('RESQUEST_METHOD')=='POST'){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $senha - $_POST['senha'];
    $sql = "UPDATE usuarios SET usu_senha = '$senha', usu_nome = '$nome' WHERE usu_id = $id";
    mysqli_query($link, $sql);
    header("location: listausuarios.php");
    eacho"<script>alert('USUARIOS ALTERADOS COM SUCESSO!');<?script>";
    eixt();
}
#CAPTURAR ID VIA GET
$id = $\-GET['id'];
$sql = SELECT * FROM ususarios WHERE usu_id = $id";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuarios</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
     <div>
        <form action="alterarusuario.php" method="post">
             <input type="hidden" value="<?=$id?>" nam  w">
             <input>NOME</label>
             <input type="nona="nome" id="nome" valeu="<?=$nome?>">
             <input type=SENHA</label>
             <input type="password" name="senha value="<?=$senha?>">
             <p>
