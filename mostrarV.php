<!DOCTYPE html>
<?php

    // consulta círculo   //

    include_once ("classes/autoload.php");
    $idcirculo = isset($_GET['idcirculo']) ? $_GET['idcirculo'] : 0;
    $raio = isset($_GET['raio']) ? $_GET['raio'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $tabuleiro_idtabuleiro = isset($_GET['tabuleiro_idtabuleiro']) ? $_GET['tabuleiro_idtabuleiro'] : 0 ;

    $cir = new Circulo($idcirculo, $raio, $cor, $tabuleiro_idtabuleiro);
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../..img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Consulta do Círculo</title>
    <style>
        <?php
            echo $cir->desenha();
        ?>
    </style>
</head>
<body>  
<?php  include_once "menu.php"; ?> 
    <center>
    <div class="container-fluid">
        <br>
        <?php
            echo $cir; 
        ?> 
        <hr>
        <center><div class = "circulo"></div></center>
    </div>
</center>
</body>
</html>