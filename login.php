<?php
//captura variaveis ultilizando o methodo post
if($_SERVER['REQUEST_METHOD']=="POST"){
    $nome = $_POST['nome']; //captura variavel que esta no name="nome" html
    $password = $_POST['password']; //captura variavel que esta no name="password" html
    include("conectadb.php"); //include chama a conecção com o banco de dados no  script conectadb.php

    #CONSULTA SQL PARA VERIFICAR USUARIO CADASTRADO
    //instrução de comunicação com o banco de dadossql para verificar
    $sql = "SELECT COUNT(usu_id) FROM usuarios WHERE usu_nome = '$nome' AND usu_senha ='$password'";
    //coleta o valor da consulta e cria um array para arrumar
    $resultado = mysqli_query($link,$sql);
    
    while($tbl = mysqli_fetch_array($resultado)){
        $cont = $tbl[0];//armazena o valor da coluna no caso a [0]
    }
    //verifica se o resultado do cont é 0 ou 1
    //se 0
    if($cont==1){
        header("Location: homesistema.html");
    }
    else{
        echo"<script>window.alert('USUARIOS OU SENHA INCORRETOS!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN USUARIOS</title>
    <link rel="stylesheet" href="stylecadastra.css">
</head>
<body>
    <div class="container">
    <!-- script para mostrar senha-->
    <script>
        function mostrarsenha(){
            var tipo = document.getElementById("senha");
            if(tipo.type == "password"){
                tipo.type ="text" ;

            }
            else{
                tipo.type = "password";
            }
        }
    </script>
    <!-- FIM DO SCRIPT PARA MOSTRA SENHA -->

        <form action="login.php" method="POST">
            <h1>LOGIN DE USUARIO</h1>
            <input type="text" name="nome" id="nome" placeholder="Nome">
            <p></p>
            <input type="password" id="senha" name="password" placeholder="Senha">
            <!-- abaixo esta a função onclick chamando o script de javascript Ii VVVVV -->
            <img id="olinho" onclick="mostrarsenha()" src="assets/eye.svg">
            <p></p>
            <input type="submit" name="login" value="LOGIN">
        </form>

    </div>
    
</body>
</html>
