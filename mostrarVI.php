<!DOCTYPE html>
<?php
    include_once ("classes/autoload.php");
    $idretangulo = isset($_GET['idretangulo']) ? $_GET['idretangulo'] : 0;
    $base = isset($_GET['base']) ? $_GET['base'] : 0;
    $altura = isset($_GET['altura']) ? $_GET['altura'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $tabuleiro_idtabuleiro = isset($_GET['tabuleiro_idtabuleiro']) ? $_GET['tabuleiro_idtabuleiro'] : "";

    $ret = new Retangulo($idretangulo, $base, $altura, $cor, $tabuleiro_idtabuleiro);
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../..img/favicon.ico" type="image/x-icon">
    <title>Consulta do Retângulo</title>
    <style>
        <?php
            echo $ret->desenha();
        ?>
    </style>
</head>
<body>  
    <div class="container-fluid">
        <?php
            echo $ret; 
        ?> 
        <hr>
        <center><div class = "retangulo"></div></center>
    </div>
</body>
</html>