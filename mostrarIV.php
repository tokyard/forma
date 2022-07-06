<!DOCTYPE html>
<?php
    include_once ("../classes/autoload.php");
    $idtriangulo = isset($_GET['idtriangulo']) ? $_GET['idtriangulo'] : 0;
    $base = isset($_GET['base']) ? $_GET['base'] : 0;
    $lado1 = isset($_GET['lado1']) ? $_GET['lado1'] : 0;
    $lado2 = isset($_GET['lado2']) ? $_GET['lado2'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $tabuleiro_idtabuleiro = isset($_GET['tabuleiro_idtabuleiro']) ? $_GET['tabuleiro_idtabuleiro'] : "";

    $tri = new Triangulo($idtriangulo, $base, $lado1, $lado2, $cor, $tabuleiro_idtabuleiro);
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
    <title>Consulta do Triângulo</title>
    <style>
        <?php
            echo $tri->desenha();
        ?>
    </style>
   </head>
<body>  
<div class="container-fluid">
        <?php
            echo $tri; 
        ?> 
        <hr>
        <center><div class = "triangulo"></div></center>
    </div>
</body>
</html>