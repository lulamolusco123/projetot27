<?php
if($_SERVER['REQUEST_METHOD']== "POST"){
    $nome = $_POST['nome'];
    $password = $_POST['password'];
    include("conectadb.php");

    #CONSULTA SQL PARA VEREFICAR USUARIO CADASTRADO
    
    $sql = "SELECT COUNT(usu_id) from usuarios WHERE usu_nome = '$nome' AND usu_senha = 'password'";
    $resultado = mysqli_query($link,$sql);
    
    while($tbt = mysqli_fetch_array($resultado)){
        $cont = $tbl[0];
    }
    if($cont==1){
        header("Locstion: homesistema.html");
    }
    else{
        echo"<script>window.alert('usuarios ou senha incorretos');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN usuarios</title>
    <link rel="stylesheet" href="./stylecadastra.css">
</head>
<body>
    <div class="container">
        <!-- script para mostrar senha-->
        <script>
            function mostrarsenha(){
                var tipo = document.getElementeById("senha");
                if(tipo.type == "password"){
                    tipo.type = "text";                                      
            }
            else{
                tipo.type = "password";
            }
        }
            </script>
            <!-- FIM DO SCRIPT PARA MOSTRAR SENHA -->
            
            <FORM ACTION="login.php" method="POST">
            <h1>LOGIN DE USUARIOS</H1>
            <INPUT type="text" name="nome" id="nome" placeholder="nome">
            <p></p>
            <input type="password" id="senha" name="password" placeholder="senha">
            <img id="olinho" onclick="mostraarsenha()" sec="assets/eye.svg">
            <p></p>
            <input type="submit" name="login" value="LOGIN">
            </form>

             </div>
    
</body>
</html>