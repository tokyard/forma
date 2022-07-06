<!DOCTYPE html>
<?php
    include_once ("class/autoload.php");
    require_once "conf/Conexao.php";
    include_once "processoV.php";
    $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    $idcirculo = isset($_POST['idcirculo']) ? $_POST['idcirculo'] : "";
    $raio = isset($_POST['raio']) ? $_POST['raio'] : 0;
    $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
    $tabuleiro_idtabuleiro = isset($_POST['tabuleiro_idtabuleiro']) ? $_POST['tabuleiro_idtabuleiro'] : "";
    if ($processo == 'editar'){
       $idcirculo = isset($_GET['idcirculo']) ? $_GET['idcirculo'] : "";
        if ($id > 0){
            $cir = new Circulo("","", "","");
            $dados = $cir->listar(1, $id);
        }
    }
    ?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cadastro de Círculo</title>
</head>

<body>
    <?php 
        include_once "menu.php";
        echo "<br>";
    ?>
    <div class="container-fluid">
        <form method="post" processo="processoV.php">
            Raio: <input name="raio" id="raio" type="number" required="true" placeholder="Insira o raio" value="<?php if ($processo == "editar"){echo $dados[0]['raio'];}?>"><br>         
            <br>
            Cor: <input name="cor" id="cor" type="color" required="true" placeholder="Insira a cor" value="<?php if ($processo == "editar"){echo $dados[0]['cor'];}?>"><br>
            <br>
            Tabuleiro:
                <select name="tabuleiro_idtabuleiro"  id="tabuleiro_idtabuleiro" class="form-select">
                    <?php
                        require_once ("../control/utils.php");
                        echo select(0, $dados[0]['tabuleiro_idtabuleiro']);
                    ?>
                </select>
                <br>
                    
            <input type="hidden" id="table" name="table" class="table" value="circulo">
            <input type="hidden" name="idcirculo" id="" value="<?php if($processo == "editar"){echo $dados[0]['idcirculo'];}?>">

            <button  type="submit" class="btn btn-outline-dark" name="processo" id="processo" value="<?php if($processo == "editar"){echo "editar";} else {echo "insert";}?>">Enviar</button>
        </form>  
        <hr>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
