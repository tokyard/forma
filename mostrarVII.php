<!DOCTYPE html>
<?php

    // consulta cubo //

    require_once "classes/autoload.php";
    $idcubo = isset($_GET['idcubo']) ? $_GET['idcubo'] : 0;
    $lado = isset($_GET['lado']) ? $_GET['lado'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $quadrado_idquadrado = isset($_GET['quadrado_idquadrado']) ? $_GET['quadrado_idquadrado'] : "";
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title><?php echo $title ?></title>
    <style>
    
        @keyframes rotate {
            from {
                transform: rotateX(-20deg) rotateY(-10deg);
            }

            50% {
                transform: rotateX(20deg) rotateY(320deg);
            }

            to {
                transform: rotateX(-20deg) rotateY(-20deg);
            }
        }

    </style>
</head>
<body>
<?php  include_once "menu.php"; ?> 
    <br>
    <div class="div">
        <center>
        <br><br><br>
        <?php  
            if ($acao = "salvar") {
                $cubo = new Cubo($idcubo, $lado, $cor, $quadrado_idquadrado);
                echo $cubo ."<br>";
                echo $cubo->desenha();
            }
            ?>
            <br>
            <br>
            <br><br><br>
        </center>
    </div>
    </fieldset>
    <br>
</body>
</html>