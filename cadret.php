<!DOCTYPE html>
<?php
    include_once ("classes/autoload.php");
    require_once "conf/Conexao.php";
    include_once "processoVI.php";
    $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    $idretangulo = isset($_POST['idretangulo']) ? $_POST['idretangulo'] : 0;
    $base = isset($_POST['base']) ? $_POST['base'] : 0;
    $altura = isset($_POST['altura']) ? $_POST['altura'] : 0;
    $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
    $tabuleiro_idtabuleiro = isset($_POST['tabuleiro_idtabuleiro']) ? $_POST['tabuleiro_idtabuleiro'] : 0;
    if ($processo == 'editar'){
        $idretangulo = isset($_GET['idretangulo']) ? $_GET['idretangulo'] : "";
        if ($idretangulo > 0){
            $ret = new Retangulo("","", "", "", "");
            $dados = $ret->listar(1, $idretangulo);
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
    <title>Cadastro de Retângulo</title>
</head>

<body>
    <?php 
        include_once "menu.php";
        echo "<br>";
    ?>
    <div class="container-fluid">
        <center>
        <form method="post" action="processoVI.php">
            ID: <input class="form-control" readonly  style="max-width:20%" type="text" name="idretangulo" id="" value="<?php if($processo == "editar"){echo $dados[0]['idretangulo'];}?>">
            <br>
            Base: <input class="form-control" style="max-width:20%" name="base" id="base" type="text" required="true" placeholder="Insira a Base" value="<?php if ($processo == "editar"){echo $dados[0]['base'];}?>"><br>         
            Altura: <input class="form-control" style="max-width:20%"  name="altura" id="altura" type="text" required="true" placeholder="Insira a Altura" value="<?php if ($processo == "editar"){echo $dados[0]['altura'];}?>"><br>         
            <br>
            Cor: <input class="form-control" style="max-width:20%" name="cor" id="cor" type="color" required="true" value="<?php if ($processo == "editar"){echo $dados[0]['cor'];}?>"><br>
            <br>
            Tabuleiro:
                <select class="form-control" style="max-width:20%" name="tabuleiro_idtabuleiro"  id="tabuleiro_idtabuleiro" class="form-select">
                    <?php
                        require_once ("utils.php");
                        echo select(0, $dados[0]['tabuleiro_idtabuleiro']);
                    ?>
                </select>
                <br>
                <br>   
                <button class="btn btn-dark" name="processo" value="salvar" id="processo" type="submit">Salvar</button>     
        </form>  
</center>
        <hr>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
