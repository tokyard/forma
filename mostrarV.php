<!DOCTYPE html>
<?php
    include_once ("classes/autoload.php");
    $idcirculo = isset($_GET['idcirculo']) ? $_GET['idcirculo'] : 0;
    $raio = isset($_GET['raio']) ? $_GET['raio'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $tabuleiro_idtabuleiro = isset($_GET['tabuleiro_idtabuleiro']) ? $_GET['tabuleiro_idtabuleiro'] : "";

    $cir = new Circulo($idcirculo, $raio, $cor, $tabuleiro_idtabuleiro);
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../..img/favicon.ico" type="image/x-icon">
    <title>Consulta do Círculo</title>
    <style>
        <?php
            echo $cir->desenha();
        ?>
    </style>
</head>
<body>  
    <div class="container-fluid">
        <?php
            echo $cir; 
        ?> 
        <hr>
        <center><div class = "circulo"></div></center>
    </div>
</body>
</html>