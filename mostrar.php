<!DOCTYPE html>
<?php
    include_once ("classes/autoload.php");
    $idquadrado = isset($_GET['idquadrado']) ? $_GET['idquadrado'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $lado = isset($_GET['lado']) ? $_GET['lado'] : 0;
    $tabuleiro_idtabuleiro = isset($_GET['tabuleiro_idtabuleiro']) ? $_GET['tabuleiro_idtabuleiro'] : "";

    $quad = new Quadrado($idquadrado, $lado, $cor, $tabuleiro_idtabuleiro);
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../..img/favicon.ico" type="image/x-icon">
    <title>Consulta do Quadrado</title>
    <style>
        <?php
            echo $quad->desenha();
        ?>
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>  
    <?php include_once "menu.php"; ?>
<center>
    <br>
    <div class="container-fluid">
        <?php
            echo $quad; 
        ?> 
        <hr>
    <div class = "quadrado"></div></center>
    </div>
</body>
</html>