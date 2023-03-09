<?php
#Traz arquivo de conexão do banco
include("conectadb.php");
#Carrega a Página trazendo clientes com s (clientes ATIVOS)
$sql = "SELECT * FROM clientes WHERE cli_ativo = 's'";
$resultado = mysqli_query($link, $sql);


#Atribui s para variavel ativo
$ativo = "s";
#Aguarda ação POST na página
if($_SERVER['REQUEST_METHOD']=='POST'){
    $ativo = $_POST['ativo'];
    #Confere se o POST da Página foi s
    #Se s traga clientes ativos senão traga inativos
    if($ativo == 's'){
        $sql = "SELECT * FROM clientes WHERE cli_ativo = 's'";
        $resultado = mysqli_query($link, $sql);
         
    }
    else{
        $sql = "SELECT * FROM clientes WHERE cli_ativo = 'n'";
        $resultado = mysqli_query($link, $sql);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newestilo.css">
    <title>LISTA PRODUTO</title>
</head>
<body>
    <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
    <form action="listacliente.php" method="post">
        <!-- Botões que validam se o produto é listado somente ativos ou inativos-->
        <!-- onclick="submit()" é um javascript que já faz um submit na página usando o navegador como recurso -->
        <!-- <//?=$ativo== Valida se o radio foi acionado (checked) e mantém a escolha se não ele traz em branco-->
        <input type="radio" name="ativo" value='s' required onclick="submit()" <?=$ativo=='s'?"checked":""?>>ATIVOS<br>
        <input type="radio" name="ativo" value='n' required onclick="submit()" <?=$ativo=='n'?"checked":""?>>INATIVO
    </form>
    <div class="container">
        <table border="1">
            <tr>
                    <th>ID</th>
                    <th>CPF</th>
                    <th>NOME</th>
                    <th>DATA DE NASCIMENTO</th>
                    <th>TELEFONE</th>
                    <th>LOGRADOURO</th>
                    <th>NUMERO</th>
                    <th>CIDADE</th>
                    <th>ATIVO</th>
                    <th>ALTERAR</th>
                    
            </tr>
            <?php
                #Preenchimento da tabela com os dados do banco
                while($tbl = mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <td><?= $tbl[0]?></td>
                        <td><?= $tbl[1]?></td>
                        <td><?= $tbl[2]?></td>
                        <td><?= $tbl[3]?></td>
                        <td><?= $tbl[4]?></td>
                        <td><?= $tbl[5]?></td>
                        <td><?= $tbl[6]?></td>
                        <td><?= $tbl[7]?></td>
                        <!-- linha abaixo converte formato da $tbl[3] usando 2 casas após a virgula e aplicando , ao lugar de ponto -->
                        <td><?= $check = ($tbl[8] == 's')?"SIM":"NÃO"?></td>
                        <td><a href="alteracliente.php?id=<?= $tbl[0]?>"><input type="button" value="ALTERAR"></a></td>
                        
                       
                       
                        
                    </tr>
                    <?php
                }
                ?>
        </table>
    </div>
</body>
</html>