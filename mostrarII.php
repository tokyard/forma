<!DOCTYPE html>
<?php
    // consulta tabuleiro  //

    include_once ("classes/autoload.php");
    $idtabuleiro = isset($_GET['idtabuleiro']) ? $_GET['idtabuleiro'] : 0;
    $lado = isset($_GET['lado']) ? $_GET['lado'] : 0;

    $tab = new Tabuleiro($idtabuleiro, $lado);
?>

<html lang="pt-br">
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.ico">
    <title>Consulta do Tabuleiro</title>
    <style>
        <?php
            echo $tab->desenha();
        ?>
    </style>
</head>

<body>  
<?php include_once "menu.php"; ?>
    <div class="container-fluid">
        <center>
        <br>
        <br>
        <?php
            echo $tab; 
        ?> 
        <hr>
        <center><div class = "tabuleiro"></div></center>
</center>
    </div>
</body>
</html>