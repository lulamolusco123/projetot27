<?php
include("conectadb.php");
//coleta as variaveis do name do html e abre a conecção com banco
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $quantidade = $_POST["quantidade"];
    $preco = $_POST["preco"];
   #criptogra a foto para o anco de dados
   if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK){
    $imagen_temp = $_FILES['imagem']['tmp_name'];
    $imagem = file_get_contents($imagem_temp);
    $imagem_based64 = base64_encode($imagem);
   }
    #VERIFICA SE PRODUTO ESTÁ CADASTRADO
    $sql = "SELECT COUNT(pro_id) FROM produtos WHERE pro_nome = '$nome'";
    $resultado = mysqli_query($link, $sql);

    while ($tbl = mysqli_fetch_array($resultado)) {
        $cont = $tbl[0];
        if ($cont == 0) {
            $sql = "INSERT INTO produtos(pro_nome, pro_descricao, pro_quantidade, pro_preco, pro_ativo, imagem1) VALUES('$nome', '$descricao', '$quantidade', '$preco', 's', '$foto1')";
            mysqli_query($link, $sql);
            echo($cont);
            header("Location: listaproduto.php");
            exit();
            
        } else {
            echo "<script>window.alert('PRODUTO JÁ CADASTRADO!');</script>";
        }
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
    <title>CADASTRA PRODUTO</title>
</head>
<body>
    <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEM"></a>
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

<form action="cadastraproduto.php" method="post">
            <label>NOME</label>
            <input type="text" name="nome">
            <br></br>
            <label>DESCRIÇÃO</label>
            <input type="text" name="descricao">
            <br></br>
            <label>QUANTIDADE</label>
            <input type="number" name="quantidade">
            <br></br>
            <label>PRECO</label>
            <input type="number" name="preco">
            <br></br>

            <!-- BLOCO DE CÓDIGO NOVO -->
            <label>IMAGEM</label>
            <!-- <input type="file" name="foto1" id="img1" onchange="foto1()"> -->
            <input type="file" name="foto1" id="img1">
            <img src="img/$foto1.png" width="100px" id="foto1a">

            <br>
            <input type="submit" value="CADASTRAR">

        </form>
        <script>
            function foto1() {
                document.getElementById("foto1a").src = "img/"(document.getElementById("img1").value).slice(12);
            }
        </script>
    </div>
</body>
</html>