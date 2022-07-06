<!DOCTYPE html>
<?php
    include_once ("classes/autoload.php");
    $title = "Cubo";
    $idcubo = isset($_GET['idcubo']) ? $_GET['idcubo'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : 0;
    $quadrado_idquadrado = isset($_GET['quadrado_idquadrado']) ? $_GET['quadrado_idquadrado'] : 0;
    $lado = isset($_GET['lado']) ? $_GET['lado'] : 0;
    $tabuleiro_idtabuleiro = isset($_GET['tabuleiro_idtabuleiro']) ? $_GET['tabuleiro_idtabuleiro'] : "";

    $cubo = new Cubo($idcubo, $cor, $quadrado_idquadrado, $tabuleiro_idtabuleiro, $lado);
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
    <title>Consulta do Cubo</title>
    <style>
    <?php
        echo $cubo->desenha();
        ?>
    </style>
   </head>
<body>  
<div class="container-fluid">
        <?php
            echo $cubo; 
        ?> 
        <hr>
        <center><div class = "cubo"></div></center>
    </div>
</body>
</html>