<!DOCTYPE html>
<?php
    include_once ("classes/autoload.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Consulta do Triângulo</title>
    <style>
        <?php
            echo $tri->desenha();
        ?>
    </style>
   </head>
<body>  
    <?php  include_once "menu.php"; ?> 
<div class="container-fluid">   
    <br>
    <center>
        <?php
            echo $tri; 
        ?> 
        <hr>
</center>
        <center><div class = "triangulo"></div></center>
    </div>
</body>
</html>