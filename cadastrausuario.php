<?php
if($_SERVER["request_method"] =="POST"){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    include("conectadb.php");


    #VERIFICA USUARIO EXISTENTE
    $sql ="SELECT COUNT(usu_id) from usuario WHERE usu_nome = '$nome' AND usu_senha = '$senha'";
    $resultado = mysqli_query($link,$sql);
    while($tbl = mysqli_fetch_array($resultado)){
        $cont = $tbl[0];
    }
    if($cont==1){
        echo"<script>window.alert('USUARIO JÁ CADASTRADO!');</SCRIPT>";
    }
    else{
        $sql = "INSERT INTO usuarios (usunome, usu_senha) VALUES('$nome', '$senha')";
        mysqli_query($link,$sql);
        header("location: listausuarios.php");
    }

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
    <a href="homesistema.html"><input type="button" id="meuhome" value="HOME SISTEM"></a>
    <div>
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

            <form action="cadastrausuario.php" method="POST">
                <h1>CADASTRO DE USUARIOS</h1>
                <input type="password" name="nome" placeholder="NOME">
                <P></p>
                <input type="password" name="senha" placeholder="SENHA">
                <img id="olinho" onclick="mostrarsenha()" src="assets/eye.svg">
                <p></p>
                <input type="submit" name="cadastrar" id="cadastrar" value="CADASTRAR">
                


    </form>
    </div>    
</body>
</html>