<!DOCTYPE html>
<?php
    include_once ("class/autoload.php");
    require_once "conf/Conexao.php";
    include_once "processo.php";
    $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    $idquadrado = isset($_POST['idquadrado']) ? $_POST['idquadrado'] : "";
    $lado = isset($_POST['lado']) ? $_POST['lado'] : 0;
    $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
    $tabuleiro_idtabuleiro = isset($_POST['tabuleiro_idtabuleiro']) ? $_POST['tabuleiro_idtabuleiro'] : "";
    if ($processo == 'editar'){
        $id = isset($_GET['idquadrado']) ? $_GET['idquadrado'] : "";
        if ($id > 0){
            $quad = new Quadrado("","", "", "");
            $dados = $quad->listar(1, $id);
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
    <title>Cadastro de Quadrado</title>
</head>

<body>
    <?php 
        include_once "menu.php";
        echo "<br>";
    ?>
    <div class="container-fluid">
        <form method="post" processo="processo.php">

            ID: <input type="text" name="idquadrado" id="" value="<?php if($processo == "editar"){echo $dados[0]['idquadrado'];}?>">

            Lado: <input name="lado" id="lado" type="number" required="true" placeholder="Digite o Lado" value="<?php if ($processo == "editar"){echo $dados[0]['lado'];}?>"><br>         
            <br>
            Cor: <input name="cor" id="cor" type="color" required="true" value="<?php if ($processo == "editar"){echo $dados[0]['cor'];}?>"><br>
            <br>
            Tabuleiro:
                <select name="tabuleiro_idtabuleiro"  id="tabuleiro_idtabuleiro" class="form-select">
                    <?php
                        require_once ("utils.php");
                        echo select(0, $dados[0]['tabuleiro_idtabuleiro']);
                    ?>
                </select>
                <br>
                    

            <button  type="submit" class="btn btn-outline-dark" name="processo" id="processo" value="<?php if($processo == "editar"){echo "editar";} else {echo "insert";}?>">Enviar</button>
        </form>  
        <hr>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
