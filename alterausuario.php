<?php
//conecção do banco de dados
include("conectadb.php");

//coleta de variaveis dos campos de texto html
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $ativo = $_POST['ativo'];
    //instrução sql para atulização de usuarios e senha
    $sql = "UPDATE usuarios SET usu_senha = '$senha', usu_nome='$nome' WHERE usu_id ='$id'";
    mysqli_query($link, $sql);
    header("Location: listausuario.php");
    echo "<script>alert('Usuario alterado com Sucesso!');</script>";
    exit();

}

$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE usu_id = '$id'";
$resultado = mysqli_query($link, $sql);
while($tbl = mysqli_fetch_array($resultado)){
    $nome = $tbl[1];
    $senha = $tbl[2];

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>ALTERAR USUARIO</title>
</head>
<body>
    <div>
        <form action="alterausuario.php" method="post"> 
        <input type="hidden" name="id" value="<?=$id?>" ><!-- coleta id ao carrega a pagina de forma oculta-->
        <label>NOME</label>
        <input type="text" name="nome" value="<?=$nome?>" required> <!-- coleta o nome do usuario e preenche a textbox-->
        <label>SENHA</label>
        <input type="password" name="senha" value="<?=$senha?>" required><!-- coleta a senha do usuario e preenche a txtbox-->
        <br></br>
        <label>Status: <?=$check = ($ativo == 's')?"ATIVO":"INATIVO";?></label>
        <br></br>
        <input type="radio" name="ativo" value="s">ATIVAR<BR>
        <input type="radio" name="ativo" value="n">DESATIVAR
        <input type="submit" value="SALVAR">
        </form>
    </div>
</body>
</html>