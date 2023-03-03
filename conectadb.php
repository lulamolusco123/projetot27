<?php
#localiza pc com banco(nome do computador)
$servidor ="localhost";
#nome do banco
$banco = "projetot27";
#usuario de acesso
$usuario = "admin";
#senha do banco
$senha = "123";
#link de acesso
$link = mysqli_connect($servidor, $usuario, $senha, $banco);