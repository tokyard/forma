<!DOCTYPE html>
<?php
    include_once ("classes/autoload.php");
    $idusuario = isset($_GET['idusuario']) ? $_GET['idusuario'] : 0;
    $nome = isset($_GET['nome']) ? $_GET['nome'] : "";
    $login = isset($_GET['login']) ? $_GET['login'] : "";
    $senha = isset($_GET['senha']) ? $_GET['senha'] : "";

    $user = new Usuario($idusuario, $nome, $login, $senha);
?>

<html lang="pt-br">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.ico">
    <title>Consulta do Usuário</title>
</head>

<body>  
    <div class="container-fluid">
        <?php
            echo $user; 
        ?> 
        <hr>
        <center><div class = "tabuleiro"></div></center>
    </div>
</body>
</html>