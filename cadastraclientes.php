<?php
include("conectadb.php");
//coleta as variaveis do name do html e abre a conecção com banco
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $nascimento = $_POST["nascimento"];
    $telefone = $_POST["telefone"];
    $logradouro = $_POST["logradouro"];
    $numero = $_POST["numero"];
    $cidade = $_POST["cidade"];
    $ativo = $_POST["ativo"];

    $sql ="SELECT COUNT(cli_id) from clientes WHERE cli_cpf = '$cpf'";
   $resultado = mysqli_query($link,$sql);
   while($tbl = mysqli_fetch_array($resultado)){
       $cont = $tbl[0];
    }
    #Verificação visual se usuario existe ou não.
    if($cont==1){
        echo"<script>window.alert('USUARIO JÁ CADASTRADO!');</script>";
    }
    else{
        $sql = "INSERT INTO clientes (cli_nome, cli_cpf, cli_nascimento, cli_telefone, cli_logradouro, cli_numero, cli_cidade, cli_ativo) 
        VALUES('$nome', '$cpf', '$nascimento', '$telefone', '$logradouro', '$numero', '$cidade''n')";
        mysqli_query($link,$sql);
        header("Location: cadastraclientes.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newestilo.css">
    <title>CADASTRA CLIENTES</title>
    </head>
<body>

<a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA"></a>




<form action="cadastracliente.php" method="POST">
        <h1>CADASTRA CLIENTE</h1>
        <input type="text" name="nome" id="nome" placeholder="NOME" required>
        <p></p>
        <input type="number" id="number" name="number" placeholder="CPF" required>
        
        <p></p>
        <input type="text" name="nascimento" id="nascimento" placeholder="NASCIMENTO" required>
        <p></p>
        <input type="text" name="logradouro" id="logradouro" placeholder="LOGRADOURO" required>
        <p></p>
        <input type="text" name="numero" id="numero" placeholder="NUMERO" required>
        <p></p>
        <input type="text" name="cidade" id="cidade" placeholder="CIDADE" required>
        <p></p>
        <input type="submit" name="cadastrar" id="cadastrar" value="CADASTRAR">
    </form>
    </div>
</body>
</html>
