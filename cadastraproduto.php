<?php
//coleta as variaveis do name do html e abre a conecção com banco
if($_SERVER["REQUEST_METHOD"] =="POST"){
    $nome = $_POST['nome'];
    $produto = $_POST['produto'];
    $valor = $_POST['valor'];
    $descrição = $_POST['descrição'];
    include("conectadb.php");
    
    
    $sql ="SELECT COUNT(pro_id) from produto WHERE usu_nome = '$nome'";
    $resultado = mysqli_query($link,$sql);
    while($tbl = mysqli_fetch_array($resultado)){
        $cont = $tbl[0];
    }
    if($cont==1){
        echo"<script>window.alert('PRODUTO JÁ CADASTRADO!');</SCRIPT>";
    }
    else{
        $sql = "INSERT INTO produto (pro_nome, pro_produto, pro_valor, pro_descrição) 
        VALUES('$nome', '$produto', '$valor' , '$descrição','n')";
        mysqli_query($link,$sql);
        header("Location: listaproduto.php");
    }

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>CADASTRA PRODUTO</title>
</head>
<body>
    <a href="homesistema.html"><input type="button" id="meuhome" value="HOME SISTEM"></a>
    <div>
        <!-- script para mostrar senha-->
        <script>
            function mostrarproduto(){
                var tipo = document.getElementById("produto");
                if(tipo.type == "text"){
                    tipo.type = "text";                                      
            }
            else{
                tipo.type = "text";
            }
        }
            </script>

            <form action="cadastrausuario.php" method="POST">
                <h1>CADASTRO DE PRODUTO</h1>
                <input type="text" name="nome" placeholder="NOME">
                <P></p>
                <input type="text" name="produto" placeholder="PRODUTO  ">
                <p></p>
                <input type="text" name="valor" placeholder="VALOR">
                <p></p>
                <input type="text" name="descrição" placeholder="DESCRIÇÃO">
                <p></p>
                <input type="submit" name="cadastrar" id="cadastrar" value="CADASTRAR">
                


    </form>
    </div>    
</body>
</html>